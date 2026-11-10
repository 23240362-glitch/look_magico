<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Agrega a la tabla users los datos que pide el registro y el login de administradora.
        // Se revisa si la columna ya existe para no duplicarla.
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'apellido')) {
                $table->string('apellido')->nullable()->after('name');             // Ej. Carmona Campos
            }
            if (!Schema::hasColumn('users', 'telefono')) {
                $table->string('telefono', 10)->nullable()->after('email');        // Ej. 4772554597
            }
            if (!Schema::hasColumn('users', 'rol')) {
                $table->enum('rol', ['cliente', 'admin'])->default('cliente');     // Quién inicia sesión
            }
            if (!Schema::hasColumn('users', 'pin')) {
                $table->string('pin')->nullable();                                 // PIN encriptado (solo administradora)
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['apellido', 'telefono', 'rol', 'pin']);
        });
    }
};
