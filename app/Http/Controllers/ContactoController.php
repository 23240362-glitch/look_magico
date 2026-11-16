<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contactos');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|string|max:100',
            'apellido'    => 'required|string|max:100',
            'telefono'    => 'required|string|max:20',
            'asunto'      => 'required|string|max:100',
            'comentarios' => 'required|string',
        ]);

        Contacto::create([
            'nombre'      => $request->nombre,
            'apellido'    => $request->apellido,
            'telefono'    => $request->telefono,
            'asunto'      => $request->asunto,
            'comentarios' => $request->comentarios,
        ]);

        return redirect()->route('contactos')->with('success', '¡Gracias! Tu mensaje ha sido enviado correctamente.');
    }
}