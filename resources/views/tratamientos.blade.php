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

            <!-- FACIALES -->
            <div class="tratamiento-card" data-tipo="faciales">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/trat_limpieza_profunda.jpg') }}" alt="Limpiezas profundas" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Limpiezas'">
                </div>
                <span class="tratamiento-name">Limpiezas profundas</span>
                <a href="{{ route('agenda', ['servicio' => 'limpiezas_profundas']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="tratamiento-card" data-tipo="faciales">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/trat_peeling_quimico.jpg') }}" alt="Peeling químicos" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Peeling'">
                </div>
                <span class="tratamiento-name">Peeling químicos</span>
                <a href="{{ route('agenda', ['servicio' => 'peeling_quimicos']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="tratamiento-card" data-tipo="faciales">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/trat_hidratacion_nutricion.jpg') }}" alt="Hidratación y Nutrición" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Hidratacion'">
                </div>
                <span class="tratamiento-name">Hidratación y Nutrición</span>
                <a href="{{ route('agenda', ['servicio' => 'hidratacion_nutricion']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="tratamiento-card" data-tipo="faciales">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/trat_radiofrecuencia.jpg') }}" alt="Radiofrecuencia" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Radiofrecuencia'">
                </div>
                <span class="tratamiento-name">Radiofrecuencia</span>
                <a href="{{ route('agenda', ['servicio' => 'radiofrecuencia']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <!-- CORPORALES -->
            <div class="tratamiento-card" data-tipo="corporales">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/trat_cavitacion.jpg') }}" alt="Cavitación" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Cavitacion'">
                </div>
                <span class="tratamiento-name">Cavitación</span>
                <a href="{{ route('agenda', ['servicio' => 'cavitacion']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="tratamiento-card" data-tipo="corporales">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/trat_luz_pulsada.jpg') }}" alt="Luz Pulsada" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Luz+Pulsada'">
                </div>
                <span class="tratamiento-name">Luz Pulsada</span>
                <a href="{{ route('agenda', ['servicio' => 'luz_pulsada']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <!-- CAPILARES -->
            <div class="tratamiento-card" data-tipo="capilares">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/trat_botox_capilar.jpg') }}" alt="Botox Capilar" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Botox+Capilar'">
                </div>
                <span class="tratamiento-name">Botox Capilar</span>
                <a href="{{ route('agenda', ['servicio' => 'botox_capilar']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="tratamiento-card" data-tipo="capilares">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/trat_queratina.jpg') }}" alt="Queratina" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Queratina'">
                </div>
                <span class="tratamiento-name">Queratina</span>
                <a href="{{ route('agenda', ['servicio' => 'queratina']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="tratamiento-card" data-tipo="capilares">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/trat_cauterizacion.jpg') }}" alt="Cauterización" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Cauterizacion'">
                </div>
                <span class="tratamiento-name">Cauterización</span>
                <a href="{{ route('agenda', ['servicio' => 'cauterizacion']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="tratamiento-card" data-tipo="capilares">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/trat_lifting.jpg') }}" alt="Lifting" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Lifting'">
                </div>
                <span class="tratamiento-name">Lifting</span>
                <a href="{{ route('agenda', ['servicio' => 'lifting']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="tratamiento-card" data-tipo="capilares">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/trat_detox.jpg') }}" alt="Detox" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Detox'">
                </div>
                <span class="tratamiento-name">Detox</span>
                <a href="{{ route('agenda', ['servicio' => 'detox']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

            <div class="tratamiento-card" data-tipo="capilares">
                <div class="img-wrapper">
                    <span class="flower-icon">🌺</span>
                    <img src="{{ asset('img/trat_anticaspa.jpg') }}" alt="Anticaspa" onerror="this.src='https://via.placeholder.com/130/9C5174/FFFFFF?text=Anticaspa'">
                </div>
                <span class="tratamiento-name">Anticaspa</span>
                <a href="{{ route('agenda', ['servicio' => 'anticaspa']) }}" class="btn-agregar">Agregar Servicio</a>
            </div>

        </section>

        <!-- Redirección directa a la vista de cliente/inicio -->
        <a href="{{ url('/cliente/inicio') }}" class="btn-agregar btn-ver-mas">Volver a Inicio</a>
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