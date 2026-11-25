<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Servicio;
use App\Support\Agenda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    // RF09: pantalla de la agenda (calendario, horarios y servicio)
    public function index(Request $request)
    {
        $serviciosPorCategoria = Servicio::activos()
            ->orderBy('categoria')
            ->orderBy('nombre')
            ->get()
            ->groupBy('categoria');

        return view('agenda', [
            'serviciosPorCategoria' => $serviciosPorCategoria,
            'servicioElegido'       => $request->integer('servicio_id') ?: null,
        ]);
    }

    // RF13: horarios del día con su disponibilidad (regla de 1 h 15 min), en JSON
    public function horariosDisponibles(Request $request)
    {
        $request->validate([
            'fecha'   => 'required|date',
            'excluir' => 'nullable|integer',
        ]);

        $dia = Carbon::parse($request->fecha);

        return response()->json([
            'festivo'  => Agenda::esFestivo($dia),
            'domingo'  => $dia->isSunday(),
            'horarios' => Agenda::disponibilidad($dia->toDateString(), $request->integer('excluir') ?: null),
        ]);
    }

    // RF09 + RF13 + RF14: registra la cita de la clienta que tiene sesión iniciada
    public function guardar(Request $request)
    {
        $request->validate([
            'servicio_id' => 'required|integer|exists:servicios,id',
            'fecha'       => 'required|date',
            'hora'        => 'required|string',
        ]);

        $servicio = Servicio::activos()->find($request->servicio_id);
        if (!$servicio) {
            return response()->json(['status' => 'error', 'message' => 'Ese servicio ya no está disponible.'], 422);
        }

        // RF14: los datos de contacto se toman de la cuenta de la clienta
        $usuario = Auth::user();
        if (empty($usuario->telefono)) {
            return response()->json(['status' => 'error', 'message' => 'Tu cuenta no tiene número telefónico. Es necesario para confirmar la cita por WhatsApp.'], 422);
        }

        // RF13: valida horario de atención, domingos, festivos y el intervalo de 1 h 15 min
        $error = Agenda::validar($request->fecha, $request->hora);
        if ($error) {
            return response()->json(['status' => 'error', 'message' => $error], 422);
        }

        $cita = Cita::create([
            'user_id'     => $usuario->id,
            'servicio_id' => $servicio->id,
            'servicio'    => $servicio->nombre,
            'fecha'       => Carbon::parse($request->fecha)->toDateString(),
            'hora'        => Agenda::aTexto(Agenda::aMinutos($request->hora)),
            'estado'      => 'pendiente',   // Se confirma por WhatsApp (y la administradora la marca como confirmada)
        ]);

        return response()->json([
            'status'  => 'success',
            'cita_id' => $cita->id,
        ]);
    }

    // Pantalla de confirmación con el botón para enviar el WhatsApp
    public function confirmacion($id)
    {
        $cita = $this->citaPermitida($id);

        return view('confirmacion', compact('cita'));
    }

    // RF10: cancelar una cita (la clienta dueña de la cita o la administradora)
    public function cancelar($id)
    {
        $cita = $this->citaPermitida($id);

        if ($cita->estado === 'cancelada') {
            return redirect()->back()->with('error', 'Esa cita ya estaba cancelada.');
        }

        $cita->update(['estado' => 'cancelada']);   // El horario queda libre para otras clientas

        return redirect()->back()->with('success', 'La cita #' . $cita->id . ' se canceló y el horario quedó libre.');
    }

    // RF12: pantalla para reprogramar (adelantar o posponer) una cita
    public function editar($id)
    {
        $cita = $this->citaPermitida($id);

        if ($cita->estado === 'cancelada') {
            return redirect()->back()->with('error', 'No se puede reprogramar una cita cancelada.');
        }

        return view('reprogramar', compact('cita'));
    }

    // RF12 + RF13: guarda la nueva fecha y hora
    public function actualizar(Request $request, $id)
    {
        $cita = $this->citaPermitida($id);

        $request->validate([
            'fecha' => 'required|date',
            'hora'  => 'required|string',
        ], [
            'fecha.required' => 'Selecciona la nueva fecha.',
            'hora.required'  => 'Selecciona el nuevo horario.',
        ]);

        // Se excluye la propia cita para que su horario actual no se cuente como ocupado
        $error = Agenda::validar($request->fecha, $request->hora, $cita->id);
        if ($error) {
            return back()->withErrors(['hora' => $error])->withInput();
        }

        $cita->update([
            'fecha' => Carbon::parse($request->fecha)->toDateString(),
            'hora'  => Agenda::aTexto(Agenda::aMinutos($request->hora)),
        ]);

        $destino = Auth::user()->esAdmin() ? route('admin.agenda') : route('cliente.inicio');

        return redirect($destino)->with('success', 'La cita #' . $cita->id . ' quedó reprogramada para el '
            . Carbon::parse($cita->fecha)->locale('es')->isoFormat('D [de] MMMM') . ' a las ' . $cita->hora . '.');
    }

    // RF11 (administradora): agenda completa con búsqueda por teléfono, nombre, folio o fecha
    public function adminIndex(Request $request)
    {
        $citas = Cita::with('user')
            ->when($request->filled('fecha'), fn ($q) => $q->whereDate('fecha', $request->fecha))
            ->when($request->filled('estado'), fn ($q) => $q->where('estado', $request->estado))
            ->when($request->filled('buscar'), function ($q) use ($request) {
                $texto = trim($request->buscar);
                $q->where(function ($q) use ($texto) {
                    if (ctype_digit(ltrim($texto, '#')) && strlen(ltrim($texto, '#')) < 10) {
                        $q->orWhere('id', (int) ltrim($texto, '#'));   // Folio de la cita
                    }
                    $q->orWhereHas('user', function ($u) use ($texto) {
                        $u->where('telefono', 'like', "%{$texto}%")
                          ->orWhere('name', 'like', "%{$texto}%")
                          ->orWhere('apellido', 'like', "%{$texto}%");
                    });
                });
            })
            ->orderBy('fecha', 'desc')
            ->orderBy('hora', 'asc')
            ->get();

        return view('admin_agenda', compact('citas'));
    }

    // Administradora: marca la cita como confirmada (después de hablar con la clienta por WhatsApp)
    public function confirmar($id)
    {
        $cita = Cita::findOrFail($id);

        if ($cita->estado === 'cancelada') {
            return redirect()->back()->with('error', 'No se puede confirmar una cita cancelada.');
        }

        $cita->update(['estado' => 'confirmada']);

        return redirect()->back()->with('success', 'La cita #' . $cita->id . ' quedó confirmada.');
    }

    // Solo la clienta dueña de la cita o la administradora pueden verla o cambiarla
    private function citaPermitida($id): Cita
    {
        $cita = Cita::with('user')->findOrFail($id);
        $usuario = Auth::user();

        if (!$usuario->esAdmin() && (int) $cita->user_id !== (int) $usuario->id) {
            abort(403, 'Esta cita no te pertenece.');
        }

        return $cita;
    }
}
