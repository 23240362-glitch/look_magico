<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    public function run(): void
    {
        $servicios = [
            [
                'nombre' => 'Pixie',
                'categoria' => 'Cortes',
                'precio' => 150.00,
                'duracion_minutos' => 30,
                'imagen' => 'pixie.jpg',
                'estatus' => 'ALTA',
            ],
            [
                'nombre' => 'Francesa',
                'categoria' => 'Manicuras',
                'precio' => 200.00,
                'duracion_minutos' => 45,
                'imagen' => 'francesa.jpg',
                'estatus' => 'ALTA',
            ],
            [
                'nombre' => 'Uñas Acrílicas',
                'categoria' => 'Manicuras',
                'precio' => 350.00,
                'duracion_minutos' => 60,
                'imagen' => 'acrilicas.jpg',
                'estatus' => 'ALTA',
            ],
        ];

        DB::table('servicios')->insert($servicios);
    }
}