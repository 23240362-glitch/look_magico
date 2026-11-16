<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class AutenticacionFlujoTest extends TestCase
{
    // Limpia y migra la base de datos temporalmente en cada prueba para no ensuciar tus datos reales
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

        // 1. Verifica que redirige a la vista de inicio del cliente
        $response->assertRedirect(route('cliente.inicio'));

        // 2. Verifica que el usuario quedó autenticado en la sesión
        $this->assertAuthenticated();

        // 3. Verifica que los datos se guardaron realmente en la tabla 'users'
        $this->assertDatabaseHas('users', [
            'name'     => 'Sofía',
            'apellido' => 'Ramírez',
            'email'    => 'sofia.prueba@gmail.com',
            'telefono' => '4771234567',
            'rol'      => 'cliente',
        ]);
    }

    /**
     * Prueba 3: Verifica que un usuario ya registrado pueda iniciar sesión por el login de clienta
     */
    public function test_cliente_registrado_puede_hacer_login(): void
    {
        // Creamos un usuario previo en la BD de pruebas
        $user = User::create([
            'name'     => 'Valeria',
            'apellido' => 'Gómez',
            'email'    => 'valeria@gmail.com',
            'telefono' => '4779876543',
            'password' => Hash::make('clave1234'),
            'rol'      => 'cliente',
        ]);

        // Simulamos el envío del formulario de login
        $response = $this->post('/login', [
            'email'    => 'valeria@gmail.com',
            'password' => 'clave1234',
        ]);

        $response->assertRedirect(route('cliente.inicio'));
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Prueba 4: Verifica que las rutas protegidas bloqueen a usuarios sin sesión
     */
    public function test_ruta_protegida_redirige_si_no_hay_sesion(): void
    {
        $response = $this->get('/cliente/inicio');

        // Debe expulsar al usuario no autenticado hacia el login
        $response->assertRedirect('/login');
        $this->assertGuest();
    }
}