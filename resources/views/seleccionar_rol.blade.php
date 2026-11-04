<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Elige tu Usuario</title>
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
        }

        /* Encabezado superior */
        header { 
            background-color: #9C5174; 
            color: white; 
            padding: 10px 20px;
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
        }

        header .logo-box {
            width: 60px;
            display: flex;
            align-items: center;
        }

        header .logo-box img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        header .title-header { 
            font-size: 20px; 
            letter-spacing: 2px; 
            font-weight: bold; 
            text-align: center;
            flex-grow: 1;
        }

        /* Espaciador para centrar el título con respecto al logo */
        header .spacer {
            width: 60px;
        }

        /* Contenido principal */
        main { 
            max-width: 800px; 
            margin: 40px auto; 
            text-align: center; 
            padding: 0 20px; 
        }

        .title-choose { 
            color: #9C5174; 
            font-size: 24px; 
            letter-spacing: 3px; 
            margin-bottom: 40px; 
            text-transform: uppercase; 
        }

        /* Lista de roles */
        .roles-grid { 
            display: flex; 
            justify-content: center; 
            gap: 50px; 
            flex-wrap: wrap; 
            list-style: none;
        }

        .role-card { 
            text-align: center; 
            width: 260px; 
            text-decoration: none; 
            color: inherit; 
            display: block;
        }

        .circle-avatar { 
            width: 220px; 
            height: 220px; 
            border-radius: 50%; 
            border: 6px solid #A27BEE; 
            background-color: white; 
            margin: 0 auto 20px auto; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            overflow: hidden; 
        }

        .circle-avatar img { 
            width: 85%; 
            height: auto; 
        }

        .btn-role-pink { 
            background-color: #FFC0CB; 
            color: black; 
            padding: 12px 30px; 
            border-radius: 25px; 
            font-weight: bold; 
            font-size: 15px; 
            text-decoration: underline; 
            display: block; 
            width: 100%; 
        }

        .role-card:hover .btn-role-pink { 
            background-color: #f7b6c6; 
        }
    </style>
</head>
<body>

    <!-- Encabezado superior -->
    <header>
        <div class="logo-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Look Mágico">
        </div>
        <h1 class="title-header">LOOK MÁGICO</h1>
        <div class="spacer"></div>
    </header>

    <!-- Sección principal de selección de usuario -->
    <main>
        <h2 class="title-choose">ELIGE TU USUARIO</h2>

        <section>
            <ul class="roles-grid">
                <!-- Opción Clienta -->
                <li>
                    <a href="{{ route('login.cliente') }}" class="role-card">
                        <div class="circle-avatar">
                            <img src="{{ asset('img/clienta.png') }}" alt="Soy Clienta" onerror="this.src='https://via.placeholder.com/180?text=Clienta'">
                        </div>
                        <span class="btn-role-pink">Soy clienta</span>
                    </a>
                </li>

                <!-- Opción Administradora -->
                <li>
                    <a href="{{ route('login.admin') }}" class="role-card">
                        <div class="circle-avatar">
                            <img src="{{ asset('img/admin.jpg') }}" alt="Soy Administradora" onerror="this.src='https://via.placeholder.com/180?text=Admin'">
                        </div>
                        <span class="btn-role-pink">Soy administradora</span>
                    </a>
                </li>
            </ul>
        </section>
    </main>

</body>
</html>