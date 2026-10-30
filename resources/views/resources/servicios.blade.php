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
            background-color: #FAF0E6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #333;
        }

        header {
            background-color: #9C5174;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-title {
            color: white;
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 2px;
            text-decoration: none;
        }

        .logo-container {
            width: 80px;
            height: 80px;
            background-color: white;
            border-radius: 15px;
            padding: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        main {
            flex: 1;
            padding: 40px 20px;
            text-align: center;
        }

        h1 {
            color: #9C5174;
            margin-bottom: 20px;
        }

        .btn-back {
            display: inline-block;
            margin-top: 30px;
            background-color: #FFD1DC;
            color: black;
            padding: 10px 25px;
            border-radius: 20px;
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <header>
        <a href="/" class="header-title">LOOK MAGICO</a>
        <div class="logo-container">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Look Mágico">
        </div>
    </header>

    <main>
        <h1>Nuestros Servicios</h1>
        <p>Aquí irá el catálogo de servicios de belleza y cuidado facial.</p>

        <a href="/" class="btn-back">← Volver al Inicio</a>
    </main>

</body>
</html>