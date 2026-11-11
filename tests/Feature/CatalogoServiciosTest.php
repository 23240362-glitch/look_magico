<?php

namespace Tests\Feature;

use Tests\TestCase;

class CatalogoServiciosTest extends TestCase
{
    /**
     * CP-02: Verificar que la vista de Tintes carga correctamente.
     */
    public function test_pantalla_tintes_carga_correctamente(): void
    {
        $response = $this->get('/tintes');

        $response->assertStatus(200);
        $response->assertSee('Tintes');
    }

    /**
     * CP-03: Verificar que la vista de Tratamientos carga correctamente.
     */
    public function test_pantalla_tratamientos_carga_correctamente(): void
    {
        $response = $this->get('/tratamientos');

        $response->assertStatus(200);
        $response->assertSee('Tratamientos');
        $response->assertSee('Faciales');
    }

    /**
     * CP-05: Verificar el acceso a la vista principal del cliente.
     */
    public function test_pantalla_cliente_inicio_carga_correctamente(): void
    {
        $response = $this->get('/cliente/inicio');

        $response->assertStatus(200);
    }
}