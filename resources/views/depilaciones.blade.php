<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Depilaciones</title>
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
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            width: 100%;
        }

        /* Grid de Depilaciones (4 por fila según el diseño) */
        .depilaciones-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            margin-bottom: 25px;
            justify-items: center;
        }

        /* Tarjeta individual */
        .depilacion-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            width: 100%;
            max-width: 180px;
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

        .depilacion-name {
            font-size: 15px;
            font-weight: bold;
            color: #000;
            margin: 10px 0 6px 0;
            text-align: center;
            letter-spacing: 1px;
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

        /* Adaptabilidad en pantallas más pequeñas */
        @media (max-width: 768px) {
            .depilaciones-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- Encabezado -->
    <header>
        <a href="{{ url('/clasificacion') }}" class="back-btn">←</a>
        <div class="header-title-container">
            <h1>Depilaciones</h1>
        </div>
        <div class="logo-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Look Mágico" onerror="this.src='https://via.placeholder.com/60?text=Logo'">
        </div>
    </header>

    <!-- Contenido Principal -->
    <main>

        <!-- Grid de Depilaciones -->
        <section class="depilaciones-grid">

            <!-- Fila 1 -->
            <div class="depilacion-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/depilaciondebikini.jpg') }}" alt="Bikini" onerror="this.src='https://via.placeholder.com/150/9C5174/FFFFFF?text=Bozo'">
                </div>
                <span class="depilacion-name">Bikini</span>
                <a href="{{ route('agenda', ['servicio' => 'bikini']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="depilacion-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/depilaciondeaxilas.jpg') }}" alt="Axilas" onerror="this.src='https://via.placeholder.com/150/9C5174/FFFFFF?text=Axilas'">
                </div>
                <span class="depilacion-name">Axilas</span>
                <a href="{{ route('agenda', ['servicio' => 'axilas']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="depilacion-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/depilaciondepiernas.jpg') }}" alt="Piernas" onerror="this.src='https://via.placeholder.com/150/9C5174/FFFFFF?text=Piernas'">
                </div>
                <span class="depilacion-name">Piernas</span>
                <a href="{{ route('agenda', ['servicio' => 'piernas']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="depilacion-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/depilaciondeabdomen.jpg') }}" alt="Abdomen" onerror="this.src='https://via.placeholder.com/150/9C5174/FFFFFF?text=Abdomen'">
                </div>
                <span class="depilacion-name">Abdomen</span>
                <a href="{{ route('agenda', ['servicio' => 'abdomen']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <!-- Fila 2 -->
            <div class="depilacion-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/depilaciondebozo.jpg') }}" alt="Bozo" onerror="this.src='https://via.placeholder.com/150/9C5174/FFFFFF?text=Bozo'">
                </div>
                <span class="depilacion-name">Bozo</span>
                <a href="{{ route('agenda', ['servicio' => 'bozo']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="depilacion-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/depilacionderostro.jpg') }}" alt="Rostro" onerror="this.src='https://via.placeholder.com/150/9C5174/FFFFFF?text=Rostro'">
                </div>
                <span class="depilacion-name">Rostro</span>
                <a href="{{ route('agenda', ['servicio' => 'rostro']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="depilacion-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/depilaciondebrazos.jpg') }}" alt="Brazos" onerror="this.src='https://via.placeholder.com/150/9C5174/FFFFFF?text=Brazos'">
                </div>
                <span class="depilacion-name">Brazos</span>
                <a href="{{ route('agenda', ['servicio' => 'brazos']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="depilacion-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/depilaciondededos.jpg') }}" alt="Dedos" onerror="this.src='https://via.placeholder.com/150/9C5174/FFFFFF?text=Dedos'">
                </div>
                <span class="depilacion-name">Dedos</span>
                <a href="{{ route('agenda', ['servicio' => 'dedos']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

        </section>

        <!-- Redirección directa a la siguiente vista -->
        <a href="{{ route('maquillajes', ['maquillajes' => '_']) }}" class="btn-agregar">Ver más...</a>
    </main>
</body>
</html>