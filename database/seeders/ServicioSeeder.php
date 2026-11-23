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
            ['nombre' => 'Pixie', 'categoria' => 'Cortes', 'precio' => 180.00, 'duracion_minutos' => 30, 'imagen' => 'pixie.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Middle Part', 'categoria' => 'Cortes', 'precio' => 160.00, 'duracion_minutos' => 30, 'imagen' => 'middle_part.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Corte Recto', 'categoria' => 'Cortes', 'precio' => 150.00, 'duracion_minutos' => 30, 'imagen' => 'corte_recto.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Bob Clasico', 'categoria' => 'Cortes', 'precio' => 200.00, 'duracion_minutos' => 40, 'imagen' => 'bob_clasico.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'French Bob', 'categoria' => 'Cortes', 'precio' => 220.00, 'duracion_minutos' => 40, 'imagen' => 'french_bob.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Fade', 'categoria' => 'Cortes', 'precio' => 160.00, 'duracion_minutos' => 30, 'imagen' => 'fade.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Wolf', 'categoria' => 'Cortes', 'precio' => 220.00, 'duracion_minutos' => 45, 'imagen' => 'wolf.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Spiky', 'categoria' => 'Cortes', 'precio' => 150.00, 'duracion_minutos' => 30, 'imagen' => 'spiky.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Corte Mariposa', 'categoria' => 'Cortes', 'precio' => 240.00, 'duracion_minutos' => 45, 'imagen' => 'corte_mariposa.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Quiff', 'categoria' => 'Cortes', 'precio' => 160.00, 'duracion_minutos' => 30, 'imagen' => 'quiff.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Cesar', 'categoria' => 'Cortes', 'precio' => 150.00, 'duracion_minutos' => 30, 'imagen' => 'cesar.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Corte Capas', 'categoria' => 'Cortes', 'precio' => 200.00, 'duracion_minutos' => 40, 'imagen' => 'corte_capas.jpg', 'estatus' => 'ALTA'],

            // 2. DEPILACIONES (depilaciones.blade.php)
            ['nombre' => 'Bikini', 'categoria' => 'Depilaciones', 'precio' => 250.00, 'duracion_minutos' => 30, 'imagen' => 'bikini.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Axilas', 'categoria' => 'Depilaciones', 'precio' => 120.00, 'duracion_minutos' => 20, 'imagen' => 'axilas.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Piernas', 'categoria' => 'Depilaciones', 'precio' => 320.00, 'duracion_minutos' => 45, 'imagen' => 'piernas.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Abdomen', 'categoria' => 'Depilaciones', 'precio' => 180.00, 'duracion_minutos' => 25, 'imagen' => 'abdomen.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Bozo', 'categoria' => 'Depilaciones', 'precio' => 80.00, 'duracion_minutos' => 15, 'imagen' => 'bozo.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Rostro', 'categoria' => 'Depilaciones', 'precio' => 180.00, 'duracion_minutos' => 30, 'imagen' => 'rostro.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Brazos', 'categoria' => 'Depilaciones', 'precio' => 220.00, 'duracion_minutos' => 30, 'imagen' => 'brazos.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Dedos', 'categoria' => 'Depilaciones', 'precio' => 70.00, 'duracion_minutos' => 15, 'imagen' => 'dedos.jpg', 'estatus' => 'ALTA'],

            // 3. MAQUILLAJES (maquillajes.blade.php)
            ['nombre' => 'Natural', 'categoria' => 'Maquillajes', 'precio' => 450.00, 'duracion_minutos' => 45, 'imagen' => 'natural.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Social', 'categoria' => 'Maquillajes', 'precio' => 550.00, 'duracion_minutos' => 60, 'imagen' => 'social.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Novia', 'categoria' => 'Maquillajes', 'precio' => 1200.00, 'duracion_minutos' => 90, 'imagen' => 'novia.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Fotografía', 'categoria' => 'Maquillajes', 'precio' => 650.00, 'duracion_minutos' => 60, 'imagen' => 'fotografia.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Artístico', 'categoria' => 'Maquillajes', 'precio' => 850.00, 'duracion_minutos' => 90, 'imagen' => 'artistico.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Teatro', 'categoria' => 'Maquillajes', 'precio' => 800.00, 'duracion_minutos' => 90, 'imagen' => 'teatro.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Ojos Ahumado', 'categoria' => 'Maquillajes', 'precio' => 600.00, 'duracion_minutos' => 60, 'imagen' => 'ojos_ahumado.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Cut Crease', 'categoria' => 'Maquillajes', 'precio' => 650.00, 'duracion_minutos' => 70, 'imagen' => 'cut_crease.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Glam', 'categoria' => 'Maquillajes', 'precio' => 700.00, 'duracion_minutos' => 70, 'imagen' => 'glam.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Contouring', 'categoria' => 'Maquillajes', 'precio' => 600.00, 'duracion_minutos' => 60, 'imagen' => 'contouring.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Strobing', 'categoria' => 'Maquillajes', 'precio' => 580.00, 'duracion_minutos' => 60, 'imagen' => 'strobing.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Baking', 'categoria' => 'Maquillajes', 'precio' => 580.00, 'duracion_minutos' => 60, 'imagen' => 'baking.jpg', 'estatus' => 'ALTA'],

            // 4. PEINADOS (peinados.blade.php)
            ['nombre' => 'Bajo Pulido', 'categoria' => 'Peinados', 'precio' => 350.00, 'duracion_minutos' => 45, 'imagen' => 'bajo_pulido.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Messy Bun', 'categoria' => 'Peinados', 'precio' => 350.00, 'duracion_minutos' => 45, 'imagen' => 'messy_bun.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Recogido', 'categoria' => 'Peinados', 'precio' => 420.00, 'duracion_minutos' => 60, 'imagen' => 'recogido.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Half-up', 'categoria' => 'Peinados', 'precio' => 320.00, 'duracion_minutos' => 45, 'imagen' => 'half_up.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Semirrecogido', 'categoria' => 'Peinados', 'precio' => 340.00, 'duracion_minutos' => 45, 'imagen' => 'semirrecogido.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Ondas', 'categoria' => 'Peinados', 'precio' => 280.00, 'duracion_minutos' => 40, 'imagen' => 'ondas.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Liso Espejo', 'categoria' => 'Peinados', 'precio' => 260.00, 'duracion_minutos' => 40, 'imagen' => 'liso_espejo.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Beach Waves', 'categoria' => 'Peinados', 'precio' => 290.00, 'duracion_minutos' => 40, 'imagen' => 'beach_waves.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Baja Pulida', 'categoria' => 'Peinados', 'precio' => 330.00, 'duracion_minutos' => 45, 'imagen' => 'baja_pulida.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Trenzas Sueltas', 'categoria' => 'Peinados', 'precio' => 450.00, 'duracion_minutos' => 75, 'imagen' => 'trenzas_sueltas.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Hollywood', 'categoria' => 'Peinados', 'precio' => 420.00, 'duracion_minutos' => 60, 'imagen' => 'hollywood.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Half-down', 'categoria' => 'Peinados', 'precio' => 310.00, 'duracion_minutos' => 45, 'imagen' => 'half_down.jpg', 'estatus' => 'ALTA'],

            // 5. MANICURAS (manicuras.blade.php)
            ['nombre' => 'Manicura Clásica', 'categoria' => 'Manicuras', 'precio' => 160.00, 'duracion_minutos' => 40, 'imagen' => 'manicura_clasica.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Manicura Francesa', 'categoria' => 'Manicuras', 'precio' => 200.00, 'duracion_minutos' => 45, 'imagen' => 'manicura_francesa.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Manicura Semipermanente', 'categoria' => 'Manicuras', 'precio' => 220.00, 'duracion_minutos' => 45, 'imagen' => 'manicura_semipermanente.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Uñas Acrílicas', 'categoria' => 'Manicuras', 'precio' => 380.00, 'duracion_minutos' => 90, 'imagen' => 'unas_acrilicas.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Uñas de Gel', 'categoria' => 'Manicuras', 'precio' => 350.00, 'duracion_minutos' => 75, 'imagen' => 'unas_gel.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'BIAB', 'categoria' => 'Manicuras', 'precio' => 320.00, 'duracion_minutos' => 60, 'imagen' => 'biab.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Rusa', 'categoria' => 'Manicuras', 'precio' => 280.00, 'duracion_minutos' => 60, 'imagen' => 'rusa.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Manicura Spa', 'categoria' => 'Manicuras', 'precio' => 260.00, 'duracion_minutos' => 50, 'imagen' => 'manicura_spa.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Japonesa', 'categoria' => 'Manicuras', 'precio' => 250.00, 'duracion_minutos' => 50, 'imagen' => 'japonesa.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Nail Art', 'categoria' => 'Manicuras', 'precio' => 400.00, 'duracion_minutos' => 90, 'imagen' => 'nail_art.jpg', 'estatus' => 'ALTA'],

            // 6. PEDICURAS (pedicuras.blade.php)
            ['nombre' => 'Pedicura Clásica', 'categoria' => 'Pedicuras', 'precio' => 220.00, 'duracion_minutos' => 45, 'imagen' => 'pedicura_clasica.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Seco', 'categoria' => 'Pedicuras', 'precio' => 240.00, 'duracion_minutos' => 45, 'imagen' => 'seco.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Pedicura Semipermanente', 'categoria' => 'Pedicuras', 'precio' => 280.00, 'duracion_minutos' => 50, 'imagen' => 'pedicura_semipermanente.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Pedicura Francesa', 'categoria' => 'Pedicuras', 'precio' => 260.00, 'duracion_minutos' => 50, 'imagen' => 'pedicura_francesa.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Parafina', 'categoria' => 'Pedicuras', 'precio' => 320.00, 'duracion_minutos' => 60, 'imagen' => 'parafina.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Piedras Calientes', 'categoria' => 'Pedicuras', 'precio' => 350.00, 'duracion_minutos' => 60, 'imagen' => 'piedras_calientes.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Pedicura Spa', 'categoria' => 'Pedicuras', 'precio' => 300.00, 'duracion_minutos' => 60, 'imagen' => 'pedicura_spa.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Podológica', 'categoria' => 'Pedicuras', 'precio' => 380.00, 'duracion_minutos' => 60, 'imagen' => 'podologica.jpg', 'estatus' => 'ALTA'],

            // 7. TINTES (tintes.blade.php)
            ['nombre' => 'Permanente', 'categoria' => 'Tintes', 'precio' => 550.00, 'duracion_minutos' => 90, 'imagen' => 'permanente.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Permanente sin amoniaco', 'categoria' => 'Tintes', 'precio' => 620.00, 'duracion_minutos' => 90, 'imagen' => 'permanente_sin_amoniaco.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Demi-permanente', 'categoria' => 'Tintes', 'precio' => 500.00, 'duracion_minutos' => 75, 'imagen' => 'demi_permanente.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Semipermanente', 'categoria' => 'Tintes', 'precio' => 450.00, 'duracion_minutos' => 60, 'imagen' => 'semipermanente.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Temporal', 'categoria' => 'Tintes', 'precio' => 350.00, 'duracion_minutos' => 45, 'imagen' => 'temporal.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Henna', 'categoria' => 'Tintes', 'precio' => 480.00, 'duracion_minutos' => 75, 'imagen' => 'henna.jpg', 'estatus' => 'ALTA'],

            // 8. RAYOS (rayos.blade.php)
            ['nombre' => 'Tradicionales', 'categoria' => 'Rayos', 'precio' => 750.00, 'duracion_minutos' => 120, 'imagen' => 'tradicionales.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Babylights', 'categoria' => 'Rayos', 'precio' => 950.00, 'duracion_minutos' => 150, 'imagen' => 'babylights.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Chunky Highlights', 'categoria' => 'Rayos', 'precio' => 800.00, 'duracion_minutos' => 120, 'imagen' => 'chunky_highlights.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Reflejos', 'categoria' => 'Rayos', 'precio' => 700.00, 'duracion_minutos' => 110, 'imagen' => 'reflejos.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Transparencias', 'categoria' => 'Rayos', 'precio' => 780.00, 'duracion_minutos' => 120, 'imagen' => 'transparencias.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Balayage', 'categoria' => 'Rayos', 'precio' => 1100.00, 'duracion_minutos' => 180, 'imagen' => 'balayage.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'French Milky', 'categoria' => 'Rayos', 'precio' => 980.00, 'duracion_minutos' => 150, 'imagen' => 'french_milky.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Californianas', 'categoria' => 'Rayos', 'precio' => 850.00, 'duracion_minutos' => 135, 'imagen' => 'californianas.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Face Framing', 'categoria' => 'Rayos', 'precio' => 600.00, 'duracion_minutos' => 90, 'imagen' => 'face_framing.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Money Piece', 'categoria' => 'Rayos', 'precio' => 620.00, 'duracion_minutos' => 90, 'imagen' => 'money_piece.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Dorados', 'categoria' => 'Rayos', 'precio' => 800.00, 'duracion_minutos' => 120, 'imagen' => 'dorados.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Cenizo', 'categoria' => 'Rayos', 'precio' => 880.00, 'duracion_minutos' => 135, 'imagen' => 'cenizo.jpg', 'estatus' => 'ALTA'],

            // 9. TRATAMIENTOS (tratamientos.blade.php)
            ['nombre' => 'Limpiezas profundas', 'categoria' => 'Tratamientos', 'precio' => 450.00, 'duracion_minutos' => 60, 'imagen' => 'limpiezas_profundas.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Peeling químicos', 'categoria' => 'Tratamientos', 'precio' => 550.00, 'duracion_minutos' => 45, 'imagen' => 'peeling_quimicos.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Hidratación y Nutrición', 'categoria' => 'Tratamientos', 'precio' => 420.00, 'duracion_minutos' => 50, 'imagen' => 'hidratacion_nutricion.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Radiofrecuencia', 'categoria' => 'Tratamientos', 'precio' => 600.00, 'duracion_minutos' => 45, 'imagen' => 'radiofrecuencia.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Cavitación', 'categoria' => 'Tratamientos', 'precio' => 580.00, 'duracion_minutos' => 45, 'imagen' => 'cavitacion.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Luz Pulsada', 'categoria' => 'Tratamientos', 'precio' => 650.00, 'duracion_minutos' => 45, 'imagen' => 'luz_pulsada.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Botox Capilar', 'categoria' => 'Tratamientos', 'precio' => 520.00, 'duracion_minutos' => 60, 'imagen' => 'botox_capilar.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Queratina', 'categoria' => 'Tratamientos', 'precio' => 750.00, 'duracion_minutos' => 90, 'imagen' => 'queratina.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Cauterización', 'categoria' => 'Tratamientos', 'precio' => 480.00, 'duracion_minutos' => 60, 'imagen' => 'cauterizacion.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Lifting', 'categoria' => 'Tratamientos', 'precio' => 500.00, 'duracion_minutos' => 60, 'imagen' => 'lifting.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Detox', 'categoria' => 'Tratamientos', 'precio' => 400.00, 'duracion_minutos' => 45, 'imagen' => 'detox.jpg', 'estatus' => 'ALTA'],
            ['nombre' => 'Anticaspa', 'categoria' => 'Tratamientos', 'precio' => 380.00, 'duracion_minutos' => 45, 'imagen' => 'anticaspa.jpg', 'estatus' => 'ALTA'],
        ];

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