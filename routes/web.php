<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ServicioController;

Route::get('/servicios', [ServicioController::class, 'index']);

use App\Http\Controllers\AuthController;

// Ruta 1: Desde "Iniciar Sesión" en la pantalla principal nos manda a la Selección de Rol
Route::get('/iniciar-sesion', [AuthController::class, 'seleccionarRol'])->name('login.roles');

// Ruta 2: Login Clienta (Imagen 3)
Route::get('/login/cliente', [AuthController::class, 'showLoginCliente'])->name('login.cliente');
Route::post('/login/cliente', [AuthController::class, 'loginCliente'])->name('login.cliente.post');

// Ruta 3: Login Administradora (Imagen 4)
Route::get('/login/admin', [AuthController::class, 'showLoginAdmin'])->name('login.admin');
Route::post('/login/admin', [AuthController::class, 'loginAdmin'])->name('login.admin.post');