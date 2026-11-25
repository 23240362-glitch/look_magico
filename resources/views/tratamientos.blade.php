<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Tratamientos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial Rounded MT Bold', 'Segoe UI', sans-serif;
        }

        body {
            background-color: #FAF0E6;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        /* Encabezado superior Mauve */
        header {
            background-color: #9C5174;
            color: white;
            padding: 12px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }

        .back-btn {
            color: white;
            font-size: 24px;
            text-decoration: none;
            font-weight: bold;
        }

        .header-title-container {
            flex-grow: 1;
            margin-left: 20px;
        }

        .header-title-container h1 {
            font-size: 24px;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .logo-box {
            width: 75px;
            background-color: white;
            border-radius: 15px;
            padding: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }

        .logo-box img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        /* Contenido Principal */
        main {
            flex: 1;
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px;
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Filtros Por Categoría */
        .filter-container {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .filter-btn {
            border: none;
            padding: 8px 22px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            text-decoration: underline;
            transition: opacity 0.2s, background-color 0.2s;
            background-color: #8C99AA;
            color: #000;
        }

        .filter-btn.active {
            background-color: #FFC0CB;
            color: #000;
        }

        .filter-btn:hover {
            opacity: 0.85;
        }

        /* Grid de Tratamientos (6 por fila) */
        .tratamientos-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        /* Tarjeta individual */
        .tratamiento-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .img-wrapper {
            position: relative;
            width: 100%;
            aspect-ratio: 1 / 1;
            border-radius: 18px;
            overflow: hidden;
        }

        .img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            border-radius: 18px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }

        /* Flor decorativa rosa en la esquina */
        .flower-icon {
            position: absolute;
            top: -10px;
            right: -10px;
            font-size: 26px;
            z-index: 2;
            pointer-events: none;
        }

        .tratamiento-name {
            font-size: 13px;
            font-weight: bold;
            color: #000;
            margin: 8px 0 4px 0;
            text-align: center;
        }

        .btn-agregar {
            background-color: #FFC0CB;
            color: #000;
            border: none;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 10px;
            font-weight: bold;
            text-decoration: underline;
            cursor: pointer;
            white-space: nowrap;
            text-align: center;
        }

        .btn-agregar:hover {
            background-color: #f7b6c6;
        }

        /* Estilo del botón Ver más (alineado al final como en la plantilla) */
        .btn-ver-mas {
            align-self: flex-end;
            margin-top: auto;
        }

        /* Adaptabilidad en pantallas más pequeñas */
        @media (max-width: 900px) {
            .tratamientos-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media (max-width: 550px) {
            .tratamientos-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>

    <!-- Encabezado -->
    <header>
        <a href="{{ url('/pedicuras') }}" class="back-btn">←</a>
        <div class="header-title-container">
            <h1>Tratamientos</h1>
        </div>
        <div class="logo-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Look Mágico" onerror="this.src='https://via.placeholder.com/60?text=Logo'">
        </div>
    </header>

    <!-- Contenido Principal -->
    <main>
        <!-- Filtros por Tipo de Tratamiento -->
        <div class="filter-container">
            <button class="filter-btn active" onclick="filtrar('todos', this)">🌟 Todos</button>
            <button class="filter-btn" onclick="filtrar('faciales', this)">💆‍♀️ Faciales</button>
            <button class="filter-btn" onclick="filtrar('corporales', this)">🧘‍♀️ Corporales</button>
            <button class="filter-btn" onclick="filtrar('capilares', this)">💇‍♀️ Capilares</button>
        </div>

        <!-- Grid de Tratamientos -->
        <section class="tratamientos-grid">

            {{-- Clasificación de cada servicio para los botones de filtro --}}
            @php
                $tipoPor = [
                    'Limpiezas profundas' => 'faciales',
                    'Peeling químicos' => 'faciales',
                    'Hidratación y Nutrición' => 'faciales',
                    'Radiofrecuencia' => 'faciales',
                    'Cavitación' => 'corporales',
                    'Luz Pulsada' => 'corporales',
                    'Botox Capilar' => 'capilares',
                    'Queratina' => 'capilares',
                    'Cauterización' => 'capilares',
                    'Lifting' => 'capilares',
                    'Detox' => 'capilares',
                    'Anticaspa' => 'capilares',
                ];
            @endphp

            {{-- Los servicios se leen de la base de datos (solo los dados de ALTA de esta categoría) --}}
            @forelse ($servicios as $servicio)
            <div class="tratamiento-card" data-tipo="{{ $tipoPor[$servicio->nombre] ?? 'faciales' }}">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/' . ($servicio->imagen ?? 'logo.png')) }}" alt="{{ $servicio->nombre }}" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Look+Magico'">
                </div>
                <span class="tratamiento-name">{{ $servicio->nombre }}</span>
                @if ($servicio->precio > 0)
                    <span style="font-size: 12px; color: #9C5174; font-weight: bold; margin-bottom: 6px;">${{ number_format($servicio->precio, 2) }} · {{ $servicio->duracion_minutos }} min</span>
                @else
                    <span style="font-size: 12px; color: #9C5174; font-weight: bold; margin-bottom: 6px;">Precio por confirmar</span>
                @endif
                <a href="{{ route('agenda', ['servicio_id' => $servicio->id]) }}" class="btn-agregar">Agregar Servicio</a>
            </div>
            @empty
                <p style="grid-column: 1 / -1; text-align: center; font-weight: bold; color: #9C5174;">Por el momento no hay servicios disponibles en esta categoría.</p>
            @endforelse

        </section>

        <!-- Redirección directa a inicio -->
        <a href="{{ url('/') }}" class="btn-agregar btn-ver-mas">Volver a Inicio</a>
    </main>

    <script>
        function filtrar(categoria, btn) {
            const tarjetas = document.querySelectorAll('.tratamiento-card');
            const botones = document.querySelectorAll('.filter-btn');

            // Actualizar estilo de botón activo
            botones.forEach(b => b.classList.remove('active'));
            if (btn) btn.classList.add('active');

            // Filtrar elementos en pantalla
            tarjetas.forEach(card => {
                if (categoria === 'todos' || card.dataset.tipo === categoria) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>