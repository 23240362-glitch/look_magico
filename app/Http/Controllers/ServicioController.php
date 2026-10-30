<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
    public function index()
    {
        // Trae todos los servicios creados sin filtrar por estatus
        $servicios = Servicio::all();

        return view('servicios', compact('servicios'));
    }
}