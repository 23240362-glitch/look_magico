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

        header .logo-text {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 3px;
        }

        header .login-btn {
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
    <a href="{{ route('login.roles') }}" class="btn-login-top">Iniciar Sesión 👄</a>
    </a>
</header>

    <!-- Menú de navegación de opciones -->
    <nav>
        <div class="nav-container">
            <a href="/">Inicio</a>
            <a href="/servicios">Servicios</a>
            <a href="/agenda">Agenda</a>
            <a href="/productos">Productos</a>
            <a href="/contactos">Contactos</a>
        </div>
    </nav>

    <!-- Sección central con logo, título y foto -->
    <main>
        <!-- Logo a la izquierda -->
        <div class="img-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Look Mágico" onerror="this.src='https://via.placeholder.com/150?text=Logo'">
        </div>

        <!-- Texto principal -->
        <div class="hero-section">
            <h1 class="hero-title">Hola<br>Belleza</h1>
            <button class="welcome-btn">Bienvenida....</button>
        </div>

        <!-- Foto decorativa a la derecha -->
        <div class="img-box">
            <img src="{{ asset('img/foto-derecha.png') }}" alt="Look Mágico Fotos" onerror="this.src='https://via.placeholder.com/150?text=Foto'">
        </div>
    </main>

</body>
</html>