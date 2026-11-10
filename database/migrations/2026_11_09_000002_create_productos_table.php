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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');                     // Ej. Shampoo Hidratante
            $table->string('marca');                      // Ej. Redken, Olaplex
            $table->string('categoria');                  // Ej. Shampoos, Acondicionadores, Tratamientos
            $table->decimal('precio', 8, 2);              // Ej. 389.00
            $table->text('descripcion')->nullable();      // Detalles o instrucciones de uso
            $table->string('imagen')->nullable();         // Ej. shampoo_hidratante.png
            $table->integer('stock')->default(0);         // Piezas disponibles en el salón
            $table->enum('estatus', ['ALTA', 'BAJA'])->default('ALTA');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
