<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EsAdmin
{
    // Protege las rutas del panel: solo deja pasar a la administradora
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || !$request->user()->esAdmin()) {
            return redirect()->route('login.admin')->withErrors([
                'email' => 'Inicia sesión como administradora para entrar.',
            ]);
        }

        return $next($request);
    }
}
