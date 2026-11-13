<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Contactos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --magenta-header: #9b5177;
            --lila-tarjeta: #a485ee;
            --lila-hover: #916ee8;
            --rosa-input: #fbc8e4;
            --crema-fondo: #fbf4ec;
            --texto-oscuro: #1a1a1a;
        }

        body {
            background-color: var(--crema-fondo);
            font-family: 'Quicksand', 'Segoe UI', sans-serif;
            color: var(--texto-oscuro);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Barra superior igual al boceto */
        .top-banner {
            background-color: var(--magenta-header);
            color: #ffffff;
            padding: 18px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            min-height: 115px;
        }

        .menu-icon-btn {
            background: none;
            border: none;
            color: #ffffff;
            font-size: 1.6rem;
            padding: 0;
            line-height: 1;
            margin-bottom: 8px;
        }

        .banner-title {
            font-size: 1.55rem;
            font-weight: 700;
            letter-spacing: 5px;
            margin: 0;
            text-transform: uppercase;
        }

        .logo-flotante {
            background-color: #ffffff;
            border: 4px solid #f5d8c8;
            border-radius: 26px;
            padding: 8px;
            width: 125px;
            height: 125px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            position: relative;
            top: 22px;
            z-index: 10;
        }

        .logo-flotante img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            border-radius: 18px;
        }

        .subtitulo-principal {
            font-size: 1.55rem;
            font-weight: 700;
            letter-spacing: 3px;
            color: #111111;
            margin-top: 15px;
            margin-bottom: 18px;
        }

        /* Tarjeta lila del formulario */
        .card-lila-form {
            background-color: var(--lila-tarjeta);
            border-radius: 28px;
            padding: 28px 26px;
            box-shadow: 0 6px 16px rgba(164, 133, 238, 0.25);
        }

        /* Inputs color rosa pastel */
        .input-rosa {
            background-color: var(--rosa-input) !important;
            border: none !important;
            border-radius: 24px !important;
            padding: 14px 22px !important;
            font-size: 1.05rem !important;
            color: #4a4a4a !important;
            font-weight: 600;
            box-shadow: none !important;
        }

        .input-rosa::placeholder {
            color: #7a7478;
            font-weight: 500;
        }

        textarea.input-rosa {
            border-radius: 26px !important;
            resize: none;
        }

        .btn-enviar-rosa {
            background-color: var(--magenta-header);
            color: #ffffff;
            border: none;
            border-radius: 24px;
            padding: 12px 30px;
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: 1px;
            transition: background-color 0.2s, transform 0.15s;
        }

        .btn-enviar-rosa:hover {
            background-color: #823f62;
            color: #ffffff;
            transform: translateY(-1px);
        }

        /* Tarjetas lilas de información a la derecha */
        .card-lila-info {
            background-color: var(--lila-tarjeta);
            border-radius: 26px;
            padding: 20px 26px;
            color: #111111;
            font-weight: 600;
            font-size: 0.98rem;
            box-shadow: 0 6px 16px rgba(164, 133, 238, 0.2);
            position: relative;
        }

        .maps-badge {
            width: 56px;
            height: 56px;
            background-color: #ffffff;
            border: 2px solid #222222;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            flex-shrink: 0;
            transition: transform 0.2s;
        }

        .maps-badge:hover {
            transform: scale(1.06);
        }

        .whatsapp-circle {
            width: 54px;
            height: 54px;
            background-color: #1db954;
            color: #ffffff;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            text-decoration: none;
            transition: transform 0.2s;
        }

        .whatsapp-circle:hover {
            transform: scale(1.06);
            color: #ffffff;
        }

        /* Iconos de redes sociales abajo a la derecha */
        .social-fb {
            width: 54px;
            height: 54px;
            background-color: #0866ff;
            color: #ffffff;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            text-decoration: none;
            transition: transform 0.2s;
        }

        .social-ig {
            width: 54px;
            height: 54px;
            background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
            color: #ffffff;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.9rem;
            text-decoration: none;
            transition: transform 0.2s;
        }

        .social-fb:hover, .social-ig:hover {
            transform: scale(1.08);
            color: #ffffff;
        }
    </style>
