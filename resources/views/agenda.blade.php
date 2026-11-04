<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Look Mágico - Agenda</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', sans-serif; margin: 0; padding: 0; }
        body { background-color: #FAF0E6; color: #333; }

        header { background-color: #9C5174; color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; position: relative; }
        header h2 { letter-spacing: 2px; }
        .logo-badge { position: absolute; right: 30px; top: 10px; background: white; padding: 5px; border-radius: 18px; border: 2px solid #FFD1DC; width: 75px; height: 75px; display: flex; align-items: center; justify-content: center; z-index: 10; }
        .logo-badge img { width: 100%; height: auto; border-radius: 12px; }

        .container { display: flex; flex-wrap: wrap; gap: 40px; padding: 40px; max-width: 1100px; margin: 0 auto; justify-content: space-between; }
        .col-left, .col-right { flex: 1; min-width: 320px; }

        h3 { color: #333; font-size: 18px; font-weight: bold; margin-bottom: 15px; }

        /* Calendario */
        .calendar-box { text-align: center; }
        .calendar-title { background: white; display: inline-block; padding: 5px 20px; font-weight: bold; border-radius: 5px; margin-bottom: 10px; }
        .calendar-table { width: 100%; border-collapse: collapse; background: white; border: 2px solid #9C5174; }
        .calendar-table th { background: #fce4ec; border: 1px solid #9C5174; padding: 8px; font-size: 14px; }
        .calendar-table td { border: 1px solid #9C5174; padding: 12px; text-align: center; cursor: pointer; font-weight: bold; }
        .calendar-table td.empty { color: #ccc; cursor: default; }
        .calendar-table td:not(.empty):hover { background-color: #fce4ec; }
        .calendar-table td.selected { background-color: #32cd32 !important; color: white; border-radius: 50%; }

        /* Botones de Horarios */
        .horarios-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 25px; }
        .btn-hora { background-color: #FFD1DC; border: none; padding: 10px; border-radius: 20px; color: #9C5174; font-weight: bold; cursor: pointer; text-align: center; font-size: 14px; }
        .btn-hora:disabled { background-color: #e0e0e0; color: #aaa; cursor: not-allowed; text-decoration: line-through; }
        .btn-hora.selected { background-color: #9C5174; color: white; }

        /* Resumen */
        .summary-box label { display: block; font-size: 13px; font-weight: bold; margin-top: 10px; margin-bottom: 4px; }
        .summary-input { width: 100%; padding: 10px; background-color: #FFD1DC; border: none; border-radius: 15px; text-align: center; font-weight: bold; color: #9C5174; outline: none; font-size: 14px; }
        .btn-confirm { background-color: #FFD1DC; color: #9C5174; font-weight: bold; padding: 12px 30px; border-radius: 20px; border: none; cursor: pointer; display: block; width: 100%; font-size: 16px; margin-top: 20px; }
        .btn-confirm:hover { background-color: #FFC0CB; }
    </style>
</head>
<body>

    <header>
        <h2>AGENDA</h2>
        <div class="logo-badge">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" onerror="this.src='https://via.placeholder.com/75'">
        </div>
    </header>

    <div class="container">
        <!-- 1. Calendario -->
        <div class="col-left">
            <h3>1. Selecciona el dia para tu cita:</h3>
            <div class="calendar-box">
                <div class="calendar-title">September 2026</div>
                <table class="calendar-table">
                    <thead>
                        <tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>
                    </thead>
                    <tbody>
                        <tr><td class="empty">30</td><td class="empty">31</td><td data-day="01" data-formatted="Martes 01 de Sep">1</td><td data-day="02" data-formatted="Miércoles 02 de Sep">2</td><td data-day="03" data-formatted="Jueves 03 de Sep">3</td><td data-day="04" data-formatted="Viernes 04 de Sep">4</td><td data-day="05" data-formatted="Sábado 05 de Sep">5</td></tr>
                        <tr><td data-day="06" data-formatted="Domingo 06 de Sep">6</td><td data-day="07" data-formatted="Lunes 07 de Sep">7</td><td data-day="08" data-formatted="Martes 08 de Sep">8</td><td data-day="09" data-formatted="Miércoles 09 de Sep">9</td><td data-day="10" data-formatted="Jueves 10 de Sep">10</td><td data-day="11" data-formatted="Viernes 11 de Sep">11</td><td data-day="12" data-formatted="Sábado 12 de Sep">12</td></tr>
                        <tr><td data-day="13" data-formatted="Domingo 13 de Sep">13</td><td data-day="14" data-formatted="Lunes 14 de Sep">14</td><td data-day="15" data-formatted="Martes 15 de Sep">15</td><td data-day="16" data-formatted="Miércoles 16 de Sep">16</td><td data-day="17" data-formatted="Jueves 17 de Sep">17</td><td data-day="18" data-formatted="Viernes 18 de Sep">18</td><td data-day="19" data-formatted="Sábado 19 de Sep">19</td></tr>
                        <tr><td data-day="20" data-formatted="Domingo 20 de Sep">20</td><td data-day="21" data-formatted="Lunes 21 de Sep">21</td><td data-day="22" data-formatted="Martes 22 de Sep">22</td><td data-day="23" data-formatted="Miércoles 23 de Sep">23</td><td data-day="24" data-formatted="Jueves 24 de Sep">24</td><td data-day="25" data-formatted="Viernes 25 de Sep">25</td><td data-day="26" data-formatted="Sábado 26 de Sep">26</td></tr>
                        <tr><td data-day="27" data-formatted="Domingo 27 de Sep">27</td><td data-day="28" data-formatted="Lunes 28 de Sep">28</td><td data-day="29" data-formatted="Martes 29 de Sep">29</td><td data-day="30" data-formatted="Miércoles 30 de Sep">30</td><td class="empty">1</td><td class="empty">2</td><td class="empty">3</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 2. Horarios y Resumen -->
        <div class="col-right">
            <h3>2. Horarios Disponibles:</h3>
            <div class="horarios-grid">
                <button class="btn-hora" data-hora="11:00 AM">11:00 AM</button>
                <button class="btn-hora" data-hora="11:30 AM">11:30 AM</button>
                <button class="btn-hora" data-hora="12:00 PM">12:00 PM</button>
                <button class="btn-hora" data-hora="12:30 PM">12:30 PM</button>
                <button class="btn-hora" data-hora="1:00 PM">1:00 PM</button>
                <button class="btn-hora" data-hora="1:30 PM">1:30 PM</button>
            </div>

            <div class="summary-box">
                <h3>3. Resumen de Reserva</h3>
                
                <label>Servicio:</label>
                <input type="text" id="resumen-servicio" class="summary-input" placeholder="Escribe el servicio aquí..." required>
                
                <label>Fecha:</label>
                <input type="text" id="resumen-fecha" class="summary-input" value="[ Selecciona un dia (+)]" readonly>

                <label>Hora:</label>
                <input type="text" id="resumen-hora" class="summary-input" value="[ Selecciona una hora (+)]" readonly>

                <button class="btn-confirm" id="btn-confirmar">Confirmar cita &rarr;</button>
            </div>
        </div>
    </div>

    <script>
    let fechaBD = '';
    let horaSeleccionada = '';
    const rutaGuardar = "{{ url('/citas/guardar') }}";
    const rutaConfirmacionBase = "{{ url('/cita/confirmada') }}";
    const rutaHorariosOcupados = "{{ url('/api/horarios-ocupados') }}";

    // 1. Clic en Día del Calendario
    document.querySelectorAll('.calendar-table td[data-day]').forEach(td => {
        td.addEventListener('click', function() {
            document.querySelectorAll('.calendar-table td').forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');

            const dia = this.getAttribute('data-day');
            const textoFecha = this.getAttribute('data-formatted');
            fechaBD = `2026-09-${dia}`;
            
            // Actualizar el recuadro de texto de Fecha
            document.getElementById('resumen-fecha').value = textoFecha;

            // Resetear hora al cambiar de día
            horaSeleccionada = '';
            document.getElementById('resumen-hora').value = '[ Selecciona una hora (+)]';

            // Consultar horas ocupadas para deshabilitar botones
            fetch(`${rutaHorariosOcupados}?fecha=${fechaBD}`)
                .then(res => res.json())
                .then(data => {
                    const ocupadas = data.ocupadas || [];
                    document.querySelectorAll('.btn-hora').forEach(btn => {
                        const hora = btn.getAttribute('data-hora');
                        btn.classList.remove('selected');
                        if (ocupadas.includes(hora)) {
                            btn.disabled = true;
                        } else {
                            btn.disabled = false;
                        }
                    });
                })
                .catch(() => {
                    document.querySelectorAll('.btn-hora').forEach(btn => btn.disabled = false);
                });
        });
    });

    // 2. Clic en Botón de Hora Disponible
    document.querySelectorAll('.btn-hora').forEach(btn => {
        btn.addEventListener('click', function() {
            if (this.disabled) return;
            document.querySelectorAll('.btn-hora').forEach(b => b.classList.remove('selected'));
            this.classList.add('selected');
            
            horaSeleccionada = this.getAttribute('data-hora');
            // Actualizar el recuadro de texto de Hora
            document.getElementById('resumen-hora').value = horaSeleccionada;
        });
    });

    // 3. Clic en Confirmar Cita
    document.getElementById('btn-confirmar').addEventListener('click', function() {
        const servicioInput = document.getElementById('resumen-servicio');
        const servicio = servicioInput ? servicioInput.value.trim() : '';

        // Validar que el usuario haya escrito un servicio
        if (!servicio) {
            alert('Por favor ingresa o escribe el servicio que deseas agendar.');
            if (servicioInput) servicioInput.focus();
            return;
        }

        // Validar selección de fecha y hora
        if (!fechaBD || !horaSeleccionada) {
            alert('Por favor selecciona un día del calendario y una hora disponible.');
            return;
        }

        // Guardar en la base de datos y redirigir
        fetch(rutaGuardar, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                servicio: servicio,
                fecha: fechaBD,
                hora: horaSeleccionada
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success' && data.cita_id) {
                // Redirecciona de inmediato a la interfaz de confirmación
                window.location.href = `${rutaConfirmacionBase}/${data.cita_id}`;
            } else {
                alert(data.message || 'Ocurrió un problema al guardar la cita.');
            }
        })
        .catch(err => {
            console.error(err);
            alert('Error al conectar con el servidor.');
        });
    });
</script>
</body>
</html>