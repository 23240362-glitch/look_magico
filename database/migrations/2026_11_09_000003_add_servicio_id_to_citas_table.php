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
        // Relaciona cada cita con un servicio del catálogo (llave foránea).
        // Se conserva la columna "servicio" (texto) para no afectar la agenda.
        Schema::table('citas', function (Blueprint $table) {
            if (!Schema::hasColumn('citas', 'servicio_id')) {
                $table->foreignId('servicio_id')
                      ->nullable()
                      ->after('user_id')
                      ->constrained('servicios')
                      ->nullOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->dropConstrainedForeignId('servicio_id');
        });
    }
};
