<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Inventario de Servicios</title>
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

        /* Tabla de servicios */
        .card-custom {
            background-color: #fff;
            border-radius: 20px;
            border: none;
            box-shadow: 0 4px 10px rgba(0,0,0,0.04);
        }

        .tabla-servicios thead th {
            background-color: var(--magenta-principal);
            color: #fff;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            border: none;
        }

        .tabla-servicios td {
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
                <li><a href="{{ route('servicios.general') }}" class="active">- INVENTARIO DE SERVICIOS</a></li>
                <li><a href="{{ route('admin.productos.index') }}">- CONTROL DE INVENTARIO (INSUMOS)</a></li>
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
                <h5>LOOK MAGICO - INVENTARIO DE SERVICIOS</h5>
                <div class="d-flex align-items-center gap-3">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>
                </div>
            </div>

            <div class="p-4">
                <!-- Mensajes de éxito -->
                @if (session('success'))
                    <div class="alert alert-success border-0 shadow-sm rounded-3">{{ session('success') }}</div>
                @endif

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
                    <h6 class="fw-bold m-0" style="letter-spacing: 1px;">SERVICIOS DEL CATÁLOGO</h6>
                    <a href="{{ route('servicios.create') }}" class="btn btn-magenta">
                        <i class="fa-solid fa-plus"></i> Nuevo servicio
                    </a>
                </div>

                <!-- Filtros por categoría y estatus -->
                <form method="GET" action="{{ route('servicios.general') }}" class="row g-2 mb-4">
                    <div class="col-md-4">
                        <select name="categoria" class="form-select">
                            <option value="">Todas las categorías</option>
                            @php
                                $categoriasServicios = ['Cortes', 'Depilaciones', 'Maquillajes', 'Peinados', 'Manicuras', 'Pedicuras', 'Tintes', 'Rayos', 'Tratamientos'];
                            @endphp
                            @foreach ($categoriasServicios as $cat)
                                <option value="{{ $cat }}" @selected(request('categoria') == $cat)>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="estatus" class="form-select">
                            <option value="">Alta y baja</option>
                            <option value="ALTA" @selected(request('estatus') == 'ALTA')>Solo en alta</option>
                            <option value="BAJA" @selected(request('estatus') == 'BAJA')>Solo dados de baja</option>
                        </select>
                    </div>
                    <div class="col-md-5 d-flex gap-2">
                        <button type="submit" class="btn btn-magenta">Filtrar</button>
                        <a href="{{ route('servicios.general') }}" class="btn btn-outline-secondary" style="border-radius: 20px;">Limpiar</a>
                    </div>
                </form>

                <!-- Tabla de servicios -->
                <div class="card card-custom p-3">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle tabla-servicios mb-0">
                            <thead>
                                <tr>
                                    <th>FOTO</th>
                                    <th>SERVICIO</th>
                                    <th>CATEGORÍA</th>
                                    <th>PRECIO</th>
                                    <th>DURACIÓN</th>
                                    <th>ESTATUS</th>
                                    <th class="text-center">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($servicios as $servicio)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('img/' . ($servicio->imagen ?? 'logo.png')) }}" alt="{{ $servicio->nombre }}" class="miniatura" onerror="this.src='{{ asset('img/logo.png') }}'">
                                        </td>
                                        <td><strong>{{ $servicio->nombre }}</strong><br><small class="text-muted">{{ $servicio->descripcion ?? 'Sin descripción' }}</small></td>
                                        <td>{{ $servicio->categoria }}</td>
                                        <td>${{ number_format($servicio->precio, 2) }}</td>
                                        <td>{{ $servicio->duracion ?? '45' }} min</td>
                                        <td>
                                            @if (($servicio->estatus ?? 'ALTA') == 'ALTA')
                                                <span class="badge bg-success">Alta</span>
                                            @else
                                                <span class="badge bg-secondary">Baja</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <!-- Modificar -->
                                            <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-sm btn-outline-primary" title="Modificar">
                                                <i class="fa-solid fa-pen"></i> Modificar
                                            </a>

                                            @if (($servicio->estatus ?? 'ALTA') == 'ALTA')
                                                <!-- Dar de baja -->
                                                <form action="{{ route('servicios.baja', $servicio->id) }}" method="POST" class="d-inline"
                                                      onsubmit="return confirm('¿Dar de baja {{ $servicio->nombre }}? Ya no estará disponible para citas.');">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Dar de baja">
                                                        <i class="fa-solid fa-arrow-down"></i> Baja
                                                    </button>
                                                </form>
                                            @else
                                                <!-- Volver a dar de alta -->
                                                <form action="{{ route('servicios.alta', $servicio->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-outline-success" title="Dar de alta">
                                                        <i class="fa-solid fa-arrow-up"></i> Alta
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">No hay servicios registrados con esos filtros.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>