<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Acondicionadores</title>
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

        /* Botones de Categorías */
        .filter-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .filter-btn {
            background-color: #FFC0CB;
            color: #000;
            padding: 8px 22px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 14px;
            text-decoration: underline;
        }

        .filter-btn.activo {
            background-color: #9C5174;
            color: white;
        }

        /* Grid de Productos (6 por fila) */
        .productos-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        /* Tarjeta individual de Producto */
        .producto-card {
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

        .producto-name {
            font-size: 13px;
            font-weight: bold;
            color: #000;
            margin: 8px 0 2px 0;
            text-align: center;
        }

        .producto-marca {
            font-size: 11px;
            color: #777;
            text-align: center;
        }

        .producto-precio {
            font-size: 14px;
            font-weight: bold;
            color: #9C5174;
            margin: 3px 0 6px 0;
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
        }

        .sin-productos {
            grid-column: 1 / -1;
            text-align: center;
            color: #9C5174;
            font-weight: bold;
            padding: 20px;
        }

        .btn-agregar:hover {
            background-color: #f7b6c6;
        }

        /* Adaptabilidad en pantallas más pequeñas */
        @media (max-width: 900px) {
            .productos-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media (max-width: 550px) {
            .productos-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>

    <!-- Encabezado -->
    <header>
        <a href="{{ url('/productos') }}" class="back-btn">←</a>
        <div class="header-title-container">
            <h1>Acondicionadores</h1>
        </div>
        <div class="logo-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Look Mágico" onerror="this.src='https://via.placeholder.com/60?text=Logo'">
        </div>
    </header>

    <!-- Contenido Principal -->
    <main>
        <!-- Categorías de Productos -->
        <div class="filter-container">
            <a href="{{ route('productos.general') }}" class="filter-btn">🛍️ Todos</a>
            <a href="{{ route('productos.shampoos') }}" class="filter-btn">Shampoos</a>
            <a href="{{ route('productos.acondicionadores') }}" class="filter-btn activo">Acondicionadores</a>
            <a href="{{ route('productos.tratamientos') }}" class="filter-btn">Tratamientos</a>
            <a href="{{ route('productos.skincare') }}" class="filter-btn">Skincare y Corporal</a>
        </div>

        <!-- Grid de Productos (se llenan desde la tabla productos de la BD) -->
        <section class="productos-grid">
            @forelse ($productos as $producto)
                <div class="producto-card">
                    <div class="img-wrapper">
                        <span class="flower-icon">🌺</span>
                        <img src="{{ asset('img/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" onerror="this.src='{{ asset('img/logo.png') }}'">
                    </div>
                    <span class="producto-name">{{ $producto->nombre }}</span>
                    <span class="producto-marca">{{ $producto->marca }}</span>
                    <span class="producto-precio">${{ number_format($producto->precio, 2) }}</span>
                    <a href="https://wa.me/524772554597?text={{ rawurlencode('Hola, me interesa el producto ' . $producto->nombre) }}" target="_blank" class="btn-agregar">Apartar Producto</a>
                </div>
            @empty
                <p class="sin-productos">Por ahora no hay productos en esta categoría.</p>
            @endforelse
        </section>

        <!-- Redirección directa a la vista de tratamientos -->
        <a href="{{ route('productos.tratamientos') }}" class="btn-agregar">Ver más...</a>
    </main>
</body>
</html>
