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
        .calendar-nav { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
        .calendar-nav button { background: #9C5174; color: white; border: none; padding: 5px 14px; border-radius: 8px; cursor: pointer; font-weight: bold; font-size: 15px; }
        .calendar-nav button:hover { background: #7d3e5b; }
        .calendar-title { background: white; display: inline-block; padding: 5px 20px; font-weight: bold; border-radius: 5px; color: #9C5174; }
        .calendar-table { width: 100%; border-collapse: collapse; background: white; border: 2px solid #9C5174; }
        .calendar-table th { background: #fce4ec; border: 1px solid #9C5174; padding: 8px; font-size: 14px; }
        .calendar-table td { border: 1px solid #9C5174; padding: 12px; text-align: center; cursor: pointer; font-weight: bold; }
        .calendar-table td.empty { color: #ccc; cursor: default; background-color: #fafafa; }
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
        select.summary-input { cursor: pointer; text-align-last: center; }
        select.summary-input optgroup { background-color: #FAF0E6; color: #9C5174; font-weight: bold; text-align: left; }
        select.summary-input option { background-color: white; color: #333; font-weight: normal; }

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
                <div class="calendar-nav">
                    <button type="button" id="prev-month">&larr;</button>
                    <div class="calendar-title" id="calendar-month-year"></div>
                    <button type="button" id="next-month">&rarr;</button>
                </div>
                <table class="calendar-table">
                    <thead>
                        <tr><th>Dom</th><th>Lun</th><th>Mar</th><th>Mié</th><th>Jue</th><th>Vie</th><th>Sáb</th></tr>
                    </thead>
                    <tbody id="calendar-body"></tbody>
                </table>
            </div>
        </div>

        <!-- 2. Horarios y Resumen -->
        <div class="col-right">
            <h3>2. Horarios Disponibles:</h3>
            <div class="horarios-grid">
                <button type="button" class="btn-hora" data-hora="11:00 AM">10:00 AM</button>
                <button type="button" class="btn-hora" data-hora="11:30 AM">11:10 AM</button>
                <button type="button" class="btn-hora" data-hora="12:00 PM">12:20 PM</button>
                <button type="button" class="btn-hora" data-hora="12:30 PM">13:30 PM</button>
                <button type="button" class="btn-hora" data-hora="1:00 PM">14:40 PM</button>
                <button type="button" class="btn-hora" data-hora="1:30 PM">16:30 PM</button>
                <button type="button" class="btn-hora" data-hora="1:30 PM">17:40 PM</button>
            </div>

            <div class="summary-box">
                <h3>3. Resumen de Reserva</h3>
                
                <label for="resumen-servicio">Servicio:</label>
                <select id="resumen-servicio" class="summary-input" required>
                    <option value="" disabled selected>[ Selecciona un servicio (+) ]</option>

                    <optgroup label="Tratamientos Faciales">
                        <option value="Limpiezas profundas" data-slug="limpiezas_profundas">Limpiezas profundas</option>
                        <option value="Peeling químicos" data-slug="peeling_quimicos">Peeling químicos</option>
                        <option value="Hidratación y Nutrición" data-slug="hidratacion_nutricion">Hidratación y Nutrición</option>
                        <option value="Radiofrecuencia" data-slug="radiofrecuencia">Radiofrecuencia</option>
                    </optgroup>

                    <optgroup label="Tratamientos Corporales">
                        <option value="Cavitación" data-slug="cavitacion">Cavitación</option>
                        <option value="Luz Pulsada" data-slug="luz_pulsada">Luz Pulsada</option>
                    </optgroup>

                    <optgroup label="Tratamientos Capilares">
                        <option value="Botox Capilar" data-slug="botox_capilar">Botox Capilar</option>
                        <option value="Queratina" data-slug="queratina">Queratina</option>
                        <option value="Cauterización" data-slug="cauterizacion">Cauterización</option>
                        <option value="Lifting" data-slug="lifting">Lifting</option>
                        <option value="Detox" data-slug="detox">Detox</option>
                        <option value="Anticaspa" data-slug="anticaspa">Anticaspa</option>
                    </optgroup>

                    <optgroup label="Manicuras">
                        <option value="Manicura Clásica" data-slug="clasica">Clásica</option>
                        <option value="Manicura Francesa" data-slug="francesa">Francesa</option>
                        <option value="Manicura Semipermanente" data-slug="semipermanente">Semipermanente</option>
                        <option value="Uñas Acrílicas" data-slug="acrilicas">Uñas Acrílicas</option>
                        <option value="Uñas de Gel" data-slug="gel">Uñas de Gel</option>
                        <option value="Manicura BIAB" data-slug="biab">BIAB</option>
                    </optgroup>

                    <optgroup label="Pedicuras">
                        <option value="Pedicura Clásica">Clásica</option>
                        <option value="Pedicura en Seco" data-slug="seco">Seco</option>
                        <option value="Pedicura Semipermanente">Semipermanente</option>
                        <option value="Pedicura Francesa">Francesa</option>
                        <option value="Pedicura con Parafina" data-slug="parafina">Parafina</option>
                        <option value="Pedicura Piedras Calientes" data-slug="piedras_calientes">Piedras Calientes</option>
                        <option value="Pedicura Spa" data-slug="spa">Spa</option>
                        <option value="Pedicura Podológica" data-slug="podologica">Podológica</option>
                    </optgroup>

                    <optgroup label="Cortes, Tintes y Rayos">
                        <option value="Corte de Dama">Corte de Dama</option>
                        <option value="Corte de Caballero">Corte de Caballero</option>
                        <option value="Corte Infantil">Corte Infantil</option>
                        <option value="Tinte Completo">Tinte Completo</option>
                        <option value="Retoque de Raíz">Retoque de Raíz</option>
                        <option value="Rayos / Mechas">Rayos / Mechas</option>
                        <option value="Balayage">Balayage</option>
                        <option value="Babylights">Babylights</option>
                    </optgroup>

                    <optgroup label="Peinados y Depilaciones">
                        <option value="Peinado Social / Evento">Peinado Social / Evento</option>
                        <option value="Maquillaje Social">Maquillaje Social</option>
                        <option value="Diseño y Depilación de Ceja">Diseño y Depilación de Ceja</option>
                        <option value="Depilación de Bozo / Rostro">Depilación de Bozo / Rostro</option>
                        <option value="Depilación Corporal">Depilación Corporal</option>
                    </optgroup>
                </select>
                
                <label>Fecha:</label>
                <input type="text" id="resumen-fecha" class="summary-input" value="[ Selecciona un dia (+)]" readonly>

                <label>Hora:</label>
                <input type="text" id="resumen-hora" class="summary-input" value="[ Selecciona una hora (+)]" readonly>

                <button type="button" class="btn-confirm" id="btn-confirmar">Confirmar cita &rarr;</button>
            </div>
        </div>
    </div>

    <script>
        let fechaBD = '';
        let horaSeleccionada = '';
        const rutaGuardar = "{{ url('/citas/guardar') }}";
        const rutaConfirmacionBase = "{{ url('/cita/confirmada') }}";
        const rutaHorariosOcupados = "{{ url('/api/horarios-ocupados') }}";

        // Auto-seleccionar servicio si viene desde ?servicio=...
        const paramsUrl = new URLSearchParams(window.location.search);
        const servicioParam = paramsUrl.get('servicio');
        if (servicioParam) {
            const selectServicio = document.getElementById('resumen-servicio');
            const opcionEncontrada = Array.from(selectServicio.options).find(
                opt => opt.dataset.slug === servicioParam || opt.value.toLowerCase() === servicioParam.toLowerCase()
            );
            if (opcionEncontrada) {
                selectServicio.value = opcionEncontrada.value;
            }
        }

        // 1. Calendario Dinámico
        const mesesNombres = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        const mesesCortos = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];
        const diasSemana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];

        let fechaActual = new Date();
        let mesActual = fechaActual.getMonth();
        let anioActual = fechaActual.getFullYear();

        function renderizarCalendario(mes, anio) {
            const tbody = document.getElementById('calendar-body');
            const titulo = document.getElementById('calendar-month-year');
            tbody.innerHTML = '';
            titulo.textContent = `${mesesNombres[mes]} ${anio}`;

            const primerDia = new Date(anio, mes, 1).getDay();
            const diasEnMes = new Date(anio, mes + 1, 0).getDate();
            const hoy = new Date();
            hoy.setHours(0, 0, 0, 0);

            let fechaContador = 1;
            for (let fila = 0; fila < 6; fila++) {
                const tr = document.createElement('tr');
                let filaVacia = true;

                for (let col = 0; col < 7; col++) {
                    const td = document.createElement('td');

                    if ((fila === 0 && col < primerDia) || fechaContador > diasEnMes) {
                        td.classList.add('empty');
                    } else {
                        filaVacia = false;
                        const diaNum = fechaContador;
                        const fechaCelda = new Date(anio, mes, diaNum);
                        td.textContent = diaNum;

                        if (fechaCelda < hoy) {
                            td.classList.add('empty');
                            td.title = 'Fecha pasada';
                        } else {
                            const mesStr = String(mes + 1).padStart(2, '0');
                            const diaStr = String(diaNum).padStart(2, '0');
                            const isoDate = `${anio}-${mesStr}-${diaStr}`;
                            const textoFormateado = `${diasSemana[fechaCelda.getDay()]} ${diaStr} de ${mesesCortos[mes]}`;

                            td.addEventListener('click', function () {
                                document.querySelectorAll('.calendar-table td').forEach(c => c.classList.remove('selected'));
                                this.classList.add('selected');

                                fechaBD = isoDate;
                                document.getElementById('resumen-fecha').value = textoFormateado;

                                horaSeleccionada = '';
                                document.getElementById('resumen-hora').value = '[ Selecciona una hora (+)]';

                                fetch(`${rutaHorariosOcupados}?fecha=${fechaBD}`)
                                    .then(res => res.json())
                                    .then(data => {
                                        const ocupadas = data.ocupadas || [];
                                        document.querySelectorAll('.btn-hora').forEach(btn => {
                                            const hora = btn.getAttribute('data-hora');
                                            btn.classList.remove('selected');
                                            btn.disabled = ocupadas.includes(hora);
                                        });
                                    })
                                    .catch(() => {
                                        document.querySelectorAll('.btn-hora').forEach(btn => btn.disabled = false);
                                    });
                            });
                        }
                        fechaContador++;
                    }
                    tr.appendChild(td);
                }
                if (!filaVacia) tbody.appendChild(tr);
            }
        }

        document.getElementById('prev-month').addEventListener('click', () => {
            mesActual--;
            if (mesActual < 0) {
                mesActual = 11;
                anioActual--;
            }
            renderizarCalendario(mesActual, anioActual);
        });

        document.getElementById('next-month').addEventListener('click', () => {
            mesActual++;
            if (mesActual > 11) {
                mesActual = 0;
                anioActual++;
            }
            renderizarCalendario(mesActual, anioActual);
        });

        renderizarCalendario(mesActual, anioActual);

        // 2. Clic en Botón de Hora Disponible
        document.querySelectorAll('.btn-hora').forEach(btn => {
            btn.addEventListener('click', function() {
                if (this.disabled) return;
                document.querySelectorAll('.btn-hora').forEach(b => b.classList.remove('selected'));
                this.classList.add('selected');
                
                horaSeleccionada = this.getAttribute('data-hora');
                document.getElementById('resumen-hora').value = horaSeleccionada;
            });
        });

        // 3. Clic en Confirmar Cita
        document.getElementById('btn-confirmar').addEventListener('click', function() {
            const servicioInput = document.getElementById('resumen-servicio');
            const servicio = servicioInput ? servicioInput.value.trim() : '';

            if (!servicio) {
                alert('Por favor selecciona el servicio que deseas agendar.');
                if (servicioInput) servicioInput.focus();
                return;
            }

            if (!fechaBD || !horaSeleccionada) {
                alert('Por favor selecciona un día del calendario y una hora disponible.');
                return;
            }

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
            .then(async res => {
                const text = await res.text();
                try {
                    const data = JSON.parse(text);
                    if (res.ok && data.status === 'success' && data.cita_id) {
                        window.location.href = `${rutaConfirmacionBase}/${data.cita_id}`;
                    } else {
                        alert(data.message || 'Ocurrió un problema al guardar la cita en la base de datos.');
                    }
                } catch (e) {
                    console.error('Respuesta no JSON del servidor:', text);
                    alert('Error en el servidor Laravel (500). Revisa las variables $fillable del modelo Cita.');
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