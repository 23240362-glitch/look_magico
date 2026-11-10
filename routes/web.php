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
Route::get('/clasificacion', function () {
    return view('clasificacion');
})->name('clasificacion');

Route::get('/servicios/general', function () {
    return view('servicios_general');
})->name('servicios.general');

Route::get('/depilaciones', function () {
    return view('depilaciones');
})->name('depilaciones');

Route::get('/maquillajes', function () {
    return view('maquillajes');
})->name('maquillajes');

Route::get('/peinados', function () {
    return view('peinados');
})->name('peinados');

Route::get('/manicuras', function () {
    return view('manicuras');
})->name('manicuras');

Route::get('/pedicuras', function () {
    return view('pedicuras');
})->name('pedicuras');

Route::get('/tintes', function () {
    return view('tintes');
})->name('tintes');

Route::get('/rayos', function () {
    return view('rayos');
})->name('rayos');

Route::get('/tratamientos', function () {
    return view('tratamientos');
})->name('tratamientos');

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
    return view('recuperar_pass');
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

// 7. Catálogo de Productos
Route::get('/productos', function () {
    return view('productos_general');
})->name('productos.general');

Route::get('/productos/shampoos', function () {
    return view('shampoos');
})->name('productos.shampoos');

Route::get('/productos/acondicionadores', function () {
    return view('acondicionadores');
})->name('productos.acondicionadores');

Route::get('/productos/tratamientos', function () {
    return view('productos_tratamientos');
})->name('productos.tratamientos');

Route::get('/productos/skincare', function () {
    return view('skincare');
})->name('productos.skincare');

// 8. Cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 9. Panel de Administración (Panel exclusivo para Administradora)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin_dashboard');
    })->name('admin.dashboard');
});