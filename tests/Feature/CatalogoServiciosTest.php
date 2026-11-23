<?php

namespace Tests\Feature;

use Tests\TestCase;

class CatalogoServiciosTest extends TestCase
{
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