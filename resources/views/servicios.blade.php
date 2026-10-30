<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios - Look Mágico</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #FAF0E6; /* Fondo crema */
            color: #333;
        }

        /* Encabezado */
        header {
            background-color: #9C5174;
            color: white;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo {
            font-size: 24px;
            font-weight: bold;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: 500;
        }

        /* Contenedor principal de servicios */
        .container {
            padding: 40px 60px;
        }

        .titulo-seccion {
            color: #9C5174;
            font-size: 32px;
            margin-bottom: 25px;
            text-align: center;
        }

        /* Grid de servicios */
        .grid-servicios {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 25px;
            justify-items: center;
        }

        /* Tarjetas estilo prototipo */
        .card-servicio {
            background: white;
            border-radius: 20px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 200px;
        }

        .card-servicio img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 10px;
        }

        .card-servicio h3 {
            font-size: 16px;
            color: #444;
            margin-bottom: 5px;
        }

        .card-servicio .precio {
            color: #9C5174;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .btn-agregar {
            background-color: #f7d6e0;
            color: #9C5174;
            border: none;
            padding: 8px 15px;
            border-radius: 15px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-agregar:hover {
            background-color: #9C5174;
            color: white;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">Look Mágico</div>
        <nav>
            <a href="{{ url('/') }}">Inicio</a>
            <a href="{{ url('/servicios') }}">Servicios</a>
        </nav>
    </header>

    <div class="container">
        <h1 class="titulo-seccion">Catálogo de Servicios</h1>

        <div class="grid-servicios">
            @foreach($servicios as $servicio)
                <div class="card-servicio">
                    <img src="{{ asset('img/servicios/' . $servicio->imagen) }}" alt="{{ $servicio->nombre }}">
                    <h3>{{ $servicio->nombre }}</h3>
                    <p class="precio">${{ number_format($servicio->precio, 2) }}</p>
                    <a href="{{ url('/agenda') }}" class="btn-agregar">Agregar Servicio</a>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>