</head>
<body>

    <!-- Encabezado Superior -->
    <header class="top-banner">
        <div>
            <a href="{{ url('/') }}" class="menu-icon-btn text-decoration-none d-inline-block" title="Volver al inicio">
                <i class="fa-solid fa-equals"></i>
            </a>
            <h1 class="banner-title">CONTACTOS</h1>
        </div>

        <div class="logo-flotante">
            <img src="{{ asset('img/logo.png') }}" alt="Look Mágico" onerror="this.src='https://via.placeholder.com/110x110/ffffff/9b5177?text=Look+Mágico'">
        </div>
    </header>

    <!-- Contenido Principal -->
    <main class="container py-3 px-4">
        <div class="row g-4 align-items-start">

            <!-- Columna Izquierda: Título y Formulario Lila -->
            <div class="col-lg-5">
                <h2 class="subtitulo-principal text-center text-lg-start ps-lg-2">¡QUEREMOS SABER DE TI!</h2>

                @if (session('success'))
                    <div class="alert alert-success rounded-4 fw-bold">{{ session('success') }}</div>
                @endif

                <div class="card-lila-form">
                    <form action="{{ route('contactos.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <input type="text" name="nombre" class="form-control input-rosa" placeholder="Nombre" value="{{ old('nombre') }}" required>
                            @error('nombre') <small class="text-white fw-bold ps-3">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" name="apellido" class="form-control input-rosa" placeholder="Apellido" value="{{ old('apellido') }}" required>
                            @error('apellido') <small class="text-white fw-bold ps-3">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <input type="tel" name="telefono" class="form-control input-rosa" placeholder="Número de Teléfono" value="{{ old('telefono') }}" required>
                            @error('telefono') <small class="text-white fw-bold ps-3">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <select name="asunto" class="form-select input-rosa" required>
                                <option value="" disabled selected>Asunto</option>
                                <option value="Información de servicios" @selected(old('asunto') == 'Información de servicios')>Información de servicios</option>
                                <option value="Consulta de productos" @selected(old('asunto') == 'Consulta de productos')>Consulta de productos</option>
                                <option value="Otro" @selected(old('asunto') == 'Otro')>Otro</option>
                            </select>
                            @error('asunto') <small class="text-white fw-bold ps-3">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <textarea name="comentarios" rows="4" class="form-control input-rosa" placeholder="Comentarios" required>{{ old('comentarios') }}</textarea>
                            @error('comentarios') <small class="text-white fw-bold ps-3">{{ $message }}</small> @enderror
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-enviar-rosa w-100">
                                Enviar Mensaje
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Columna Derecha: Tarjetas Lilas Escalonadas y Redes Sociales -->
            <div class="col-lg-7 pt-lg-5 mt-lg-4">
                <div class="d-flex flex-column gap-4">

                    <!-- Tarjeta 1: Ubicación (alineada a la izquierda) -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-lila-info d-flex align-items-center justify-content-between">
                                <div class="text-center flex-grow-1">
                                    <p class="mb-1">Nos encontramos en</p>
                                    <p class="mb-1">
                                        <i class="fa-solid fa-location-pin text-danger me-1"></i>
                                        Calle Guillermo Prieto #148
                                    </p>
                                    <p class="mb-0">Colonia Centro 37000</p>
                                </div>
                                <a href="https://maps.google.com/?q=Calle+Guillermo+Prieto+148,+Centro,+37000+Leon,+Gto." target="_blank" class="maps-badge ms-2" title="Abrir en Google Maps">
                                    <i class="fa-solid fa-location-dot fa-2x" style="color: #ea4335;"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta 2: Atención a Cliente (desplazada a la derecha) -->
                    <div class="row justify-content-end">
                        <div class="col-md-8">
                            <div class="card-lila-info text-center">
                                <p class="mb-1">Atención a Cliente</p>
                                <p class="mb-2 text-start ps-2">Teléfono : 477 123 4567</p>
                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    <a href="https://wa.me/524771234567" target="_blank" class="whatsapp-circle" title="Enviar WhatsApp">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                    <a href="https://wa.me/524771234567" target="_blank" class="text-dark text-decoration-none fw-bold">
                                        Enviar WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta 3: Horarios + Redes Sociales abajo a la derecha -->
                    <div class="row align-items-end g-3">
                        <div class="col-md-8">
                            <div class="card-lila-info text-center">
                                <p class="mb-1">
                                    <i class="fa-solid fa-alarm-clock text-danger me-1"></i>
                                    Horarios de Atención
                                </p>
                                <p class="mb-1">Lunes a Viernes: 09:00 AM – 08:00 PM</p>
                                <p class="mb-1">Sábados: 09:00 AM – 06:00 PM</p>
                                <p class="mb-0">Domingos: Cerrado</p>
                            </div>
                        </div>

                        <div class="col-md-4 text-center text-md-end">
                            <p class="fw-bold small mb-2 text-start ps-md-3">Síguenos en :</p>
                            <div class="d-inline-flex gap-3">
                                <a href="#" class="social-fb" aria-label="Facebook">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-ig" aria-label="Instagram">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>

</body>
</html>