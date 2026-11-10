<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Tintes</title>
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
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            width: 100%;
        }

        /* Grid de Tintes (3 por fila según el diseño) */
        .tintes-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 25px;
            justify-items: center;
        }

        /* Tarjeta individual */
        .tinte-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            width: 100%;
            max-width: 190px;
        }

        .img-wrapper {
            position: relative;
            width: 100%;
            aspect-ratio: 1 / 1;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        .img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            border-radius: 22px;
        }

        /* Flor decorativa rosa en la esquina */
        .flower-icon {
            position: absolute;
            top: -12px;
            right: -12px;
            font-size: 32px;
            z-index: 2;
            pointer-events: none;
        }

        .tinte-name {
            font-size: 14px;
            font-weight: bold;
            color: #000;
            margin: 10px 0 6px 0;
            text-align: center;
        }

        .btn-agregar {
            background-color: #FFC0CB;
            color: #000;
            border: none;
            padding: 5px 14px;
            border-radius: 15px;
            font-size: 11px;
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
            width: 36px;
            height: 36px;
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
        @media (max-width: 768px) {
            .tintes-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }
        @media (max-width: 480px) {
            .tintes-grid {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>
</head>
<body>

    <!-- Encabezado -->
    <header>
        <a href="{{ url('/pedicuras') }}" class="back-btn">←</a>
        <div class="header-title-container">
            <h1>Tintes</h1>
        </div>
        <div class="logo-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Look Mágico" onerror="this.src='https://via.placeholder.com/60?text=Logo'">
        </div>
    </header>

    <!-- Contenido Principal -->
    <main>

        <!-- Grid de Tintes -->
        <section class="tintes-grid">

            <!-- Fila 1 -->
            <div class="tinte-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/tinte_permanente.jpg') }}" alt="Permanente" onerror="this.src='https://via.placeholder.com/150/9C5174/FFFFFF?text=Permanente'">
                </div>
                <span class="tinte-name">Permanente</span>
                <a href="{{ route('agenda', ['servicio' => 'permanente']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="tinte-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/tinte_permanente_sin_amoniaco.jpg') }}" alt="Permanente sin amoniaco" onerror="this.src='https://via.placeholder.com/150/9C5174/FFFFFF?text=Sin+Amoniaco'">
                </div>
                <span class="tinte-name">Permanente sin amoniaco</span>
                <a href="{{ route('agenda', ['servicio' => 'permanente_sin_amoniaco']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="tinte-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/tinte_demi_permanente.jpg') }}" alt="Demi-permanente" onerror="this.src='https://via.placeholder.com/150/9C5174/FFFFFF?text=Demi-permanente'">
                </div>
                <span class="tinte-name">Demi-permanente</span>
                <a href="{{ route('agenda', ['servicio' => 'demi_permanente']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <!-- Fila 2 -->
            <div class="tinte-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/tinte_semipermanente.jpg') }}" alt="Semipermanente" onerror="this.src='https://via.placeholder.com/150/9C5174/FFFFFF?text=Semipermanente'">
                </div>
                <span class="tinte-name">Semipermanente</span>
                <a href="{{ route('agenda', ['servicio' => 'semipermanente']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="tinte-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/tinte_temporal.jpg') }}" alt="Temporal" onerror="this.src='https://via.placeholder.com/150/9C5174/FFFFFF?text=Temporal'">
                </div>
                <span class="tinte-name">Temporal</span>
                <a href="{{ route('agenda', ['servicio' => 'temporal']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="tinte-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/tinte_henna.jpg') }}" alt="Henna" onerror="this.src='https://via.placeholder.com/150/9C5174/FFFFFF?text=Henna'">
                </div>
                <span class="tinte-name">Henna</span>
                <a href="{{ route('agenda', ['servicio' => 'henna']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

        </section>

        <!-- Botones Paginación -->
        <div class="pagination-container">
            <button class="page-btn" id="btn-prev" onclick="cambiarPagina(-1)">←</button>
            <span class="page-info" id="page-info">Página 1</span>
            <button class="page-btn" id="btn-next" onclick="cambiarPagina(1)">→</button>
        </div>
    </main>

    <!-- Redirección directa a la siguiente vista -->
    <a href="{{ route('rayos', ['rayos' => '_']) }}" class="btn-agregar">Ver más...</a>
</body>
</html>