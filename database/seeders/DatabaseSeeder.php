<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // Datos iniciales del sistema. Se ejecuta con: php artisan db:seed
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,     // Cuenta de la administradora
            ServicioSeeder::class,  // Servicios del catálogo
            ProductoSeeder::class,  // Productos del catálogo
        ]);
    }
}
