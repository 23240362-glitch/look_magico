<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ServicioController;

Route::get('/servicios', [ServicioController::class, 'index']);