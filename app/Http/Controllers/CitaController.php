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

    // Guarda la cita enviada desde JavaScript
    public function guardar(Request $request)
    {
        try {
            $request->validate([
                'servicio' => 'required|string',
                'fecha'    => 'required|date',
                'hora'     => 'required|string',
            ]);

            $cita = Cita::create([
                'user_id'  => Auth::id() ?? 1,
                'servicio' => $request->servicio,
                'fecha'    => $request->fecha,
                'hora'     => $request->hora,
                'estado'   => 'confirmada',
            ]);

            return response()->json([
                'status'  => 'success',
                'cita_id' => $cita->id,
                'message' => '¡Cita confirmada con éxito!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Muestra la vista de confirmación final
    public function confirmacion($id)
    {
        $cita = Cita::find($id) ?? (object)[
            'id'       => $id,
            'servicio' => 'Corte de cabello',
            'fecha'    => date('Y-m-d'),
            'hora'     => '12:00 PM'
        ];

        return view('confirmacion', compact('cita'));
    }
}