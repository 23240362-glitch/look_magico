<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Cortes de Cabello</title>
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

        /* Filtros Por Género */
        .filter-container {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .filter-btn {
            border: none;
            padding: 8px 22px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            text-decoration: underline;
            transition: opacity 0.2s;
        }

        .filter-btn.active-all {
            background-color: #FFC0CB;
            color: #000;
        }

        .filter-btn.gender-btn {
            background-color: #8C99AA;
            color: #000;
        }

        .filter-btn:hover {
            opacity: 0.85;
        }

        /* Grid de Cortes de Cabello (6 por fila) */
        .cortes-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        /* Tarjeta individual */
        .corte-card {
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

        .corte-name {
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
        }

        .btn-agregar:hover {
            background-color: #f7b6c6;
        }

        /* Paginación Inferior */
        .pagination-container {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 10px;
        }

        .page-btn {
            background-color: #BD4B7B;
            color: white;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Adaptabilidad en pantallas más pequeñas */
        @media (max-width: 900px) {
            .cortes-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media (max-width: 550px) {
            .cortes-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>

    <!-- Encabezado -->
    <header>
        <a href="{{ url('/servicios/general') }}" class="back-btn">←</a>
        <div class="header-title-container">
            <h1>Cortes de Cabello</h1>
        </div>
        <div class="logo-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Look Mágico" onerror="this.src='https://via.placeholder.com/60?text=Logo'">
        </div>
    </header>

    <!-- Contenido Principal -->
    <main>
        <!-- Filtros por Género -->
        <div class="filter-container">
            <button class="filter-btn active-all" onclick="filtrar('todos')">💥 Todos</button>
            <button class="filter-btn active-all" onclick="filtrar('mujer')">👧 Mujer</button>
            <button class="filter-btn active-all" onclick="filtrar('hombre')">👦 Hombre</button>
        </div>

        <!-- Grid de Cortes -->
        <section class="cortes-grid">

            <!-- Fila 1 -->
            <div class="corte-card" data-genero="mujer">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/Pixie.jpg') }}" alt="Pixie" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Pixie'">
                </div>
                <span class="corte-name">Pixie</span>
                <a href="{{ route('agenda', ['corte' => 'pixie']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="corte-card" data-genero="hombre">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/cortemullet.jpg') }}" alt="Middle Part" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Middle+Part'">
                </div>
                <span class="corte-name">Middle Part</span>
                <a href="{{ route('agenda', ['corte' => 'middle_part']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="corte-card" data-genero="mujer">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/corterecto.jpg') }}" alt="Corte Recto" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Corte+Recto'">
                </div>
                <span class="corte-name">Corte Recto</span>
                <a href="{{ route('agenda', ['corte' => 'corte_recto']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="corte-card" data-genero="mujer">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/bobclasico.jpg') }}" alt="Bob Clasico" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Bob+Clasico'">
                </div>
                <span class="corte-name">Bob Clasico</span>
                <a href="{{ route('agenda', ['corte' => 'bob_clasico']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="corte-card" data-genero="mujer">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/frenchbob.jpg') }}" alt="French Bob" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=French+Bob'">
                </div>
                <span class="corte-name">French Bob</span>
                <a href="{{ route('agenda', ['corte' => 'french_bob']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="corte-card" data-genero="hombre">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/fade.jpg') }}" alt="Fade" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Fade'">
                </div>
                <span class="corte-name">Fade</span>
                <a href="{{ route('agenda', ['corte' => 'fade']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <!-- Fila 2 -->
            <div class="corte-card" data-genero="hombre">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/cortewolf.jpg') }}" alt="Wolf" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Wolf'">
                </div>
                <span class="corte-name">Wolf</span>
                <a href="{{ route('agenda', ['corte' => 'wolf']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="corte-card" data-genero="hombre">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/spiky.jpg') }}" alt="Spiky" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Spiky'">
                </div>
                <span class="corte-name">Spiky</span>
                <a href="{{ route('agenda', ['corte' => 'spiky']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="corte-card" data-genero="mujer">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/cortemariposa.jpg') }}" alt="Corte Mariposa" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Corte+Mariposa'">
                </div>
                <span class="corte-name">Corte Mariposa</span>
                <a href="{{ route('agenda', ['corte' => 'corte_mariposa']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="corte-card" data-genero="hombre">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/cortequiff.jpg') }}" alt="Quiff" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Quiff'">
                </div>
                <span class="corte-name">Quiff</span>
                <a href="{{ route('agenda', ['corte' => 'quiff']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="corte-card" data-genero="hombre">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/cortecesar.jpg') }}" alt="Cesar" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Cesar'">
                </div>
                <span class="corte-name">Cesar</span>
                <a href="{{ route('agenda', ['corte' => 'cesar']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="corte-card" data-genero="mujer">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/cortecapas.jpg') }}" alt="Corte Capas" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Corte+Capas'">
                </div>
                <span class="corte-name">Corte Capas</span>
                <a href="{{ route('agenda', ['corte' => 'corte_capas']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

        </section>

        <!-- Redirección directa a la siguiente vista -->
        <a href="{{ route('depilaciones', ['depilaciones' => '_']) }}" class="btn-agregar">Ver más...</a>
    </main>
</body>
</html>