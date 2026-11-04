<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CitaController;

// 1. Pantalla de Bienvenida Pública
Route::get('/', function () {
    return view('welcome');
});

// 2. Catálogo de Servicios
Route::get('/servicios', [ServicioController::class, 'index']);

// 3. Selección de Rol (Cliente vs Admin)
Route::get('/iniciar-sesion', [AuthController::class, 'seleccionarRol'])->name('login.roles');

// 4. Módulo Autenticación Clienta
Route::get('/login/cliente', [AuthController::class, 'showLoginCliente'])->name('login.cliente');
Route::post('/login/cliente', [AuthController::class, 'loginCliente'])->name('login.cliente.post');

// 5. Pantalla Principal de Clienta Autenticada
Route::get('/cliente/inicio', [AuthController::class, 'inicioCliente'])->name('cliente.inicio');

// 6. Módulo Autenticación Administradora
Route::get('/login/admin', [AuthController::class, 'showLoginAdmin'])->name('login.admin');
Route::post('/login/admin', [AuthController::class, 'loginAdmin'])->name('login.admin.post');

Route::get('/forgot-password', function () {
    return view('recuperar_pass'); // O el nombre de tu vista
})->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Ruta para mostrar el formulario de registro
Route::get('/registro', function () {
    return view('registro');
});

// Ruta para procesar el envío de datos
Route::post('/registro', [AuthController::class, 'register']);

Route::get('/agenda', [CitaController::class, 'index'])->name('agenda');
Route::get('/api/horarios-ocupados', [CitaController::class, 'obtenerHorariosOcupados']);
Route::post('/citas/guardar', [CitaController::class, 'guardar'])->name('citas.guardar');

// Ruta para ver la pantalla de confirmación con el ID de la cita creada
Route::get('/cita/confirmada/{id}', [CitaController::class, 'confirmacion'])->name('cita.confirmacion');