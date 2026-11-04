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

    $cita = Cita::create([
        'user_id' => Auth::id() ?? 1,
        'servicio' => $request->servicio,
        'fecha' => $request->fecha,
        'hora' => $request->hora,
        'estado' => 'confirmada',
    ]);

    // Retornamos el ID de la cita para hacer la redirección
    return response()->json([
        'status' => 'success',
        'cita_id' => $cita->id
    ]);
}

    public function confirmacion($id)
    {
         $cita = Cita::with('user')->findOrFail($id);
         $montoEstimado = $precios[$cita->servicio] ?? 1000.00;

    return view('confirmacion', compact('cita', 'montoEstimado'));
    }
}
