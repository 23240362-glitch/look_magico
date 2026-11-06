<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicio;

class ServicioSeeder extends Seeder
{
    public function run(): void
    {
        Servicio::truncate();


   
        $this->call([
            ProductoSeeder::class,
            ServicioSeeder::class,
        ]);
    }
}