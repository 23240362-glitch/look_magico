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
        'descripcion',
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

    // Permite usar $servicio->duracion en las vistas (la columna se llama duracion_minutos)
    public function getDuracionAttribute()
    {
        return $this->duracion_minutos;
    }

    // Citas pendientes o confirmadas de hoy en adelante (impiden dar de baja el servicio, RF02)
    public function citasPorAtender()
    {
        return $this->citas()
            ->whereIn('estado', ['pendiente', 'confirmada'])
            ->whereDate('fecha', '>=', now()->toDateString());
    }
}
