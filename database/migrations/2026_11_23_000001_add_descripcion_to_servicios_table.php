<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // El formulario de servicios pide una descripción (RF01 y RF04),
    // pero la tabla no tenía dónde guardarla.
    public function up(): void
    {
        Schema::table('servicios', function (Blueprint $table) {
            if (!Schema::hasColumn('servicios', 'descripcion')) {
                $table->text('descripcion')->nullable()->after('categoria');   // Qué incluye el servicio
            }
        });
    }

    public function down(): void
    {
        Schema::table('servicios', function (Blueprint $table) {
            if (Schema::hasColumn('servicios', 'descripcion')) {
                $table->dropColumn('descripcion');
            }
        });
    }
};
