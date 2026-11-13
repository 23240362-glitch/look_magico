<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ContactoController;
use App\Models\Producto;

// 1. Pantalla de Bienvenida Pública
Route::get('/', function () {
    return view('welcome');
});

// 2. Catálogo de Servicios (Vista Cliente)
Route::get('/clasificacion', function () {
    return view('clasificacion');
})->name('clasificacion');

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

// Registro de usuario
Route::get('/registro', function () {
    return view('registro');
});
Route::post('/registro', [AuthController::class, 'register']);

// Citas y Agenda Cliente
Route::get('/agenda', [CitaController::class, 'index'])->name('agenda');
Route::get('/api/horarios-ocupados', [CitaController::class, 'obtenerHorariosOcupados']);
Route::post('/citas/guardar', [CitaController::class, 'guardar'])->name('citas.guardar');
Route::get('/cita/confirmada/{id}', [CitaController::class, 'confirmacion'])->name('cita.confirmacion');

// 7. Catálogo de Productos (Vista Cliente)
Route::get('/productos', function () {
    $productos = Producto::activos()->get()->groupBy('categoria')->map->take(3)->flatten();
    return view('productos_general', compact('productos'));
})->name('productos.general');

Route::get('/productos/shampoos', function () {
    $productos = Producto::activos()->deCategoria('Shampoos')->orderBy('nombre')->get();
    return view('shampoos', compact('productos'));
})->name('productos.shampoos');

Route::get('/productos/acondicionadores', function () {
    $productos = Producto::activos()->deCategoria('Acondicionadores')->orderBy('nombre')->get();
    return view('acondicionadores', compact('productos'));
})->name('productos.acondicionadores');

Route::get('/productos/tratamientos', function () {
    $productos = Producto::activos()->deCategoria('Tratamientos')->orderBy('nombre')->get();
    return view('productos_tratamientos', compact('productos'));
})->name('productos.tratamientos');

Route::get('/productos/skincare', function () {
    $productos = Producto::activos()->deCategoria('Skincare y Corporal')->orderBy('nombre')->get();
    return view('skincare', compact('productos'));
})->name('productos.skincare');

// 8. Cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 9. Panel de Administración (Administradora Autenticada)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin_dashboard');
    })->name('admin.dashboard');

    // Agenda Administradora
    Route::get('/agenda', function () {
        return view('admin_agenda');
    })->name('admin.agenda');

    // Módulo de Servicios: consulta, alta, edición y baja
    Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.general');
    Route::get('/servicios/nuevo', [ServicioController::class, 'create'])->name('servicios.create');
    Route::post('/servicios', [ServicioController::class, 'store'])->name('servicios.store');
    Route::get('/servicios/{id}/editar', [ServicioController::class, 'edit'])->name('servicios.edit');
    Route::put('/servicios/{id}', [ServicioController::class, 'update'])->name('servicios.update');
    Route::patch('/servicios/{id}/baja', [ServicioController::class, 'baja'])->name('servicios.baja');
    Route::patch('/servicios/{id}/alta', [ServicioController::class, 'alta'])->name('servicios.alta');

    // Módulo de Productos (Insumos): consulta, alta, edición y baja
    Route::get('/productos', [ProductoController::class, 'index'])->name('admin.productos.index');
    Route::get('/productos/nuevo', [ProductoController::class, 'create'])->name('admin.productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('admin.productos.store');
    Route::get('/productos/{id}/editar', [ProductoController::class, 'edit'])->name('admin.productos.edit');
    Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('admin.productos.update');
    Route::patch('/productos/{id}/baja', [ProductoController::class, 'baja'])->name('admin.productos.baja');
    Route::patch('/productos/{id}/alta', [ProductoController::class, 'alta'])->name('admin.productos.alta');
});

//CONTACTOS
Route::get('/contactos', [ContactoController::class, 'index'])->name('contactos');
Route::post('/contactos', [ContactoController::class, 'store'])->name('contactos.store');