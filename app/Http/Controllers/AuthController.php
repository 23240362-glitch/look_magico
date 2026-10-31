<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. Muestra la pantalla de selección de rol (Imagen 2: ELIGE TU USUARIO)
    public function seleccionarRol()
    {
        return view('seleccionar_rol');
    }

    // 2. Muestra el login de clienta (Imagen 3: REGISTRO CLIENTE)
    public function showLoginCliente()
    {
        return view('login');
    }

    // Procesa el login de clienta
    public function loginCliente(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/servicios');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    // 3. Muestra el login de administradora (Imagen 4: ACCESO ADMINISTRADORA)
    public function showLoginAdmin()
    {
        return view('login_adm');
    }

    // Procesa el login de administradora
    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'pin' => ['required'],
        ]);

        // Lógica básica para redirigir tras ingresar credenciales de admin
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/agenda');
        }

        return back()->withErrors([
            'email' => 'Las credenciales de administradora no son válidas.',
        ]);
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}