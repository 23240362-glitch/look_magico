<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Control de Agenda</title>
    <!-- Bootstrap 5 & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --magenta-principal: #b04b77;
            --magenta-oscuro: #923a60;
            --rosa-claro-bg: #fdf5f8;
        }

        body {
            background-color: var(--rosa-claro-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

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
        }

        .menu-list {
            list-style: none;
            padding: 0;
            margin: 0;
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
        }

        .menu-list a.active {
            background-color: #f7bcd4;
            color: var(--magenta-oscuro);
        }

        .top-header {
            background-color: var(--magenta-principal);
            color: #fff;
            padding: 15px 30px;
        }

        .card-custom {
            background: white;
            border-radius: 15px;
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .table-header-pink {
            background-color: var(--magenta-principal);
            color: #fff;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 sidebar">
            <div class="logo-container">
                <img src="{{ asset('img/logo.png') }}" alt="Look Mágico Logo" onerror="this.src='https://via.placeholder.com/150x150/ffffff/b04b77?text=Look+Mágico'">
            </div>
            <ul class="menu-list">
                <li><a href="{{ route('admin.dashboard') }}">- PANEL PRINCIPAL</a></li>
                <li><a href="{{ route('servicios.general') }}">- INVENTARIO DE SERVICIOS</a></li>
                <li><a href="{{ route('admin.productos.index') }}">- CONTROL DE INVENTARIO (INSUMOS)</a></li>
                <li><a href="{{ route('admin.agenda') }}" class="active">- CONTROL DE AGENDA (CITAS)</a></li>
            </ul>
        </div>

        <!-- Contenido -->
        <div class="col-md-9 col-lg-10">
            <div class="top-header d-flex justify-content-between align-items-center">
                <h5 class="m-0 fw-bold">LOOK MAGICO - GESTIÓN DE CITAS DEL DÍA</h5>
            </div>

            <div class="p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold m-0">CITAS PROGRAMADAS</h5>
                    <span class="badge bg-danger fs-6">Total: {{ isset($citas) ? $citas->count() : 0 }} Citas</span>
                </div>

                <div class="card card-custom p-3">
                    <table class="table table-hover align-middle">
                        <thead class="table-header-pink">
                            <tr>
                                <th>CLIENTE</th>
                                <th>SERVICIO</th>
                                <th>FECHA / HORARIO</th>
                                <th>ESTATUS</th>
                                <th class="text-center">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($citas ?? [] as $cita)
                                @php
                                    $estadoActual = strtolower($cita->estado ?? 'confirmada');
                                    $badgeClass = 'bg-success';
                                    if ($estadoActual === 'pendiente') {
                                        $badgeClass = 'bg-warning text-dark';
                                    } elseif ($estadoActual === 'cancelada') {
                                        $badgeClass = 'bg-danger';
                                    }
                                @endphp
                                <tr>
                                    <td>
                                        <strong>{{ $cita->user->name ?? $cita->clienta ?? 'Clienta' }}</strong><br>
                                        <small class="text-muted">Tel: {{ $cita->user->telefono ?? $cita->telefono ?? 'Sin teléfono' }}</small>
                                    </td>
                                    <td>{{ $cita->servicio }}</td>
                                    <td>
                                        <span class="badge bg-light text-dark border">
                                            {{ \Carbon\Carbon::parse($cita->fecha)->format('d/M/Y') }} - {{ $cita->hora }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge {{ $badgeClass }} status-badge">
                                            {{ ucfirst($estadoActual) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-success btn-confirmar" title="Confirmar Cita"><i class="fa-solid fa-check"></i></button>
                                        <button class="btn btn-sm btn-outline-danger btn-cancelar" title="Cancelar Cita"><i class="fa-solid fa-xmark"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        No hay citas registradas en la base de datos.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script para cambio dinámico de estatus -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Botones de Confirmar
        document.querySelectorAll('.btn-confirmar').forEach(function(btn) {
            btn.addEventListener('click', function() {
                let fila = this.closest('tr');
                let badge = fila.querySelector('.status-badge');
                badge.className = 'badge bg-success status-badge';
                badge.textContent = 'Confirmada';
            });
        });

        // Botones de Cancelar
        document.querySelectorAll('.btn-cancelar').forEach(function(btn) {
            btn.addEventListener('click', function() {
                let fila = this.closest('tr');
                let badge = fila.querySelector('.status-badge');
                badge.className = 'badge bg-danger status-badge';
                badge.textContent = 'Cancelada';
            });
        });
    });
</script>

</body>
</html>