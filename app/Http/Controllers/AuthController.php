<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    // Procesa el login de clienta
    public function loginCliente(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Redirecciona a la vista autenticada de clienta
        return redirect()->route('cliente.inicio');
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

    // Procesa el login de administradora
    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'pin' => ['required'],
        ]);

        return redirect()->intended('/agenda');
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