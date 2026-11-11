<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Panel de Control</title>
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
            <!-- En resources/views/admin_dashboard.blade.php -->
<ul class="menu-list">
    <li><a href="{{ route('admin.dashboard') }}">- PANEL PRINCIPAL</a></li>
    <li><a href="{{ route('servicios.general') }}">- INVENTARIO DE SERVICIOS</a></li>
    <li><a href="{{ route('admin.productos.index') }}">- CONTROL DE INVENTARIO (INSUMOS)</a></li>
    <!-- Enlace a la agenda de citas -->
   <li>
    <a href="{{ route('admin.agenda') }}" class="{{ request()->routeIs('admin.agenda') ? 'active' : '' }}">
        - CONTROL DE AGENDA (CITAS)
    </a>
</li>
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
                <h5>LOOK MAGICO - PANEL DE CONTROL</h5>
                <div class="d-flex align-items-center gap-3">
                    <i class="fa-solid fa-bell text-warning fs-5"></i>
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name ?? 'G', 0, 1)) }}
                    </div>
                </div>
            </div>

            <!-- Dashboard Body -->
            <div class="p-4">
                <h6 class="fw-bold mb-4" style="letter-spacing: 1px;">PANEL PRINCIPAL</h6>

                <!-- Fila de Tarjetas -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="card-stat-pink d-flex flex-column justify-content-between">
                            <div class="d-flex justify-content-between align-items-start">
                                <span class="stat-title">CITAS HOY</span>
                                <span class="fs-4">🗓️</span>
                            </div>
                            <div class="stat-number">10</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card-stat-pink d-flex flex-column justify-content-between">
                            <span class="stat-title">INGRESOS SEMANALES</span>
                            <div class="stat-number">$5,000</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card-stat-pink">
                            <span class="stat-title d-block text-center mb-3">RENDIMIENTO DE SERVICIOS</span>
                            <div class="mt-4">
                                <div class="progress-bar-custom">
                                    <div class="progress-fill" style="width: 70%;"></div>
                                </div>
                                <div class="progress-bar-custom">
                                    <div class="progress-fill" style="width: 45%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección Próximas Citas & Insumos -->
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="section-subtitle">PRÓXIMAS CITAS</div>

                        <!-- Header Tabla -->
                        <div class="table-header-pink row text-uppercase g-0">
                            <div class="col-4">Nombre de Clientes</div>
                            <div class="col-3">Servicio</div>
                            <div class="col-3">Fecha/Horario</div>
                            <div class="col-2">Estatus</div>
                        </div>

                        <!-- Filas Citas -->
                        <div class="table-row-item row g-0 align-items-center">
                            <div class="col-4">PILY CARMONA</div>
                            <div class="col-3">PLANCHADO ECONOMICO</div>
                            <div class="col-3">SAB 19/SEP 11:20AM</div>
                            <div class="col-2 text-uppercase">CONFIRMADO</div>
                        </div>

                        <div class="table-row-item row g-0 align-items-center">
                            <div class="col-4">TOBY HERNANDEZ</div>
                            <div class="col-3">CORTE DE HOMBRE</div>
                            <div class="col-3">SAB 19/SEP 1:00 PM</div>
                            <div class="col-2 text-uppercase">CONFIRMADO</div>
                        </div>
                    </div>

                    <!-- Resumen de Insumos (Gráfica) -->
                    <div class="col-lg-4 text-center">
                        <div class="section-subtitle mb-3">RESUMEN DE INSUMOS</div>
                        
                        <div class="d-flex justify-content-center gap-3 mb-3 fs-7">
                            <small><span style="color:#4a86f7;">●</span> Uso</small>
                            <small><span style="color:#b28bf5;">●</span> Pérdidas</small>
                        </div>

                        <!-- Barras Simulación -->
                        <div class="d-flex justify-content-center align-items-end gap-2" style="height: 180px; border-bottom: 1px solid #ccc;">
                            <div class="chart-bar bar-blue" style="height: 85%;"></div>
                            <div class="chart-bar bar-purple" style="height: 55%;"></div>
                            <div class="chart-bar bar-blue" style="height: 70%;"></div>
                            <div class="chart-bar bar-purple" style="height: 40%;"></div>
                            <div class="chart-bar bar-blue" style="height: 50%;"></div>
                            <div class="chart-bar bar-purple" style="height: 30%;"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>