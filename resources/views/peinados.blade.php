<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Peinados</title>
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
        }

        /* Grid de Peinados (6 por fila) */
        .peinados-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        /* Tarjeta individual */
        .peinado-card {
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
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }

        .img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            border-radius: 18px;
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

        .peinado-name {
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
            transition: background-color 0.2s;
        }

        .btn-agregar:hover {
            background-color: #f7b6c6;
        }

        /* Paginación Inferior */
        .pagination-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
            margin-top: 10px;
        }

        .page-info {
            font-size: 13px;
            font-weight: bold;
            color: #9C5174;
        }

        .page-btn {
            background-color: #BD4B7B;
            color: white;
            border: none;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.2s ease;
        }

        /* Adaptabilidad responsive */
        @media (max-width: 900px) {
            .peinados-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media (max-width: 550px) {
            .peinados-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>

    <!-- Encabezado -->
    <header>
        <a href="{{ url('/maquillajes') }}" class="back-btn">←</a>
        <div class="header-title-container">
            <h1>Peinados</h1>
        </div>
        <div class="logo-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Look Mágico" onerror="this.src='https://via.placeholder.com/60?text=Logo'">
        </div>
    </header>

    <!-- Contenido Principal -->
    <main>

        <!-- Grid de Peinados -->
        <section class="peinados-grid">

            <!-- Fila 1 -->
            <div class="peinado-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/pei_bajo_pulido.jpg') }}" alt="Bajo Pulido" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Bajo+Pulido'">
                </div>
                <span class="peinado-name">Bajo Pulido</span>
                <a href="{{ route('agenda', ['servicio' => 'bajo_pulido']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="peinado-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/pei_messy_bun.jpg') }}" alt="Messy Bun" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Messy+Bun'">
                </div>
                <span class="peinado-name">Messy Bun</span>
                <a href="{{ route('agenda', ['servicio' => 'messy_bun']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="peinado-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/pei_recogido.jpg') }}" alt="Recogido" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Recogido'">
                </div>
                <span class="peinado-name">Recogido</span>
                <a href="{{ route('agenda', ['servicio' => 'recogido']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="peinado-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/pei_half_up.jpg') }}" alt="Half-up" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Half-up'">
                </div>
                <span class="peinado-name">Half-up</span>
                <a href="{{ route('agenda', ['servicio' => 'half_up']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="peinado-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/pei_semirrecogido.jpg') }}" alt="Semirrecogido" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Semirrecogido'">
                </div>
                <span class="peinado-name">Semirrecogido</span>
                <a href="{{ route('agenda', ['servicio' => 'semirrecogido']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="peinado-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/pei_ondas.jpg') }}" alt="Ondas" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Ondas'">
                </div>
                <span class="peinado-name">Ondas</span>
                <a href="{{ route('agenda', ['servicio' => 'ondas']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <!-- Fila 2 -->
            <div class="peinado-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/pei_liso_espejo.jpg') }}" alt="Liso Espejo" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Liso+Espejo'">
                </div>
                <span class="peinado-name">Liso Espejo</span>
                <a href="{{ route('agenda', ['servicio' => 'liso_espejo']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="peinado-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/pei_beach_waves.jpg') }}" alt="Beach Waves" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Beach+Waves'">
                </div>
                <span class="peinado-name">Beach Waves</span>
                <a href="{{ route('agenda', ['servicio' => 'beach_waves']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="peinado-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/pei_baja_pulida.jpg') }}" alt="Baja Pulida" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Baja+Pulida'">
                </div>
                <span class="peinado-name">Baja Pulida</span>
                <a href="{{ route('agenda', ['servicio' => 'baja_pulida']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="peinado-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/pei_trenzas_sueltas.jpg') }}" alt="Trenzas Sueltas" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Trenzas+Sueltas'">
                </div>
                <span class="peinado-name">Trenzas Sueltas</span>
                <a href="{{ route('agenda', ['servicio' => 'trenzas_sueltas']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="peinado-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/pei_hollywood.jpg') }}" alt="Hollywood" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Hollywood'">
                </div>
                <span class="peinado-name">Hollywood</span>
                <a href="{{ route('agenda', ['servicio' => 'hollywood']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="peinado-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/pei_half_down.jpg') }}" alt="Half-down" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Half-down'">
                </div>
                <span class="peinado-name">Half-down</span>
                <a href="{{ route('agenda', ['servicio' => 'half_down']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

        </section>

        <!-- Redirección directa a la siguiente vista -->
        <a href="{{ route('manicuras', ['manicuras' => '_']) }}" class="btn-agregar">Ver más...</a>
    </main>
</body>
</html>