<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogoServiciosTest extends TestCase
{
    // Las páginas de servicios ahora leen la base de datos, así que la prueba necesita las tablas
    use RefreshDatabase;

    public function test_pantalla_tintes_carga_correctamente(): void
    {
        $response = $this->get('/tintes');

        $response->assertStatus(200);
    }

    public function test_pantalla_tratamientos_carga_correctamente(): void
    {
        $response = $this->get('/tratamientos');

        $response->assertStatus(200);
    }

    public function test_pantalla_clasificacion_servicios_carga_correctamente(): void
    {
        $response = $this->get('/clasificacion');

        $response->assertStatus(200);
    }
}