<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Rayos</title>
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

        /* Grid de Rayos (6 por fila) */
        .rayos-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        /* Tarjeta individual */
        .rayo-card {
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

        .rayo-name {
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
            .rayos-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media (max-width: 550px) {
            .rayos-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>

    <!-- Encabezado -->
    <header>
        <a href="{{ url('/tintes') }}" class="back-btn">←</a>
        <div class="header-title-container">
            <h1>Rayos</h1>
        </div>
        <div class="logo-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Look Mágico" onerror="this.src='https://via.placeholder.com/60?text=Logo'">
        </div>
    </header>

    <!-- Contenido Principal -->
    <main>

        <!-- Grid de Rayos -->
        <section class="rayos-grid">

            <!-- Fila 1 -->
            <div class="rayo-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/rayo_tradicionales.jpg') }}" alt="Tradicionales" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Tradicionales'">
                </div>
                <span class="rayo-name">Tradicionales</span>
                <a href="{{ route('agenda', ['servicio' => 'tradicionales']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="rayo-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/rayo_babylights.jpg') }}" alt="Babylights" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Babylights'">
                </div>
                <span class="rayo-name">Babylights</span>
                <a href="{{ route('agenda', ['servicio' => 'babylights']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="rayo-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/rayo_chunky.jpg') }}" alt="Chunky Highlights" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Chunky'">
                </div>
                <span class="rayo-name">Chunky Highlights</span>
                <a href="{{ route('agenda', ['servicio' => 'chunky_highlights']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="rayo-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/rayo_reflejos.jpg') }}" alt="Reflejos" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Reflejos'">
                </div>
                <span class="rayo-name">Reflejos</span>
                <a href="{{ route('agenda', ['servicio' => 'reflejos']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="rayo-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/rayo_transparencias.jpg') }}" alt="Transparencias" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Transparencias'">
                </div>
                <span class="rayo-name">Transparencias</span>
                <a href="{{ route('agenda', ['servicio' => 'transparencias']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="rayo-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/rayo_balayage.jpg') }}" alt="Balayage" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Balayage'">
                </div>
                <span class="rayo-name">Balayage</span>
                <a href="{{ route('agenda', ['servicio' => 'balayage']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <!-- Fila 2 -->
            <div class="rayo-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/rayo_french_milky.jpg') }}" alt="French Milky" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=French+Milky'">
                </div>
                <span class="rayo-name">French Milky</span>
                <a href="{{ route('agenda', ['servicio' => 'french_milky']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="rayo-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/rayo_californianas.jpg') }}" alt="Californianas" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Californianas'">
                </div>
                <span class="rayo-name">Californianas</span>
                <a href="{{ route('agenda', ['servicio' => 'californianas']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="rayo-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/rayo_face_framing.jpg') }}" alt="Face Framing" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Face+Framing'">
                </div>
                <span class="rayo-name">Face Framing</span>
                <a href="{{ route('agenda', ['servicio' => 'face_framing']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="rayo-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/rayo_money_piece.jpg') }}" alt="Money Piece" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Money+Piece'">
                </div>
                <span class="rayo-name">Money Piece</span>
                <a href="{{ route('agenda', ['servicio' => 'money_piece']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="rayo-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/rayo_dorados.jpg') }}" alt="Dorados" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Dorados'">
                </div>
                <span class="rayo-name">Dorados</span>
                <a href="{{ route('agenda', ['servicio' => 'dorados']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="rayo-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/rayo_cenizo.jpg') }}" alt="Cenizo" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Cenizo'">
                </div>
                <span class="rayo-name">Cenizo</span>
                <a href="{{ route('agenda', ['servicio' => 'cenizo']) }}" class="btn-agregar">Agregar Servicio</a>
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
    <a href="{{ route('tratamientos', ['tratamientos' => '_']) }}" class="btn-agregar">Ver más...</a>
</body>
</html>