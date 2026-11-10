<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';

    // Permite que Laravel guarde estos campos
    protected $fillable = [
        'nombre',
        'categoria',
        'precio',
        'duracion_minutos',
        'imagen',
        'estatus',
    ];

    // Relación: un servicio puede estar en muchas citas
    public function citas()
    {
        return $this->hasMany(Cita::class, 'servicio_id');
    }

    // Solo los servicios dados de alta
    public function scopeActivos($query)
    {
        return $query->where('estatus', 'ALTA');
    }
}
