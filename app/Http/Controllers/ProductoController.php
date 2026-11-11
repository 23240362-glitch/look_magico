<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{
    // Categorías del catálogo de productos (las mismas que ve la clienta)
    public const CATEGORIAS = ['Shampoos', 'Acondicionadores', 'Tratamientos', 'Skincare y Corporal'];

    // Mensajes de error en español
    private $mensajes = [
        'nombre.required'    => 'Escribe el nombre del producto.',
        'nombre.unique'      => 'Ya existe un producto con ese nombre.',
        'marca.required'     => 'Escribe la marca.',
        'categoria.required' => 'Selecciona la categoría.',
        'categoria.in'       => 'Selecciona una categoría válida.',
        'precio.required'    => 'Escribe el precio.',
        'precio.numeric'     => 'El precio debe ser un número.',
        'precio.gt'          => 'El precio debe ser mayor a cero.',
        'stock.required'     => 'Escribe las existencias.',
        'stock.integer'      => 'Las existencias deben ser un número entero.',
        'stock.min'          => 'Las existencias no pueden ser negativas.',
        'imagen.image'       => 'El archivo debe ser una imagen.',
        'imagen.mimes'       => 'La imagen debe ser JPG o PNG.',
        'imagen.max'         => 'La imagen no debe pesar más de 4 MB.',
    ];

    // Reglas de validación (al modificar se ignora el propio producto en "unique")
    private function reglas($idIgnorar = null)
    {
        return [
            'nombre'      => ['required', 'string', 'max:255', Rule::unique('productos', 'nombre')->ignore($idIgnorar)],
            'marca'       => ['required', 'string', 'max:255'],
            'categoria'   => ['required', Rule::in(self::CATEGORIAS)],
            'precio'      => ['required', 'numeric', 'gt:0'],
            'stock'       => ['required', 'integer', 'min:0'],
            'descripcion' => ['nullable', 'string', 'max:1000'],
            'imagen'      => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:4096'],
        ];
    }

    // Guarda la imagen en public/img/productos y regresa el nombre del archivo
    private function guardarImagen(Request $request)
    {
        $archivo = $request->file('imagen');
        $nombre  = time() . '_' . Str::slug($request->nombre) . '.' . $archivo->getClientOriginalExtension();
        $archivo->move(public_path('img/productos'), $nombre);

        return $nombre;
    }

    // 1. Consulta: lista de productos con filtro por categoría y estatus
    public function index(Request $request)
    {
        $productos = Producto::query()
            ->when($request->filled('categoria'), fn ($q) => $q->where('categoria', $request->categoria))
            ->when($request->filled('estatus'), fn ($q) => $q->where('estatus', $request->estatus))
            ->orderBy('categoria')
            ->orderBy('nombre')
            ->get();

        $categorias = self::CATEGORIAS;

        return view('admin_productos', compact('productos', 'categorias'));
    }

    // 2. Alta: muestra el formulario vacío
    public function create()
    {
        $producto   = null;
        $categorias = self::CATEGORIAS;

        return view('admin_producto_form', compact('producto', 'categorias'));
    }

    // 2. Alta: guarda el producto nuevo en la BD
    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas(), $this->mensajes);

        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $this->guardarImagen($request);
        }

        $datos['estatus'] = 'ALTA';
        Producto::create($datos);

        return redirect()->route('admin.productos.index')
            ->with('success', 'Producto "' . $datos['nombre'] . '" registrado correctamente.');
    }

    // 3. Modificación: muestra el formulario con los datos actuales
    public function edit($id)
    {
        $producto   = Producto::findOrFail($id);
        $categorias = self::CATEGORIAS;

        return view('admin_producto_form', compact('producto', 'categorias'));
    }

    // 3. Modificación: guarda los cambios
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $datos    = $request->validate($this->reglas($producto->id), $this->mensajes);

        // Si no se elige otra imagen, se conserva la actual
        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $this->guardarImagen($request);
        } else {
            unset($datos['imagen']);
        }

        $producto->update($datos);

        return redirect()->route('admin.productos.index')
            ->with('success', 'Producto "' . $producto->nombre . '" actualizado correctamente.');
    }

    // 4. Baja: el producto deja de verse en el catálogo, pero se conserva en la BD
    public function baja($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update(['estatus' => 'BAJA']);

        return back()->with('success', 'El producto "' . $producto->nombre . '" se dio de baja y ya no aparece en el catálogo.');
    }

    // Reactivar: el producto vuelve a aparecer en el catálogo
    public function alta($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update(['estatus' => 'ALTA']);

        return back()->with('success', 'El producto "' . $producto->nombre . '" volvió a estar disponible en el catálogo.');
    }
}
