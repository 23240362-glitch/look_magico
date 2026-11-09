<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Nombre corto para proteger rutas de la administradora: ->middleware('admin')
        $middleware->alias([
            'admin' => \App\Http\Middleware\EsAdmin::class,
        ]);

        // Si alguien sin sesión entra a una ruta protegida, va a "Elige tu usuario"
        $middleware->redirectGuestsTo(fn () => route('login.roles'));
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
