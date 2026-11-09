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

        // updateOrInsert evita que se dupliquen si el seeder se corre más de una vez
        foreach ($servicios as $servicio) {
            DB::table('servicios')->updateOrInsert(
                ['nombre' => $servicio['nombre']],
                $servicio + ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
