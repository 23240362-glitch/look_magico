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

        header .menu-icon { 
            font-size: 32px; 
            color: white; 
            cursor: pointer; 
            text-decoration: none; 
            font-weight: bold;
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

        /* Contenido principal */
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
        <div class="menu-icon">☰</div>
        <h1 class="title-header">LOOK MÁGICO</h1>
        <div class="logo-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" onerror="this.src='https://via.placeholder.com/60?text=Logo'">
        </div>
    </header>

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

        <!-- Sección de llamadas a la acción -->
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

</body>
</html>