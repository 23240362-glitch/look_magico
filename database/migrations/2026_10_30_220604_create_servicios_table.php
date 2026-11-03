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
    Schema::create('servicios', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');                  // Ej. Corte Pixie, Uñas Acrílicas
        $table->string('categoria');               // Ej. Cabello, Manos y Pies, Rostro
       // $table->string('subcategoria');            // Ej. Mujer/Hombre  //Agregada por observaciones 
        $table->decimal('precio', 8, 2);           // Ej. 150.00
        $table->integer('duracion_minutos')->default(30); // Ej. 30, 45, 60
      //$table->integer('duracion_horas')->default(1); // Ej. 1, 2, 3   //Agregada por observaciones
        $table->string('imagen')->nullable();      // Ej. pixie.jpg
        $table->enum('estatus', ['ALTA', 'BAJA'])->default('ALTA');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
