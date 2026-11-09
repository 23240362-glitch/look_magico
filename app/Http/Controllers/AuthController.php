<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // 1. Muestra la pantalla de selección de rol
    public function seleccionarRol()
    {
        return view('seleccionar_rol');
    }

    // 2. Muestra el login de clienta
    public function showLoginCliente()
    {
        return view('login');
    }

    // Procesa el login de clienta contra la Base de Datos
    public function loginCliente(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Consulta en la base de datos si el correo y la contraseña coinciden
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('cliente.inicio'));
        }

        return back()->withErrors([
            'email' => 'Las credenciales ingresadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    // Muestra la pantalla de inicio cliente tras loguearse
    public function inicioCliente()
    {
        return view('cliente_inicio');
    }

    // 3. Muestra el login de administradora
    public function showLoginAdmin()
    {
        return view('login_adm');
    }

    // Procesa el login de administradora contra la Base de Datos
    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
            'pin'      => ['required'],
        ]);

        // Buscar a la administradora en la BD
        $user = User::where('email', $request->email)->first();

        // Validar que exista el usuario, que tenga rol de administradora,
        // que la contraseña encriptada coincida y que el PIN (también encriptado) sea correcto
        if ($user && $user->esAdmin()
            && Hash::check($request->password, $user->password)
            && $user->pin && Hash::check($request->pin, $user->pin)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('/agenda');
        }

        return back()->withErrors([
            'email' => 'Las credenciales o el PIN de administradora son incorrectos.',
        ])->onlyInput('email');
    }

    // 4. Registro de nuevas clientas en la Base de Datos
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'telefono' => 'required|digits:10',
            'password' => 'required|string|min:6|confirmed', // confirmed revisa password_confirmation
        ]);

        // Guardar nuevo registro en MySQL
        $user = User::create([
            'name'     => $request->name,
            'apellido' => $request->apellido,
            'email'    => $request->email,
            'telefono' => $request->telefono,
            'password' => Hash::make($request->password), // Encriptación segura
            'rol'      => 'cliente',
        ]);

        // Iniciar sesión automáticamente tras el registro
        Auth::login($user);

        return redirect()->route('cliente.inicio');
    }

    // 5. Muestra la pantalla de recuperación de contraseña
    public function showRecuperar()
    {
        return view('recuperar_pass');
    }

    // Procesa la actualización de contraseña en la BD
    public function procesarRecuperar(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Buscar el usuario en la BD
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'El correo electrónico no se encuentra registrado.']);
        }

        // Actualizar la contraseña encriptada en la BD
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login.cliente')->with('success', '¡Contraseña actualizada correctamente!');
    }

    // Método enlace para evitar el error con la ruta resetPassword
    public function resetPassword(Request $request)
    {
        return $this->procesarRecuperar($request);
    }
    
    // 6. Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}