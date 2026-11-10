<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Manicuras</title>
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
            max-width: 1050px;
            margin: 0 auto;
            padding: 20px;
            width: 100%;
        }

        /* Grid de Manicuras (5 por fila) */
        .manicuras-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        /* Tarjeta individual */
        .manicura-card {
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

        .manicura-name {
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
            .manicuras-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media (max-width: 550px) {
            .manicuras-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>

    <!-- Encabezado -->
    <header>
        <a href="{{ url('/peinados') }}" class="back-btn">←</a>
        <div class="header-title-container">
            <h1>Manicuras</h1>
        </div>
        <div class="logo-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Look Mágico" onerror="this.src='https://via.placeholder.com/60?text=Logo'">
        </div>
    </header>

    <!-- Contenido Principal -->
    <main>

        <!-- Grid de Manicuras -->
        <section class="manicuras-grid">

            <!-- Fila 1 -->
            <div class="manicura-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/mani_clasica.jpg') }}" alt="Clásica" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Clasica'">
                </div>
                <span class="manicura-name">Clásica</span>
                <a href="{{ route('agenda', ['servicio' => 'clasica']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="manicura-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/mani_francesa.jpg') }}" alt="Francesa" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Francesa'">
                </div>
                <span class="manicura-name">Francesa</span>
                <a href="{{ route('agenda', ['servicio' => 'francesa']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="manicura-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/mani_semipermanente.jpg') }}" alt="Semipermanente" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Semipermanente'">
                </div>
                <span class="manicura-name">Semipermanente</span>
                <a href="{{ route('agenda', ['servicio' => 'semipermanente']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="manicura-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/mani_acrilicas.jpg') }}" alt="Uñas Acrílicas" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Acrilicas'">
                </div>
                <span class="manicura-name">Uñas Acrílicas</span>
                <a href="{{ route('agenda', ['servicio' => 'acrilicas']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="manicura-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/mani_gel.jpg') }}" alt="Uñas de Gel" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Gel'">
                </div>
                <span class="manicura-name">Uñas de Gel</span>
                <a href="{{ route('agenda', ['servicio' => 'gel']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <!-- Fila 2 -->
            <div class="manicura-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/mani_biab.jpg') }}" alt="BIAB" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=BIAB'">
                </div>
                <span class="manicura-name">BIAB</span>
                <a href="{{ route('agenda', ['servicio' => 'biab']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="manicura-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/mani_rusa.jpg') }}" alt="Rusa" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Rusa'">
                </div>
                <span class="manicura-name">Rusa</span>
                <a href="{{ route('agenda', ['servicio' => 'rusa']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="manicura-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/mani_spa.jpg') }}" alt="Spa" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Spa'">
                </div>
                <span class="manicura-name">Spa</span>
                <a href="{{ route('agenda', ['servicio' => 'spa']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="manicura-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/mani_japonesa.jpg') }}" alt="Japonesa" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Japonesa'">
                </div>
                <span class="manicura-name">Japonesa</span>
                <a href="{{ route('agenda', ['servicio' => 'japonesa']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="manicura-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/mani_nail_art.jpg') }}" alt="Nail Art" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Nail+Art'">
                </div>
                <span class="manicura-name">Nail Art</span>
                <a href="{{ route('agenda', ['servicio' => 'nail_art']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

        </section>

        <!-- Redirección directa a la siguiente vista -->
        <a href="{{ route('pedicuras', ['pedicuras' => '_']) }}" class="btn-agregar">Ver más...</a>
    </main>
</body>
</html>