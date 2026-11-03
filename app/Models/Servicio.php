<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable = [
        'nombre',
        'categoria',
      //'subcategoria',
        'precio',
        'duracion_minutos',
      //'duracion_horas',
        'imagen',
        'estatus',
    ];
}
