<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #FAF0E6; /* Fondo beige/crema suave */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Barra superior de encabezado */
        header {
            background-color: #9C5174; /* Color malva/rosa oscuro */
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo-header {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 3px;
        }

        header .btn-login-top {
            color: black;
            font-weight: bold;
            text-decoration: underline;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        /* Menú de navegación flotante rosa */
        nav {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .nav-container {
            background-color: #FFD1DC; /* Rosa claro pastel */
            border-radius: 30px;
            padding: 12px 40px;
            display: flex;
            gap: 35px;
            list-style: none; /* Quitamos viñetas de la lista */
        }

        .nav-container a {
            color: black;
            text-decoration: underline;
            font-weight: bold;
            font-size: 17px;
        }

        /* Contenido principal */
        main {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 80px;
            flex: 1;
            position: relative;
        }

        /* Marcadores de posición para las imágenes del logo y la foto */
        .img-box {
            width: 150px;
            height: 150px;
            border-radius: 20px;
            border: 2px solid #FFD1DC;
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }

        .img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Sección central del texto */
        .hero-section {
            text-align: center;
        }

        .hero-title {
            color: #9C5174;
            font-size: 64px;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 25px;
        }

        .welcome-btn {
            background-color: #FFD1DC;
            color: black;
            border: none;
            padding: 10px 35px;
            border-radius: 25px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: underline;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <!-- Encabezado superior -->
    <header>
        <div class="logo-header">LOOK MAGICO</div>
        <a href="{{ route('login.roles') }}" class="welcome-btn">Iniciar Sesión 👄</a>
    </header>

    <!-- Menú de navegación principal (estructurado como lista no ordenada) -->
    <nav>
        <ul class="nav-container">
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="{{ url('/servicios') }}">Servicios</a></li>
            <li><a href="{{ url('/agenda') }}">Agenda</a></li>
            <li><a href="{{ url('/productos') }}">Productos</a></li>
            <li><a href="{{ url('/contactos') }}">Contactos</a></li>
        </ul>
    </nav>

    <!-- Sección principal del sitio -->
    <main>
        <!-- Logo a la izquierda -->
        <div class="img-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Look Mágico" onerror="this.src='https://via.placeholder.com/150?text=Logo'">
        </div>

        <!-- Mensaje principal de bienvenida -->
        <section class="hero-section">
            <h1 class="hero-title">Hola<br>Belleza</h1>
            <button class="welcome-btn">Bienvenida....</button>
        </section>

        <!-- Foto decorativa a la derecha -->
        <div class="img-box">
            <img src="{{ asset('img/collage.png') }}" alt="Logo Look Mágico" onerror="this.src='https://via.placeholder.com/150?text=Logo'">
        </div>
    </main>

</body>
</html>