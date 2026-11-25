<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    public function run(): void
    {
        $servicios = [
            // 1. CORTES DE CABELLO (clasificacion.blade.php)
            ['nombre' => 'Pixie', 'categoria' => 'Cortes', 'precio' => 180.00, 'duracion_minutos' => 30, 'imagen' => 'Pixie.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Middle Part', 'categoria' => 'Cortes', 'precio' => 160.00, 'duracion_minutos' => 30, 'imagen' => 'cortemullet.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Corte Recto', 'categoria' => 'Cortes', 'precio' => 150.00, 'duracion_minutos' => 30, 'imagen' => 'corterecto.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Bob Clasico', 'categoria' => 'Cortes', 'precio' => 200.00, 'duracion_minutos' => 40, 'imagen' => 'bobclasico.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'French Bob', 'categoria' => 'Cortes', 'precio' => 220.00, 'duracion_minutos' => 40, 'imagen' => 'frenchbob.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Fade', 'categoria' => 'Cortes', 'precio' => 160.00, 'duracion_minutos' => 30, 'imagen' => 'fade.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Wolf', 'categoria' => 'Cortes', 'precio' => 220.00, 'duracion_minutos' => 45, 'imagen' => 'cortewolf.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Spiky', 'categoria' => 'Cortes', 'precio' => 150.00, 'duracion_minutos' => 30, 'imagen' => 'spiky.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Corte Mariposa', 'categoria' => 'Cortes', 'precio' => 240.00, 'duracion_minutos' => 45, 'imagen' => 'cortemariposa.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Quiff', 'categoria' => 'Cortes', 'precio' => 160.00, 'duracion_minutos' => 30, 'imagen' => 'cortequiff.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Cesar', 'categoria' => 'Cortes', 'precio' => 150.00, 'duracion_minutos' => 30, 'imagen' => 'cortecesar.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Corte Capas', 'categoria' => 'Cortes', 'precio' => 200.00, 'duracion_minutos' => 40, 'imagen' => 'cortecapas.jpg', 'estatus' => 'ALTA'],

            // 2. DEPILACIONES (depilaciones.blade.php)
            ['nombre' => 'Bikini', 'categoria' => 'Depilaciones', 'precio' => 250.00, 'duracion_minutos' => 30, 'imagen' => 'depilaciondebikini.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Axilas', 'categoria' => 'Depilaciones', 'precio' => 120.00, 'duracion_minutos' => 20, 'imagen' => 'depilaciondeaxilas.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Piernas', 'categoria' => 'Depilaciones', 'precio' => 320.00, 'duracion_minutos' => 45, 'imagen' => 'depilaciondepiernas.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Abdomen', 'categoria' => 'Depilaciones', 'precio' => 180.00, 'duracion_minutos' => 25, 'imagen' => 'depilaciondeabdomen.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Bozo', 'categoria' => 'Depilaciones', 'precio' => 80.00, 'duracion_minutos' => 15, 'imagen' => 'depilaciondebozo.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Rostro', 'categoria' => 'Depilaciones', 'precio' => 180.00, 'duracion_minutos' => 30, 'imagen' => 'depilacionderostro.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Brazos', 'categoria' => 'Depilaciones', 'precio' => 220.00, 'duracion_minutos' => 30, 'imagen' => 'depilaciondebrazos.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Dedos', 'categoria' => 'Depilaciones', 'precio' => 70.00, 'duracion_minutos' => 15, 'imagen' => 'depilaciondededos.jpg', 'estatus' => 'ALTA'],

            // 3. MAQUILLAJES (maquillajes.blade.php)
            ['nombre' => 'Natural', 'categoria' => 'Maquillajes', 'precio' => 450.00, 'duracion_minutos' => 45, 'imagen' => 'maquillajenatural.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Social', 'categoria' => 'Maquillajes', 'precio' => 550.00, 'duracion_minutos' => 60, 'imagen' => 'maquillajesocial.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Novia', 'categoria' => 'Maquillajes', 'precio' => 1200.00, 'duracion_minutos' => 90, 'imagen' => 'maquillajenovia.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Fotografía', 'categoria' => 'Maquillajes', 'precio' => 650.00, 'duracion_minutos' => 60, 'imagen' => 'maquillajefotografico.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Artístico', 'categoria' => 'Maquillajes', 'precio' => 850.00, 'duracion_minutos' => 90, 'imagen' => 'maquillajeartistico.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Teatro', 'categoria' => 'Maquillajes', 'precio' => 800.00, 'duracion_minutos' => 90, 'imagen' => 'maquillajeteatral.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Ojos Ahumado', 'categoria' => 'Maquillajes', 'precio' => 600.00, 'duracion_minutos' => 60, 'imagen' => 'maquillajeahumado.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Cut Crease', 'categoria' => 'Maquillajes', 'precio' => 650.00, 'duracion_minutos' => 70, 'imagen' => 'maquillajecutcrease.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Glam', 'categoria' => 'Maquillajes', 'precio' => 700.00, 'duracion_minutos' => 70, 'imagen' => 'maquillajeglam.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Contouring', 'categoria' => 'Maquillajes', 'precio' => 600.00, 'duracion_minutos' => 60, 'imagen' => 'maquillajecontouring.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Strobing', 'categoria' => 'Maquillajes', 'precio' => 580.00, 'duracion_minutos' => 60, 'imagen' => 'maquillajestrobing.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Baking', 'categoria' => 'Maquillajes', 'precio' => 580.00, 'duracion_minutos' => 60, 'imagen' => 'maquillajebaking.jpg', 'estatus' => 'ALTA'],

            // 4. PEINADOS (peinados.blade.php)
            ['nombre' => 'Bajo Pulido', 'categoria' => 'Peinados', 'precio' => 350.00, 'duracion_minutos' => 45, 'imagen' => 'pei_bajo_pulido.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Messy Bun', 'categoria' => 'Peinados', 'precio' => 350.00, 'duracion_minutos' => 45, 'imagen' => 'pei_messy_bun.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Recogido', 'categoria' => 'Peinados', 'precio' => 420.00, 'duracion_minutos' => 60, 'imagen' => 'pei_recogido.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Half-up', 'categoria' => 'Peinados', 'precio' => 320.00, 'duracion_minutos' => 45, 'imagen' => 'pei_half_up.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Semirrecogido', 'categoria' => 'Peinados', 'precio' => 340.00, 'duracion_minutos' => 45, 'imagen' => 'pei_semirrecogido.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Ondas', 'categoria' => 'Peinados', 'precio' => 280.00, 'duracion_minutos' => 40, 'imagen' => 'pei_ondas.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Liso Espejo', 'categoria' => 'Peinados', 'precio' => 260.00, 'duracion_minutos' => 40, 'imagen' => 'pei_liso_espejo.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Beach Waves', 'categoria' => 'Peinados', 'precio' => 290.00, 'duracion_minutos' => 40, 'imagen' => 'pei_beach_waves.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Baja Pulida', 'categoria' => 'Peinados', 'precio' => 330.00, 'duracion_minutos' => 45, 'imagen' => 'pei_baja_pulida.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Trenzas Sueltas', 'categoria' => 'Peinados', 'precio' => 450.00, 'duracion_minutos' => 75, 'imagen' => 'pei_trenzas_sueltas.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Hollywood', 'categoria' => 'Peinados', 'precio' => 420.00, 'duracion_minutos' => 60, 'imagen' => 'pei_hollywood.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Half-down', 'categoria' => 'Peinados', 'precio' => 310.00, 'duracion_minutos' => 45, 'imagen' => 'pei_half_down.jpg', 'estatus' => 'ALTA'],

            // 5. MANICURAS (manicuras.blade.php)
            ['nombre' => 'Manicura Clásica', 'categoria' => 'Manicuras', 'precio' => 160.00, 'duracion_minutos' => 40, 'imagen' => 'mani_clasica.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Manicura Francesa', 'categoria' => 'Manicuras', 'precio' => 200.00, 'duracion_minutos' => 45, 'imagen' => 'mani_francesa.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Manicura Semipermanente', 'categoria' => 'Manicuras', 'precio' => 220.00, 'duracion_minutos' => 45, 'imagen' => 'mani_semipermanente.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Uñas Acrílicas', 'categoria' => 'Manicuras', 'precio' => 380.00, 'duracion_minutos' => 90, 'imagen' => 'mani_acrilicas.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Uñas de Gel', 'categoria' => 'Manicuras', 'precio' => 350.00, 'duracion_minutos' => 75, 'imagen' => 'mani_gel.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'BIAB', 'categoria' => 'Manicuras', 'precio' => 320.00, 'duracion_minutos' => 60, 'imagen' => 'mani_biab.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Rusa', 'categoria' => 'Manicuras', 'precio' => 280.00, 'duracion_minutos' => 60, 'imagen' => 'mani_rusa.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Manicura Spa', 'categoria' => 'Manicuras', 'precio' => 260.00, 'duracion_minutos' => 50, 'imagen' => 'mani_spa.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Japonesa', 'categoria' => 'Manicuras', 'precio' => 250.00, 'duracion_minutos' => 50, 'imagen' => 'mani_japonesa.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Nail Art', 'categoria' => 'Manicuras', 'precio' => 400.00, 'duracion_minutos' => 90, 'imagen' => 'mani_nail_art.jpg', 'estatus' => 'ALTA'],

            // 6. PEDICURAS (pedicuras.blade.php)
            ['nombre' => 'Pedicura Clásica', 'categoria' => 'Pedicuras', 'precio' => 220.00, 'duracion_minutos' => 45, 'imagen' => 'pedi_clasica.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Seco', 'categoria' => 'Pedicuras', 'precio' => 240.00, 'duracion_minutos' => 45, 'imagen' => 'pedi_seco.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Pedicura Semipermanente', 'categoria' => 'Pedicuras', 'precio' => 280.00, 'duracion_minutos' => 50, 'imagen' => 'pedi_semipermanente.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Pedicura Francesa', 'categoria' => 'Pedicuras', 'precio' => 260.00, 'duracion_minutos' => 50, 'imagen' => 'pedi_francesa.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Parafina', 'categoria' => 'Pedicuras', 'precio' => 320.00, 'duracion_minutos' => 60, 'imagen' => 'pedi_parafina.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Piedras Calientes', 'categoria' => 'Pedicuras', 'precio' => 350.00, 'duracion_minutos' => 60, 'imagen' => 'pedi_piedras_calientes.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Pedicura Spa', 'categoria' => 'Pedicuras', 'precio' => 300.00, 'duracion_minutos' => 60, 'imagen' => 'pedi_spa.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Podológica', 'categoria' => 'Pedicuras', 'precio' => 380.00, 'duracion_minutos' => 60, 'imagen' => 'pedi_podologica.jpg', 'estatus' => 'ALTA'],

            // 7. TINTES (tintes.blade.php)
            ['nombre' => 'Permanente', 'categoria' => 'Tintes', 'precio' => 550.00, 'duracion_minutos' => 90, 'imagen' => 'tinte_permanente.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Permanente sin amoniaco', 'categoria' => 'Tintes', 'precio' => 620.00, 'duracion_minutos' => 90, 'imagen' => 'tinte_permanente_sin_amoniaco.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Demi-permanente', 'categoria' => 'Tintes', 'precio' => 500.00, 'duracion_minutos' => 75, 'imagen' => 'tinte_demi_permanente.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Semipermanente', 'categoria' => 'Tintes', 'precio' => 450.00, 'duracion_minutos' => 60, 'imagen' => 'tinte_semipermanente.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Temporal', 'categoria' => 'Tintes', 'precio' => 350.00, 'duracion_minutos' => 45, 'imagen' => 'tinte_temporal.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Henna', 'categoria' => 'Tintes', 'precio' => 480.00, 'duracion_minutos' => 75, 'imagen' => 'tinte_henna.jpg', 'estatus' => 'ALTA'],

            // 8. RAYOS (rayos.blade.php)
            ['nombre' => 'Tradicionales', 'categoria' => 'Rayos', 'precio' => 750.00, 'duracion_minutos' => 120, 'imagen' => 'rayo_tradicionales.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Babylights', 'categoria' => 'Rayos', 'precio' => 950.00, 'duracion_minutos' => 150, 'imagen' => 'rayo_babylights.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Chunky Highlights', 'categoria' => 'Rayos', 'precio' => 800.00, 'duracion_minutos' => 120, 'imagen' => 'rayo_chunky.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Reflejos', 'categoria' => 'Rayos', 'precio' => 700.00, 'duracion_minutos' => 110, 'imagen' => 'rayo_reflejos.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Transparencias', 'categoria' => 'Rayos', 'precio' => 780.00, 'duracion_minutos' => 120, 'imagen' => 'rayo_transparencias.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Balayage', 'categoria' => 'Rayos', 'precio' => 1100.00, 'duracion_minutos' => 180, 'imagen' => 'rayo_balayage.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'French Milky', 'categoria' => 'Rayos', 'precio' => 980.00, 'duracion_minutos' => 150, 'imagen' => 'rayo_french_milky.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Californianas', 'categoria' => 'Rayos', 'precio' => 850.00, 'duracion_minutos' => 135, 'imagen' => 'rayo_californianas.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Face Framing', 'categoria' => 'Rayos', 'precio' => 600.00, 'duracion_minutos' => 90, 'imagen' => 'rayo_face_framing.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Money Piece', 'categoria' => 'Rayos', 'precio' => 620.00, 'duracion_minutos' => 90, 'imagen' => 'rayo_money_piece.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Dorados', 'categoria' => 'Rayos', 'precio' => 800.00, 'duracion_minutos' => 120, 'imagen' => 'rayo_dorados.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Cenizo', 'categoria' => 'Rayos', 'precio' => 880.00, 'duracion_minutos' => 135, 'imagen' => 'rayo_cenizo.jpg', 'estatus' => 'ALTA'],

            // 9. TRATAMIENTOS (tratamientos.blade.php)
            ['nombre' => 'Limpiezas profundas', 'categoria' => 'Tratamientos', 'precio' => 450.00, 'duracion_minutos' => 60, 'imagen' => 'trat_limpieza_profunda.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Peeling químicos', 'categoria' => 'Tratamientos', 'precio' => 550.00, 'duracion_minutos' => 45, 'imagen' => 'trat_peeling_quimico.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Hidratación y Nutrición', 'categoria' => 'Tratamientos', 'precio' => 420.00, 'duracion_minutos' => 50, 'imagen' => 'trat_hidratacion_nutricion.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Radiofrecuencia', 'categoria' => 'Tratamientos', 'precio' => 600.00, 'duracion_minutos' => 45, 'imagen' => 'trat_radiofrecuencia.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Cavitación', 'categoria' => 'Tratamientos', 'precio' => 580.00, 'duracion_minutos' => 45, 'imagen' => 'trat_cavitacion.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Luz Pulsada', 'categoria' => 'Tratamientos', 'precio' => 650.00, 'duracion_minutos' => 45, 'imagen' => 'trat_luz_pulsada.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Botox Capilar', 'categoria' => 'Tratamientos', 'precio' => 520.00, 'duracion_minutos' => 60, 'imagen' => 'trat_botox_capilar.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Queratina', 'categoria' => 'Tratamientos', 'precio' => 750.00, 'duracion_minutos' => 90, 'imagen' => 'trat_queratina.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Cauterización', 'categoria' => 'Tratamientos', 'precio' => 480.00, 'duracion_minutos' => 60, 'imagen' => 'trat_cauterizacion.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Lifting', 'categoria' => 'Tratamientos', 'precio' => 500.00, 'duracion_minutos' => 60, 'imagen' => 'trat_lifting.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Detox', 'categoria' => 'Tratamientos', 'precio' => 400.00, 'duracion_minutos' => 45, 'imagen' => 'trat_detox.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Anticaspa', 'categoria' => 'Tratamientos', 'precio' => 380.00, 'duracion_minutos' => 45, 'imagen' => 'trat_anticaspa.jpg', 'estatus' => 'ALTA'],
        ];

        // Antes "Francesa" era solo de manicura; ahora hay de manicura y de pedicura.
        DB::table('servicios')->where('nombre', 'Francesa')->where('categoria', 'Manicuras')
            ->update(['nombre' => 'Manicura Francesa']);

        // Las imágenes apuntan a los archivos reales de public/img (las mismas que usaban las páginas)
        foreach ($servicios as $servicio) {
            DB::table('servicios')->updateOrInsert(
                [
                    'nombre'    => $servicio['nombre'],
                    'categoria' => $servicio['categoria'],
                ],
                $servicio + ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}