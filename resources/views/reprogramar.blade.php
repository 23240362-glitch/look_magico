<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Reprogramar cita</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', sans-serif; margin: 0; padding: 0; }
        body { background-color: #FAF0E6; color: #333; }

        header { background-color: #9C5174; color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; position: relative; min-height: 70px; }
        header h2 { letter-spacing: 2px; }
        .logo-badge { position: absolute; right: 30px; top: 10px; background: white; padding: 5px; border-radius: 18px; border: 2px solid #FFD1DC; width: 75px; height: 75px; display: flex; align-items: center; justify-content: center; z-index: 10; }
        .logo-badge img { width: 100%; height: auto; border-radius: 12px; }

        .container { max-width: 620px; margin: 40px auto; padding: 0 20px; }
        h3 { font-size: 18px; font-weight: bold; margin: 20px 0 12px; }

        .cita-actual { background: white; border: 2px solid #FFD1DC; border-radius: 15px; padding: 15px 20px; line-height: 1.7; }
        .cita-actual strong { color: #9C5174; }

        .summary-input { width: 100%; padding: 10px; background-color: #FFD1DC; border: none; border-radius: 15px; text-align: center; font-weight: bold; color: #9C5174; outline: none; font-size: 15px; }

        .horarios-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px; margin-bottom: 20px; }
        .btn-hora { background-color: #FFD1DC; border: none; padding: 10px; border-radius: 20px; color: #9C5174; font-weight: bold; cursor: pointer; font-size: 14px; }
        .btn-hora:disabled { background-color: #e0e0e0; color: #aaa; cursor: not-allowed; text-decoration: line-through; }
        .btn-hora.selected { background-color: #9C5174; color: white; }

        .aviso { font-size: 13px; font-weight: bold; color: #9C5174; margin-bottom: 10px; }
        .error { background: #f8d7da; color: #721c24; padding: 10px 15px; border-radius: 10px; font-weight: bold; margin-bottom: 15px; }

        .btn-confirm { background-color: #9C5174; color: white; font-weight: bold; padding: 12px 30px; border-radius: 20px; border: none; cursor: pointer; display: block; width: 100%; font-size: 16px; }
        .btn-confirm:disabled { background-color: #ccc; cursor: not-allowed; }
        .btn-volver { display: block; text-align: center; margin-top: 15px; color: #9C5174; font-weight: bold; text-decoration: none; }
    </style>
</head>
<body>

    <header>
        <h2>REPROGRAMAR CITA</h2>
        <div class="logo-badge">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" onerror="this.src='https://via.placeholder.com/75'">
        </div>
    </header>

    <div class="container">

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <h3>Cita actual</h3>
        <div class="cita-actual">
            <div><strong>Folio:</strong> #{{ $cita->id }}</div>
            <div><strong>Clienta:</strong> {{ $cita->user->name }} {{ $cita->user->apellido }} · {{ $cita->user->telefono }}</div>
            <div><strong>Servicio:</strong> {{ $cita->servicio }}</div>
            <div><strong>Fecha y hora:</strong> {{ \Carbon\Carbon::parse($cita->fecha)->locale('es')->isoFormat('dddd D [de] MMMM') }} · {{ $cita->hora }}</div>
        </div>

        {{-- RF12: se elige la nueva fecha y hora; RF13 valida la separación de 1 h 15 min --}}
        <form method="POST" action="{{ route('citas.actualizar', $cita->id) }}" id="form-reprogramar">
            @csrf
            @method('PUT')

            <h3>1. Nueva fecha</h3>
            <input type="date" name="fecha" id="nueva-fecha" class="summary-input"
                   min="{{ now()->toDateString() }}" value="{{ old('fecha') }}" required>

            <h3>2. Nuevo horario</h3>
            <p class="aviso" id="aviso-horario">Selecciona una fecha para ver los horarios disponibles.</p>
            <div class="horarios-grid" id="horarios-grid"></div>
            <input type="hidden" name="hora" id="nueva-hora" value="{{ old('hora') }}">

            <button type="submit" class="btn-confirm" id="btn-guardar" disabled>Guardar cambios</button>
        </form>

        <a href="{{ auth()->user()->esAdmin() ? route('admin.agenda') : route('cliente.inicio') }}" class="btn-volver">← Volver sin cambios</a>
    </div>

    <script>
        const rutaHorarios = "{{ route('horarios.disponibles') }}";
        const citaId = {{ $cita->id }};
        const inputFecha = document.getElementById('nueva-fecha');
        const inputHora = document.getElementById('nueva-hora');
        const btnGuardar = document.getElementById('btn-guardar');

        function cargarHorarios(fecha) {
            const grid = document.getElementById('horarios-grid');
            const aviso = document.getElementById('aviso-horario');
            inputHora.value = '';
            btnGuardar.disabled = true;
            grid.innerHTML = '';
            aviso.textContent = 'Cargando horarios...';

            // Se excluye esta misma cita para que su horario actual no cuente como ocupado
            fetch(`${rutaHorarios}?fecha=${fecha}&excluir=${citaId}`)
                .then(res => res.json())
                .then(data => {
                    if (data.domingo) {
                        aviso.textContent = 'El salón no abre los domingos. Elige otro día.';
                        return;
                    }

                    const horarios = data.horarios || [];
                    if (!horarios.some(h => h.disponible)) {
                        aviso.textContent = 'No hay horarios disponibles ese día. Elige otro.';
                        return;
                    }

                    aviso.textContent = data.festivo
                        ? 'Día festivo: horario de 10:00 AM a 3:00 PM y aplica cargo extra.'
                        : 'Horarios con al menos 1 hora y 15 minutos de separación entre citas.';

                    horarios.forEach(h => {
                        const btn = document.createElement('button');
                        btn.type = 'button';
                        btn.className = 'btn-hora';
                        btn.textContent = h.hora;
                        btn.disabled = !h.disponible;
                        btn.addEventListener('click', function () {
                            document.querySelectorAll('.btn-hora').forEach(b => b.classList.remove('selected'));
                            this.classList.add('selected');
                            inputHora.value = h.hora;
                            btnGuardar.disabled = false;
                        });
                        grid.appendChild(btn);
                    });
                })
                .catch(() => {
                    aviso.textContent = 'No se pudieron cargar los horarios. Intenta de nuevo.';
                });
        }

        inputFecha.addEventListener('change', () => {
            if (inputFecha.value) cargarHorarios(inputFecha.value);
        });

        if (inputFecha.value) cargarHorarios(inputFecha.value);
    </script>
</body>
</html>
