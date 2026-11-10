<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'citas';

    // Todos los campos permitidos para asignación masiva
    protected $fillable = [
        'user_id',
        'servicio',
        'servicio_id',
        'fecha',
        'hora',
        'estado',
    ];

    // Relación con el cliente que agenda la cita
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Servicio
    public function servicioCatalogo()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }

    // Evento previo a guardar la cita
    protected static function booted(): void
    {
        static::saving(function (Cita $cita) {
            // Si no enviamos servicio_id explícito, busca en la tabla servicios de tus compañeros por nombre
            if (empty($cita->servicio_id) && !empty($cita->servicio)) {
                $servicioObj = Servicio::where('nombre', 'LIKE', '%' . $cita->servicio . '%')->first();
                if ($servicioObj) {
                    $cita->servicio_id = $servicioObj->id;
                }
            }
        });
    }
}