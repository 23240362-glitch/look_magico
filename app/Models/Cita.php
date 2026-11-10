<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'citas';

    // Permite que Laravel| guarde estos campos
    protected $fillable = [
|       'user_id',
|       'servicio',
        'fecha',
        'hora',
        'estado',
    ];

    // Relación con el usuario (la clienta que agenda)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el servicio del catálogo.
    // Uso: $cita->servicioCatalogo->nombre, $cita->servicioCatalogo->precio
    // (se llama servicioCatalogo porque "servicio" ya es una columna de texto)
    public function servicioCatalogo()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }

    // Al guardar una cita, si solo trae el nombre del servicio,
    // se busca en el catálogo y se llena servicio_id automáticamente
    protected static function booted(): void
    {
        static::saving(function (Cita $cita) {
            if (!$cita->servicio_id && $cita->servicio) {
                $cita->servicio_id = Servicio::where('nombre', $cita->servicio)->value('id');
            }
        });
    }
}
