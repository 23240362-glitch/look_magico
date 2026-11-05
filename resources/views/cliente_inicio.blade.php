<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Inicio Cliente</title>
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

        /* Encabezado superior */
        header { 
            background-color: #9C5174; 
            color: white; 
            padding: 10px 20px;
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            position: relative;
            z-index: 10;
        }

        header .menu-icon { 
            font-size: 32px; 
            color: white; 
            cursor: pointer; 
            user-select: none;
            width: 60px;
        }

        header .title-header { 
            font-size: 20px; 
            letter-spacing: 2px; 
            font-weight: bold; 
            text-align: center;
            flex-grow: 1;
        }

        header .logo-box {
            width: 60px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        header .logo-box img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        /* Menú Lateral Desplegable */
        .sidebar {
            position: absolute;
            top: 55px;
            left: 20px;
            width: 250px;
            background-color: #BD4B7B;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            z-index: 100;
            display: none; /* Se activa con Javascript */
        }

        .sidebar.active {
            display: block;
        }

        .sidebar nav ul {
            list-style: none;
        }

        .menu-item {
            color: white;
            font-weight: bold;
            font-size: 14px;
            padding: 10px 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .menu-item a {
            color: white;
            text-decoration: underline;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .arrow {
            font-size: 10px;
            transition: transform 0.3s;
        }

        /* Submenús */
        .submenu {
            display: none;
            background-color: #F8E5EE;
            border-radius: 8px;
            margin: 5px 0;
            padding: 8px 12px;
            list-style: none;
        }

        .submenu.open {
            display: block;
        }

        .submenu li {
            padding: 6px 0;
            border-bottom: 1px solid #DDA5C0;
        }

        .submenu li:last-child {
            border-bottom: none;
        }

        .submenu li a {
            color: #333;
            font-size: 12px;
            font-weight: bold;
            text-decoration: underline;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-transform: uppercase;
        }

        /* Contenido Principal */
        main { 
            flex: 1;
            text-align: center; 
            padding: 40px 20px; 
            max-width: 800px; 
            margin: 0 auto; 
        }

        .bienvenida-txt { 
            color: #9C5174; 
            font-size: 24px; 
            font-weight: bold; 
            letter-spacing: 1px; 
            margin-bottom: 8px; 
            text-transform: uppercase; 
        }

        .quote-txt { 
            font-weight: bold; 
            font-size: 15px; 
            margin-bottom: 25px; 
            color: #000; 
        }

        /* Imagen central */
        .img-container { 
            margin: 0 auto 25px auto; 
            width: 260px; 
            border-radius: 25px; 
            overflow: hidden; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.15); 
        }

        .img-container img { 
            width: 100%; 
            display: block; 
            border-radius: 25px; 
        }

        .desc-txt { 
            max-width: 650px; 
            margin: 0 auto 30px auto; 
            font-size: 15px; 
            font-weight: bold; 
            line-height: 1.4; 
            color: #000; 
        }

        /* Fila de botones estructurada en lista */
        .buttons-row { 
            display: flex; 
            justify-content: center; 
            gap: 20px; 
            flex-wrap: wrap; 
            list-style: none;
        }

        .btn-pink { 
            background-color: #FFC0CB; 
            color: black; 
            border: none; 
            padding: 12px 35px; 
            border-radius: 25px; 
            font-weight: bold; 
            font-size: 14px; 
            text-decoration: underline; 
            cursor: pointer; 
            display: inline-block; 
        }

        .btn-pink:hover { 
            background-color: #f7b6c6; 
        }
    </style>
</head>
<body>

    <!-- Encabezado superior -->
    <header>
        <div class="menu-icon" onclick="toggleSidebar()">☰</div>
        <h1 class="title-header">LOOK MAGICO</h1>
        <div class="logo-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" onerror="this.src='https://via.placeholder.com/60?text=Logo'">
        </div>
    </header>

    <!-- Menú Desplegable Lateral -->
    <aside class="sidebar" id="sidebar">
        <nav>
            <ul>
                <li class="menu-item">
                    <a href="{{ url('/') }}">🌸 INICIO</a>
                </li>
                
                <!-- Desplegable Servicios -->
                <li class="menu-item" onclick="toggleSubmenu('submenu-servicios', 'arrow-servicios')">
                    <span>🌸 SERVICIOS</span>
                    <span class="arrow" id="arrow-servicios">▼</span>
                </li>
                <ul class="submenu" id="submenu-servicios">
                    <li><a href="{{ url('/servicios/cortes') }}">CORTES <span>→</span></a></li>
                    <li><a href="{{ url('/servicios/depilaciones') }}">DEPILACIONES <span>→</span></a></li>
                    <li><a href="{{ url('/servicios/maquillajes') }}">MAQUILLAJES <span>→</span></a></li>
                    <li><a href="{{ url('/servicios/peinados') }}">PEINADOS <span>→</span></a></li>
                    <li><a href="{{ url('/servicios/manicuras') }}">MANICURAS <span>→</span></a></li>
                    <li><a href="{{ url('/servicios/pedicuras') }}">PEDICURAS <span>→</span></a></li>
                    <li><a href="{{ url('/servicios/tintes') }}">TINTES <span>→</span></a></li>
                    <li><a href="{{ url('/servicios/rayos') }}">RAYOS <span>→</span></a></li>
                    <li><a href="{{ url('/servicios/tratamientos') }}">TRATAMIENTOS <span>→</span></a></li>
                </ul>

                <!-- Desplegable Productos -->
                <li class="menu-item" onclick="toggleSubmenu('submenu-productos', 'arrow-productos')">
                    <span>🛍️ PRODUCTOS</span>
                    <span class="arrow" id="arrow-productos">▼</span>
                </li>
                <ul class="submenu" id="submenu-productos">
                    <li><a href="{{ url('/productos/shampoos') }}">SHAMPOOS <span>→</span></a></li>
                    <li><a href="{{ url('/productos/acondicionadores') }}">ACONDICIONADORES <span>→</span></a></li>
                    <li><a href="{{ url('/productos/tratamientos') }}">TRATAMIENTOS <span>→</span></a></li>
                    <li><a href="{{ url('/productos/skincare') }}">SKINCARE Y CORPORAL <span>→</span></a></li>
                </ul>

                <li class="menu-item">
                    <a href="{{ url('/agenda') }}">🗓️ AGENDA</a>
                </li>
                <li class="menu-item">
                    <a href="{{ url('/contactos') }}">📱 CONTACTOS</a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Contenido principal -->
    <main>
        <h2 class="bienvenida-txt">¡BIENVENIDA A TU LUGAR SEGURO!</h2>
        <p class="quote-txt">"Realza tu belleza natural y renueva tu energía"</p>

        <div class="img-container">
            <img src="{{ asset('img/inicio.png') }}" alt="Estilismo" onerror="this.src='https://via.placeholder.com/260x160/9C5174/FFFFFF?text=Estilismo'">
        </div>

        <p class="desc-txt">
            Ofrecemos una experiencia exclusiva de estilismo, cuidado facial y relajación personalizada para que te sientas y te veas increíble.
        </p>

        <!-- Fila de Botones -->
        <section>
            <ul class="buttons-row">
                <li>
                    <a href="{{ url('/agenda') }}" class="btn-pink">Agenda tu cita hoy</a>
                </li>
                <li>
                    <a href="{{ url('/servicios') }}" class="btn-pink">Ver servicios</a>
                </li>
            </ul>
        </section>
    </main>

    <!-- Script para interacción del menú -->
    <script>
        // Abrir y cerrar el menú lateral al presionar las 3 barras (☰)
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        // Desplegar y replegar submenús de Servicios y Productos
        function toggleSubmenu(submenuId, arrowId) {
            const submenu = document.getElementById(submenuId);
            const arrow = document.getElementById(arrowId);

            if (submenu.classList.contains('open')) {
                submenu.classList.remove('open');
                arrow.textContent = '▼';
            } else {
                submenu.classList.add('open');
                arrow.textContent = '▲';
            }
        }
    </script>
</body>
</html>