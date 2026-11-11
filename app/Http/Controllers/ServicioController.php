<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServicioController extends Controller
{
    // Categorías oficiales de servicios
    private $categorias = [
        'Cortes', 'Depilaciones', 'Maquillajes', 'Peinados',
        'Manicuras', 'Pedicuras', 'Tintes', 'Rayos', 'Tratamientos'
    ];

    /**
     * 1. Tabla General de Servicios (Panel Administradora)
     */
    public function index(Request $request)
    {
        $query = Servicio::query();

        // Filtrar por categoría si se seleccionó una
        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        // Filtrar por estatus (ALTA / BAJA)
        if ($request->filled('estatus')) {
            $query->where('estatus', $request->estatus);
        }

        $servicios = $query->orderBy('id', 'desc')->get();

        return view('servicios_general', [
            'servicios' => $servicios,
            'categorias' => $this->categorias
        ]);
    }

    /**
     * 2. Vista de Formulario para NUEVO servicio
     */
    public function create()
    {
        return view('admin_servicio_form', [
            'servicio' => null,
            'categorias' => $this->categorias
        ]);
    }

    /**
     * 3. Guardar NUEVO servicio en la BD
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:servicios,nombre',
            'categoria' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'duracion' => 'required|integer|min:1',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:4096'
        ], [
            'nombre.unique' => 'Ya existe un servicio registrado con ese nombre.'
        ]);

        $datos = $request->only(['nombre', 'categoria', 'precio', 'duracion', 'descripcion']);
        $datos['estatus'] = 'ALTA';

        // Si el usuario subió una imagen
        if ($request->hasFile('imagen')) {
            $nombreImagen = time() . '_' . Str::slug($request->nombre) . '.' . $request->imagen->getClientOriginalExtension();
            $request->imagen->move(public_path('img'), $nombreImagen);
            $datos['imagen'] = $nombreImagen;
        }

        Servicio::create($datos);

        return redirect()->route('servicios.general')
            ->with('success', 'Servicio "' . $request->nombre . '" registrado correctamente.');
    }

    /**
     * 4. Vista de Formulario para MODIFICAR un servicio
     */
    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);

        return view('admin_servicio_form', [
            'servicio' => $servicio,
            'categorias' => $this->categorias
        ]);
    }

    /**
     * 5. Actualizar servicio en la BD
     */
    public function update(Request $request, $id)
    {
        $servicio = Servicio::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255|unique:servicios,nombre,' . $id,
            'categoria' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'duracion' => 'required|integer|min:1',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:4096'
        ], [
            'nombre.unique' => 'Ya existe un servicio con ese nombre.'
        ]);

        $datos = $request->only(['nombre', 'categoria', 'precio', 'duracion', 'descripcion']);

        if ($request->hasFile('imagen')) {
            $nombreImagen = time() . '_' . Str::slug($request->nombre) . '.' . $request->imagen->getClientOriginalExtension();
            $request->imagen->move(public_path('img'), $nombreImagen);
            $datos['imagen'] = $nombreImagen;
        }

        $servicio->update($datos);

        return redirect()->route('servicios.general')
            ->with('success', 'Servicio "' . $servicio->nombre . '" actualizado correctamente.');
    }

    /**
     * 6. Cambiar estatus a BAJA
     */
    public function baja($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->update(['estatus' => 'BAJA']);

        return redirect()->back()
            ->with('success', 'Servicio "' . $servicio->nombre . '" dado de baja correctamente.');
    }

    /**
     * 7. Cambiar estatus a ALTA
     */
    public function alta($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->update(['estatus' => 'ALTA']);

        return redirect()->back()
            ->with('success', 'Servicio "' . $servicio->nombre . '" activado (ALTA) correctamente.');
    }
}