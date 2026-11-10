<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    // Crea la cuenta de la administradora.
    // La contraseña y el PIN se guardan encriptados (ver casts en el modelo User).
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@lookmagico.com'],
            [
                'name'     => 'Administradora',
                'password' => 'admin1234',
                'rol'      => 'admin',
                'pin'      => '1234',
            ]
        );
    }
}
