<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administradora - Look Mágico</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --rosa-principal: #d63384;
            --rosa-oscuro: #b02a6f;
            --rosa-claro: #fdf2f7;
            --dorado: #d4af37;
            --fondo: #f8f9fa;
        }

        body {
            background-color: var(--fondo);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar Navegación */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #2b2b2b 0%, #1a1a1a 100%);
            color: #fff;
            padding-top: 20px;
        }

        .sidebar .brand-title {
            color: var(--rosa-principal);
            font-weight: 700;
            font-size: 1.4rem;
            letter-spacing: 1px;
            padding: 0 20px 20px 20px;
            border-bottom: 1px solid #444;
        }

        .sidebar a {
            color: #ccc;
            text-decoration: none;
            padding: 12px 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: var(--rosa-principal);
            color: #fff;
            border-radius: 0 25px 25px 0;
            margin-right: 15px;
        }

        /* Encabezado */
        .navbar-custom {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 15px 30px;
        }

        /* Tarjetas de Estadísticas */
        .card-stat {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.04);
            transition: transform 0.2s;
        }

        .card-stat:hover {
            transform: translateY(-4px);
        }

        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .bg-rosa-light { background-color: var(--rosa-claro); color: var(--rosa-principal); }
        .bg-dorado-light { background-color: #fffdf0; color: var(--dorado); }

        /* Botón Logout */
        .btn-logout {
            background-color: transparent;
            color: #ff6b6b;
            border: 1px solid #ff6b6b;
            padding: 8px 20px;
            border-radius: 20px;
            transition: all 0.3s;
        }

        .btn-logout:hover {
            background-color: #ff6b6b;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Panel Lateral (Sidebar) -->
        <div class="col-md-3 col-lg-2 sidebar px-0">
            <div class="brand-title text-center">
                <i class="fa-solid fa-wand-magic-sparkles me-2"></i>LOOK MÁGICO
            </div>
            <div class="mt-4">
                <a href="#" class="active"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                <a href="{{ route('agenda') }}"><i class="fa-solid fa-calendar-days"></i> Agenda Citas</a>
                <a href="{{ route('servicios.general') }}"><i class="fa-solid fa-scissors"></i> Servicios</a>
                <a href="{{ route('productos.general') }}"><i class="fa-solid fa-pump-soap"></i> Productos</a>
            </div>
        </div>

        <!-- Contenido Principal -->
        <div class="col-md-9 col-lg-10 px-0">
            <!-- Barra Superior (Navbar) -->
            <div class="navbar-custom d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="m-0 text-dark fw-bold">Panel de Administradora</h4>
                    <small class="text-muted">Bienvenida, {{ Auth::user()->name ?? 'Administradora' }}</small>
                </div>

                <!-- Formulario de Cerrar Sesión -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-logout">
                        <i class="fa-solid fa-right-from-bracket me-1"></i> Cerrar Sesión
                    </button>
                </form>
            </div>

            <!-- Contenido Dashboard -->
            <div class="p-4">
                <!-- Tarjetas Métricas Rápidas -->
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <div class="card card-stat p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="text-muted mb-1">Citas del Día</h6>
                                    <h3 class="fw-bold mb-0">8</h3>
                                </div>
                                <div class="icon-box bg-rosa-light">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-stat p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="text-muted mb-1">Clientas Registradas</h6>
                                    <h3 class="fw-bold mb-0">24</h3>
                                </div>
                                <div class="icon-box bg-dorado-light">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-stat p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="text-muted mb-1">Servicios Activos</h6>
                                    <h3 class="fw-bold mb-0">12</h3>
                                </div>
                                <div class="icon-box bg-rosa-light">
                                    <i class="fa-solid fa-sparkles"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabla de accesos / resumen -->
                <div class="card card-stat p-4">
                    <h5 class="fw-bold mb-3" style="color: var(--rosa-principal);">Acciones Rápidas</h5>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ route('agenda') }}" class="btn text-white px-4 py-2" style="background-color: var(--rosa-principal); border-radius: 10px;">
                            <i class="fa-solid fa-calendar-plus me-1"></i> Ver Agenda General
                        </a>
                        <a href="{{ route('productos.general') }}" class="btn btn-outline-secondary px-4 py-2" style="border-radius: 10px;">
                            <i class="fa-solid fa-boxes-stacked me-1"></i> Revisar Catálogo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>