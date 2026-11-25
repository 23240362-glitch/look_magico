<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AutenticacionFlujoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Prueba 1: Verifica que la pantalla de registro cargue correctamente (HTTP 200)
     */
    public function test_pantalla_de_registro_carga_correctamente(): void
    {
        $response = $this->get('/registro');

        $response->assertStatus(200);
        $response->assertSee('REGÍSTRATE');
    }

    /**
     * Prueba 2: Simula el envío completo del formulario de registro,
     * verifica que se guarde en MySQL, que inicie sesión y redirija al inicio del cliente.
     */
    public function test_cliente_puede_registrarse_e_iniciar_sesion_automaticamente(): void
    {
        $response = $this->post('/registro', [
            'name'                  => 'Sofía',
            'apellido'              => 'Ramírez',
            'email'                 => 'sofia.prueba@gmail.com',
            'telefono'              => '4771234567',
            'password'              => 'secreto123',
            'password_confirmation' => 'secreto123',
        ]);

        $response->assertRedirect(route('cliente.inicio'));
        $this->assertAuthenticated();

        $this->assertDatabaseHas('users', [
            'name'     => 'Sofía',
            'apellido' => 'Ramírez',
            'email'    => 'sofia.prueba@gmail.com',
            'telefono' => '4771234567',
            'rol'      => 'cliente',
        ]);
    }

    /**
     * Prueba 3: Registra una clienta mediante el formulario libre, cierra sesión
     * y verifica que pueda volver a entrar por el login de clienta.
     */
    public function test_cliente_registrado_puede_hacer_login(): void
    {
        // 1. Registro libre a través de la ruta /registro
        $this->post('/registro', [
            'name'                  => 'Valeria',
            'apellido'              => 'Gómez',
            'email'                 => 'valeria@gmail.com',
            'telefono'              => '4779876543',
            'password'              => 'clave1234',
            'password_confirmation' => 'clave1234',
        ]);

        // 2. Cerramos sesión para probar el login desde cero
        $this->post('/logout');
        $this->assertGuest();

        // 3. Simulamos el envío del formulario de login real
        $response = $this->post(route('login.cliente.post'), [
            'email'    => 'valeria@gmail.com',
            'password' => 'clave1234',
        ]);

        $response->assertRedirect(route('cliente.inicio'));
        $this->assertAuthenticated();
    }

    /**
     * Prueba 4: Verifica que las rutas protegidas bloqueen a usuarios sin sesión
     */
    public function test_ruta_protegida_redirige_si_no_hay_sesion(): void
    {
        $response = $this->get('/agenda');

        $response->assertRedirect(route('login.roles'));
        $this->assertGuest();
    }
}