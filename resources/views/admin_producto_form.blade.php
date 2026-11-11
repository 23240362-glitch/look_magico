<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Producto</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --magenta-principal: #b04b77;
            --magenta-oscuro: #923a60;
            --rosa-tarjeta: #ffd1e4;
            --rosa-claro-bg: #fdf5f8;
            --texto-oscuro: #333333;
        }

        body {
            background-color: var(--rosa-claro-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--texto-oscuro);
        }

        /* Sidebar Lateral */
        .sidebar {
            min-height: 100vh;
            background-color: var(--magenta-principal);
            color: #fff;
            padding: 25px 15px;
        }

        .logo-container {
            background-color: #fff;
            border-radius: 20px;
            padding: 15px;
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .menu-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-list li {
            margin-bottom: 8px;
        }

        .menu-list a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.88rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            display: block;
            padding: 10px 12px;
            border-radius: 6px;
            transition: all 0.2s;
        }

        .menu-list a:hover {
            background-color: rgba(255, 255, 255, 0.15);
        }

        .menu-list a.active {
            background-color: #f7bcd4;
            color: var(--magenta-oscuro);
        }

        /* Top Bar */
        .top-header {
            background-color: var(--magenta-principal);
            color: #fff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-header h5 {
            margin: 0;
            font-weight: 700;
            letter-spacing: 1px;
            font-size: 1.1rem;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            background-color: #fff;
            color: var(--magenta-oscuro);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* Tarjetas de Dashboard */
        .card-stat-pink {
            background-color: var(--rosa-tarjeta);
            border-radius: 25px;
            padding: 25px 20px;
            border: none;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
            height: 100%;
        }

        .stat-title {
            font-size: 0.95rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            color: #4a4a4a;
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 3.2rem;
            font-weight: 800;
            color: #111;
            line-height: 1;
        }

        /* Performance Bar */
        .progress-bar-custom {
            height: 6px;
            background-color: #e2aec4;
            border-radius: 10px;
            margin-bottom: 12px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background-color: #333;
        }

        /* Tabla Próximas Citas */
        .section-subtitle {
            font-weight: 700;
            font-size: 0.95rem;
            letter-spacing: 1px;
            margin-top: 25px;
            margin-bottom: 12px;
        }

        .table-header-pink {
            background-color: var(--magenta-principal);
            color: #fff;
            border-radius: 15px;
            padding: 10px 20px;
            font-weight: 700;
            font-size: 0.82rem;
            letter-spacing: 0.5px;
        }

        .table-row-item {
            padding: 12px 20px;
            font-size: 0.85rem;
            font-weight: 600;
            border-bottom: 1px dashed #e5c0d0;
        }

        /* Gráfica Insumos */
        .chart-bar {
            width: 32px;
            border-radius: 4px 4px 0 0;
            display: inline-block;
        }
        .bar-blue { background-color: #4a86f7; }
        .bar-purple { background-color: #b28bf5; }

        /* Tabla de productos */
        .card-custom {
            background-color: #fff;
            border-radius: 20px;
            border: none;
            box-shadow: 0 4px 10px rgba(0,0,0,0.04);
        }

        .tabla-productos thead th {
            background-color: var(--magenta-principal);
            color: #fff;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            border: none;
        }

        .tabla-productos td {
            font-size: 0.88rem;
        }

        .miniatura {
            width: 55px;
            height: 55px;
            object-fit: cover;
            border-radius: 12px;
        }

        .btn-magenta {
            background-color: var(--magenta-principal);
            color: #fff;
            border-radius: 20px;
            font-weight: 600;
            padding: 8px 20px;
        }

        .btn-magenta:hover {
            background-color: var(--magenta-oscuro);
            color: #fff;
        }

        .form-control, .form-select {
            border: 2px solid var(--rosa-tarjeta);
            border-radius: 15px;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--magenta-principal);
            box-shadow: none;
        }

        .form-label {
            font-weight: 700;
            font-size: 0.82rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .foto-actual {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0">
        <!-- Sidebar Izquierda -->
        <div class="col-md-3 col-lg-2 sidebar">
            <!-- Contenedor Logo -->
            <div class="logo-container">
                <img src="{{ asset('img/logo.png') }}" alt="Look Mágico Logo" onerror="this.src='https://via.placeholder.com/150x150/ffffff/b04b77?text=Look+Mágico'">
            </div>

            <!-- Menú -->
            <ul class="menu-list">
                <li><a href="{{ route('admin.dashboard') }}">- PANEL PRINCIPAL</a></li>
                <li><a href="{{ route('servicios.general') }}">- INVENTARIO DE SERVICIOS</a></li>
                <li><a href="{{ route('admin.productos.index') }}" class="active">- CONTROL DE INVENTARIO (INSUMOS)</a></li>
                <li><a href="{{ route('admin.agenda') }}">- CONTROL DE AGENDA (CITAS)</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" style="background:none; border:none; color:#fff; font-weight:600; font-size:0.88rem; padding:10px 12px; text-transform:uppercase;">
                            - CERRAR SESIÓN
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Contenido Principal -->
        <div class="col-md-9 col-lg-10">
            <!-- Header Superior -->
            <div class="top-header">
                <h5>LOOK MAGICO - CONTROL DE INVENTARIO</h5>
                <div class="d-flex align-items-center gap-3">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name ?? 'G', 0, 1)) }}
                    </div>
                </div>
            </div>

            <div class="p-4">
                <!-- Mensajes de éxito -->
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <h6 class="fw-bold mb-4" style="letter-spacing: 1px;">{{ $producto ? 'MODIFICAR PRODUCTO' : 'NUEVO PRODUCTO' }}</h6>

                <div class="card card-custom p-4">
                    <!-- Si hay producto se modifica (PUT), si no, se da de alta (POST) -->
                    <form action="{{ $producto ? route('admin.productos.update', $producto->id) : route('admin.productos.store') }}"
                          method="POST" enctype="multipart/form-data"
                          onsubmit="return confirm('¿Deseas guardar los datos del producto?');">
                        @csrf
                        @if ($producto)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nombre del producto</label>
                                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $producto->nombre ?? '') }}" required>
                                @error('nombre') <small class="text-danger fw-bold">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Marca</label>
                                <input type="text" name="marca" class="form-control" value="{{ old('marca', $producto->marca ?? '') }}" required>
                                @error('marca') <small class="text-danger fw-bold">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Categoría</label>
                                <select name="categoria" class="form-select" required>
                                    <option value="">[ Selecciona ]</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria }}" @selected(old('categoria', $producto->categoria ?? '') == $categoria)>{{ $categoria }}</option>
                                    @endforeach
                                </select>
                                @error('categoria') <small class="text-danger fw-bold">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Precio (MXN)</label>
                                <input type="number" name="precio" step="0.01" min="0.01" class="form-control" value="{{ old('precio', $producto->precio ?? '') }}" required>
                                @error('precio') <small class="text-danger fw-bold">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Existencias</label>
                                <input type="number" name="stock" step="1" min="0" class="form-control" value="{{ old('stock', $producto->stock ?? 0) }}" required>
                                @error('stock') <small class="text-danger fw-bold">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Descripción / instrucciones de uso</label>
                                <textarea name="descripcion" rows="3" class="form-control">{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>
                                @error('descripcion') <small class="text-danger fw-bold">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Fotografía (JPG o PNG, máximo 4 MB)</label>
                                @if ($producto && $producto->imagen)
                                    <div class="mb-2">
                                        <img src="{{ asset('img/productos/' . $producto->imagen) }}" alt="Foto actual" class="foto-actual" onerror="this.src='{{ asset('img/logo.png') }}'">
                                        <small class="text-muted d-block">Si no eliges otra, se conserva la actual.</small>
                                    </div>
                                @endif
                                <input type="file" name="imagen" accept=".jpg,.jpeg,.png" class="form-control">
                                @error('imagen') <small class="text-danger fw-bold">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-magenta">Guardar</button>
                            <a href="{{ route('admin.productos.index') }}" class="btn btn-outline-secondary" style="border-radius: 20px;">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
