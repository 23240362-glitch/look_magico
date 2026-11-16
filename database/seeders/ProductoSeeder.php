<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    // Carga en la tabla productos los mismos productos que se ven en el catálogo.
    // Se ejecuta con: php artisan db:seed --class=ProductoSeeder
    public function run(): void
    {
        $productos = [
            // ================= SHAMPOOS =================
            [
                'nombre' => 'Shampoo Matizador',
                'marca' => 'Gab Natura',
                'categoria' => 'Shampoos',
                'precio' => 280.00,
                'descripcion' => 'Neutraliza cabellos amarillos o cobrizos, ideal para cabellos rubios. Mantiene el rubio deseado y aporta brillo y luminosidad.',
                'imagen' => 'shampoo_matizador.jpg',
                'stock' => 20,
                'estatus' => 1,
            ],
            [
                'nombre' => 'Shampoo Menta',
                'marca' => 'Gab Natura',
                'categoria' => 'Shampoos',
                'precio' => 250.00,
                'descripcion' => 'Brinda frescura y limpieza segura, controla la grasa del cuero cabelludo y es libre de sulfatos.',
                'imagen' => 'shampoo_menta.jpg',
                'stock' => 20,
                'estatus' => 1,
            ],
            [
                'nombre' => 'Shampoo de Café',
                'marca' => 'Gab Natura',
                'categoria' => 'Shampoos',
                'precio' => 260.00,
                'descripcion' => 'Control de caída; limpia suavemente, estimula el crecimiento, fortalece la fibra capilar y reduce la caída.',
                'imagen' => 'shampoo_cafe.jpg',
                'stock' => 20,
                'estatus' => 1,
            ],
            [
                'nombre' => 'Shampoo de Colágeno y Argán',
                'marca' => 'Gab Natura',
                'categoria' => 'Shampoos',
                'precio' => 270.00,
                'descripcion' => 'Fortalece el cabello, hidrata el cuero cabelludo y aporta extra brillo y sedosidad. Ideal para reparar el cabello seco.',
                'imagen' => 'shampoo_colageno_argan.jpg',
                'stock' => 20,
                'estatus' => 1,
            ],

            // ================= ACONDICIONADORES =================
            [
                'nombre' => 'Acondicionador Matizador',
                'marca' => 'Gab Natura',
                'categoria' => 'Acondicionadores',
                'precio' => 280.00,
                'descripcion' => 'Neutraliza el tono cobrizo no deseado y deja un aspecto brillante y fresco en cabellos decolorados.',
                'imagen' => 'acondicionador_matizador.jpg',
                'stock' => 20,
                'estatus' => 1,
            ],
            [
                'nombre' => 'Acondicionador de Café',
                'marca' => 'Gab Natura',
                'categoria' => 'Acondicionadores',
                'precio' => 260.00,
                'descripcion' => 'Hidrata y desenreda, mejora la textura, reduce el frizz y deja un aroma delicioso.',
                'imagen' => 'acondicionador_cafe.jpg',
                'stock' => 20,
                'estatus' => 1,
            ],
            [
                'nombre' => 'Acondicionador Colágeno y Argán',
                'marca' => 'Gab Natura',
                'categoria' => 'Acondicionadores',
                'precio' => 270.00,
                'descripcion' => 'Fortalece profundamente el cabello dañado por el uso constante de herramientas de calor.',
                'imagen' => 'acondicionador_colageno_argan.jpg',
                'stock' => 20,
                'estatus' => 1,
            ],

            // ================= TRATAMIENTOS =================
            [
                'nombre' => 'Ampolleta One Phase (Colágeno y Argán)',
                'marca' => 'Gab Natura',
                'categoria' => 'Tratamientos',
                'precio' => 120.00,
                'descripcion' => 'Repara, nutre y restaura el cabello seco o maltratado por factores como el sol, calor o procesos químicos.',
                'imagen' => 'ampolleta_one_phase.jpg',
                'stock' => 30,
                'estatus' => 1,
            ],
            [
                'nombre' => 'Crema Capilar Ácido Hialurónico (Leave-In)',
                'marca' => 'Gab Natura',
                'categoria' => 'Tratamientos',
                'precio' => 290.00,
                'descripcion' => 'Hidrata y fortalece profundamente el cabello y cuero cabelludo, combate el frizz y facilita el desenredo y peinado. Protege ante sol, planchas, secadoras o tintes.',
                'imagen' => 'crema_capilar_hialuronico.jpg',
                'stock' => 20,
                'estatus' => 1,
            ],
            [
                'nombre' => 'Mascarilla Intensiva de Colágeno y Argán',
                'marca' => 'Gab Natura',
                'categoria' => 'Tratamientos',
                'precio' => 320.00,
                'descripcion' => 'Repara profundamente, devuelve brillo y vitalidad. Ideal para todo tipo de cabello, especialmente cabello extremadamente decolorado o seco.',
                'imagen' => 'mascarilla_colageno_argan.jpg',
                'stock' => 18,
                'estatus' => 1,
            ],
            [
                'nombre' => 'Tónico Fortificante Multivitamínico',
                'marca' => 'Gab Natura',
                'categoria' => 'Tratamientos',
                'precio' => 350.00,
                'descripcion' => 'Tratamiento tópico que estimula los folículos pilosos, frena la caída del cabello y promueve la regeneración capilar en casos de alopecia androgenética. Resultados visibles desde la primera semana.',
                'imagen' => 'tonico_fortificante.jpg',
                'stock' => 15,
                'estatus' => 1,
            ],
            [
                'nombre' => 'Seda de Macadamia',
                'marca' => 'Gab Natura',
                'categoria' => 'Tratamientos',
                'precio' => 260.00,
                'descripcion' => 'Aporta suavidad, extra brillo y control de frizz mientras repara y sella las puntas abiertas.',
                'imagen' => 'seda_macadamia.jpg',
                'stock' => 20,
                'estatus' => 1,
            ],

            // ================= SKINCARE Y CORPORAL =================
            [
                'nombre' => 'Crema Facial de Colágeno y Elastina',
                'marca' => 'Gab Natura',
                'categoria' => 'Skincare y Corporal',
                'precio' => 310.00,
                'descripcion' => 'Mejora la firmeza y elasticidad de la piel, reduce la apariencia de arrugas y líneas de expresión, y ayuda a prevenir los signos de envejecimiento.',
                'imagen' => 'crema_facial_colageno.jpg',
                'stock' => 20,
                'estatus' => 1,
            ],
            [
                'nombre' => 'Crema Exfoliante de Nuez',
                'marca' => 'Gab Natura',
                'categoria' => 'Skincare y Corporal',
                'precio' => 240.00,
                'descripcion' => 'Elimina células muertas, brinda suavidad y luminosidad, y estimula la producción de colágeno contribuyendo a una piel más firme.',
                'imagen' => 'crema_exfoliante_nuez.jpg',
                'stock' => 20,
                'estatus' => 1,
            ],
            [
                'nombre' => 'Body Fresh (Perfume Corporal y Capilar)',
                'marca' => 'Gab Natura',
                'categoria' => 'Skincare y Corporal',
                'precio' => 220.00,
                'descripcion' => 'Refresca e hidrata la piel todo el día con tan solo tres gotas; funciona también como perfume capilar gracias a su ligera composición (evitar frotar las áreas rociadas para prolongar su duración).',
                'imagen' => 'body_fresh.jpg',
                'stock' => 25,
                'estatus' => 1,
            ],
        ];

        foreach ($productos as $producto) {
            Producto::updateOrCreate(
                ['nombre' => $producto['nombre']],
                $producto
            );
        }
    }
}