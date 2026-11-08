<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Maquillajes</title>
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

        /* Grid de Maquillajes (6 por fila) */
        .maquillajes-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        /* Tarjeta individual */
        .maquillaje-card {
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

        .maquillaje-name {
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
            .maquillajes-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media (max-width: 550px) {
            .maquillajes-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>

    <!-- Encabezado -->
    <header>
        <a href="{{ url('/depilaciones') }}" class="back-btn">←</a>
        <div class="header-title-container">
            <h1>Maquillajes</h1>
        </div>
        <div class="logo-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Look Mágico" onerror="this.src='https://via.placeholder.com/60?text=Logo'">
        </div>
    </header>

    <!-- Contenido Principal -->
    <main>

        <!-- Grid de Maquillajes -->
        <section class="maquillajes-grid">

            <!-- Fila 1 -->
            <div class="maquillaje-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/maquillajenatural.jpg') }}" alt="Natural" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Natural'">
                </div>
                <span class="maquillaje-name">Natural</span>
                <a href="{{ route('agenda', ['servicio' => 'natural']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="maquillaje-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/maquillajesocial.jpg') }}" alt="Social" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Social'">
                </div>
                <span class="maquillaje-name">Social</span>
                <a href="{{ route('agenda', ['servicio' => 'social']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="maquillaje-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/maquillajenovia.jpg') }}" alt="Novia" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Novia'">
                </div>
                <span class="maquillaje-name">Novia</span>
                <a href="{{ route('agenda', ['servicio' => 'novia']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="maquillaje-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/maquillajefotografico.jpg') }}" alt="Fotografía" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Fotografia'">
                </div>
                <span class="maquillaje-name">Fotografía</span>
                <a href="{{ route('agenda', ['servicio' => 'fotografia']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="maquillaje-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/maquillajeartistico.jpg') }}" alt="Artístico" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Artistico'">
                </div>
                <span class="maquillaje-name">Artístico</span>
                <a href="{{ route('agenda', ['servicio' => 'artistico']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="maquillaje-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/maquillajeteatral.jpg') }}" alt="Teatro" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Teatro'">
                </div>
                <span class="maquillaje-name">Teatro</span>
                <a href="{{ route('agenda', ['servicio' => 'teatro']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <!-- Fila 2 -->
            <div class="maquillaje-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/maquillajeahumado.jpg') }}" alt="Ojos Ahumado" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Ahumado'">
                </div>
                <span class="maquillaje-name">Ojos Ahumado</span>
                <a href="{{ route('agenda', ['servicio' => 'ojos_ahumado']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="maquillaje-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/maquillajecutcrease.jpg') }}" alt="Cut Crease" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Cut+Crease'">
                </div>
                <span class="maquillaje-name">Cut Crease</span>
                <a href="{{ route('agenda', ['servicio' => 'cut_crease']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="maquillaje-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/maquillajeglam.jpg') }}" alt="Glam" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Glam'">
                </div>
                <span class="maquillaje-name">Glam</span>
                <a href="{{ route('agenda', ['servicio' => 'glam']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="maquillaje-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/maquillajecontouring.jpg') }}" alt="Contouring" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Contouring'">
                </div>
                <span class="maquillaje-name">Contouring</span>
                <a href="{{ route('agenda', ['servicio' => 'contouring']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="maquillaje-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/maquillajestrobing.jpg') }}" alt="Strobing" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Strobing'">
                </div>
                <span class="maquillaje-name">Strobing</span>
                <a href="{{ route('agenda', ['servicio' => 'strobing']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="maquillaje-card">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/maquillajebaking.jpg') }}" alt="Baking" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Baking'">
                </div>
                <span class="maquillaje-name">Baking</span>
                <a href="{{ route('agenda', ['servicio' => 'baking']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

        </section>

        <!-- Redirección directa a la siguiente vista -->
        <a href="{{ route('peinados', ['peinados' => '_']) }}" class="btn-agregar">Ver más...</a>
    </main>
</body>
</html>