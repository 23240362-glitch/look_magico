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

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('cliente.inicio'));
        }

        return back()->withErrors([
            'email' => 'Las credenciales ingresadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    // Muestra la pantalla de inicio cliente tras loguearse
    // RF11 (clienta): también le muestra sus citas para consultarlas, cancelarlas o reprogramarlas
    public function inicioCliente()
    {
        $misCitas = Auth::user()->citas()
            ->whereDate('fecha', '>=', now()->toDateString())
            ->orderBy('fecha')
            ->get()
            ->sortBy(fn ($c) => $c->fecha . ' ' . str_pad((string) \App\Support\Agenda::aMinutos($c->hora), 4, '0', STR_PAD_LEFT));

        return view('cliente_inicio', compact('misCitas'));
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

        $user = User::where('email', $request->email)->first();

        if ($user && method_exists($user, 'esAdmin') && $user->esAdmin()
            && Hash::check($request->password, $user->password)
            && $user->pin && Hash::check($request->pin, $user->pin)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Las credenciales o el PIN de administradora son incorrectos.',
        ])->onlyInput('email');
    }

    // 4. Muestra la pantalla de registro
    public function showRegistro()
    {
        return view('registro');
    }

    // Procesa el registro dinámico de nuevas clientas en la Base de Datos
    public function register(Request $request)
    {
        // Validar las entradas del usuario dinámicamente
        $request->validate([
            'name'     => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'telefono' => 'required|digits:10',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Guarda lo que el usuario haya ingresado en el formulario
        $user = User::create([
            'name'     => $request->name,
            'apellido' => $request->apellido,
            'email'    => $request->email,
            'telefono' => $request->telefono,
            'password' => Hash::make($request->password),
            'rol'      => 'cliente',
        ]);

        // Autenticar al usuario recién creado e iniciar sesión
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

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'El correo electrónico no se encuentra registrado.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login.cliente')->with('success', '¡Contraseña actualizada correctamente!');
    }

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