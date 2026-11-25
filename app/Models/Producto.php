<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    // Permite que Laravel guarde estos campos
    protected $fillable = [
        'nombre',
        'marca',
        'categoria',
        'precio',
        'descripcion',
        'imagen',
        'stock',
        'estatus',
    ];

    // Con estas piezas o menos, el producto se marca "Por resurtir" (alerta de RF17)
    public const STOCK_MINIMO = 3;

    public function porResurtir(): bool
    {
        return $this->estatus === 'ALTA' && $this->stock <= self::STOCK_MINIMO;
    }

    // Solo los productos dados de alta
    public function scopeActivos($query)
    {
        return $query->where('estatus', 'ALTA');
    }

    // Productos de una categoría. Ej. Producto::deCategoria('Shampoos')->get()
    public function scopeDeCategoria($query, $categoria)
    {
        return $query->where('categoria', $categoria);
    }
}
