<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    // Muestra la pantalla de la agenda
    public function index()
    {
        return view('agenda');
    }

    // Devuelve los horarios ocupados para la fecha seleccionada en JSON
    public function obtenerHorariosOcupados(Request $request)
    {
        $horasOcupadas = Cita::where('fecha', $request->fecha)
            ->where('estado', 'confirmada')
            ->pluck('hora')
            ->toArray();

        return response()->json(['ocupadas' => $horasOcupadas]);
    }

    // En app/Http/Controllers/CitaController.php
    public function guardar(Request $request)
    {
     $request->validate([
        'servicio' => 'required|string',
        'fecha' => 'required|date',
        'hora' => 'required|string',
    ]);

    $userId = Auth::id() ?? \App\Models\User::first()->id ?? 1;
        // 1. Obtener ID del usuario autenticado
        $userId = Auth::id();

        // 2. Si no hay sesión iniciada, toma el primer usuario registrado en la BD
        if (!$userId) {
            $user = User::first();
            
            // 3. Si no existe ningún usuario en la tabla 'users', crea uno por defecto
            if (!$user) {
                $user = User::create([
                    'name'     => 'Pily Carmona',
                    'email'    => 'pily@example.com',
                    'password' => bcrypt('12345678'),
                    'telefono' => '4772554597',
                ]);
            }
            
            $userId = $user->id;
        }

        // Registrar la cita
        $cita = Cita::create([
            'user_id'  => $userId,
            'servicio' => $request->servicio,
            'fecha'    => $request->fecha,
            'hora'     => $request->hora,
            'estado'   => 'confirmada',
        ]);

        return response()->json([
            'status'  => 'success',
            'cita_id' => $cita->id,
        ]);
    }
}