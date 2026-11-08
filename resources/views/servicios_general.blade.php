<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Servicios en General</title>
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

        /* Grid de Servicios (6 por fila) */
        .servicios-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        /* Tarjeta individual de Servicio */
        .servicio-card {
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

        .servicio-name {
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

        /* Adaptabilidad en pantallas más pequeñas */
        @media (max-width: 900px) {
            .servicios-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media (max-width: 550px) {
            .servicios-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>

    <!-- Encabezado -->
    <header>
        <a href="{{ url('/') }}" class="back-btn">←</a>
        <div class="header-title-container">
            <h1>Servicios Generales</h1>
        </div>
        <div class="logo-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Look Mágico" onerror="this.src='https://via.placeholder.com/60?text=Logo'">
        </div>
    </header>

    <!-- Contenido Principal -->
    <main>

        <!-- Grid de Servicios -->
        <section class="servicios-grid">

            <!-- Fila 1 (Página 1) -->
            <div class="servicio-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/Pixie.jpg') }}" alt="Corte Pixie" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Pixie'">
                </div>
                <span class="servicio-name">Corte Pixie</span>
                <a href="{{ route('agenda', ['servicio' => 'pixie']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="servicio-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/cortecesar.jpg') }}" alt="Corte César" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Corte+César'">
                </div>
                <span class="servicio-name">Corte César</span>
                <a href="{{ route('agenda', ['servicio' => 'corte_cesar']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="servicio-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/manicura_francesa.jpg') }}" alt="Manicura Francesa" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Manicura'">
                </div>
                <span class="servicio-name">Manicura Francesa</span>
                <a href="{{ route('agenda', ['servicio' => 'manicura_francesa']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="servicio-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/manicura_semipermanente.jpg') }}" alt="Manicura Semipermanente" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Manicura+Semipermanente'">
                </div>
                <span class="servicio-name">Manicura Semipermanente</span>
                <a href="{{ route('agenda', ['servicio' => 'manicura_semipermanente']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="servicio-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/maquillajeteatral.jpg') }}" alt="Maquillaje Teatral" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Maquillaje+Teatral'">
                </div>
                <span class="servicio-name">Maquillaje Teatral</span>
                <a href="{{ route('agenda', ['servicio' => 'maquillaje_teatral']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="servicio-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/maquillajeartistico.jpg') }}" alt="Maquillaje Artístico" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Maquillaje+Artístico'">
                </div>
                <span class="servicio-name">Maquillaje Artístico</span>
                <a href="{{ route('agenda', ['servicio' => 'maquillaje_artistico']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="servicio-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/hidratacion_facial.jpg') }}" alt="Hidratación Facial" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Hidratación+Facial'">
                </div>
                <span class="servicio-name">Hidratación Facial</span>
                <a href="{{ route('agenda', ['servicio' => 'hidratacion_facial']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <!-- Fila 2 (Página 2) -->
            <div class="servicio-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/depilaciondebozo.jpg') }}" alt="Depilación de Bazo" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Depilación+de+Bazo'">
                </div>
                <span class="servicio-name">Depilación de Bazo</span>
                <a href="{{ route('agenda', ['servicio' => 'depilacion_de_bazo']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="servicio-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/manicura_spa.jpg') }}" alt="Manicura Spa" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Manicura+Spa'">
                </div>
                <span class="servicio-name">Manicura Spa</span>
                <a href="{{ route('agenda', ['servicio' => 'manicura_spa']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="servicio-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/radiofrecuencia_facial.jpg') }}" alt="Radiofrecuencia Facial" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Radiofrecuencia+Facial'">
                </div>
                <span class="servicio-name">Radiofrecuencia Facial</span>
                <a href="{{ route('agenda', ['servicio' => 'radiofrecuencia_facial']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="servicio-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/tinte_temporal.jpg') }}" alt="Tinte Temporal" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Tinte+Temporal'">
                </div>
                <span class="servicio-name">Tinte Temporal</span>
                <a href="{{ route('agenda', ['servicio' => 'tinte_temporal']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="servicio-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/maquillajefotografico.jpg') }}" alt="Maquillaje Fotográfico" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Maquillaje+Fotográfico'">
                </div>
                <span class="servicio-name">Maquillaje Fotográfico</span>
                <a href="{{ route('agenda', ['servicio' => 'maquillaje_fotografico']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

        <!-- Redirección directa a la vista clasificacion -->
        <a href="{{ route('clasificacion', ['clasificacion' => '_']) }}" class="btn-agregar">Ver más...</a>
    </section>
    </main>
</body>
</html>