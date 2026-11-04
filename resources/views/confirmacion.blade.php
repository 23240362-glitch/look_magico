<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Confirmación</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', sans-serif; margin: 0; padding: 0; }
        body { background-color: #FAF0E6; text-align: center; color: #333; }

        header { background-color: #9C5174; color: white; padding: 15px; display: flex; align-items: center; justify-content: center; position: relative; }
        .header-title { font-size: 18px; letter-spacing: 2px; font-weight: bold; }
        .logo-badge { position: absolute; left: 20px; top: 10px; width: 75px; height: 75px; background: white; border-radius: 18px; border: 2px solid #FFD1DC; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .logo-badge img { width: 100%; height: auto; border-radius: 15px; }

        .sub-header { margin: 25px 0 15px 0; font-size: 14px; font-weight: 500; }

        .card-purple { max-width: 550px; margin: 0 auto; background-color: #B088F5; border-radius: 25px; padding: 30px; color: white; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .card-purple h2 { letter-spacing: 2px; margin-bottom: 20px; font-size: 20px; }

        .inner-box { background-color: #B54378; border-radius: 20px; padding: 25px; text-align: center; }
        .details-white { background-color: #FCE4EC; color: #333; border-radius: 15px; padding: 20px; text-align: left; max-width: 380px; margin: 0 auto; font-size: 15px; line-height: 1.8; font-weight: 500; }
        .details-white div { display: flex; justify-content: space-between; }
        .details-white .monto { margin-top: 15px; font-weight: bold; font-size: 16px; }

        .whatsapp-btn { display: inline-flex; align-items: center; gap: 8px; margin-top: 20px; color: white; text-decoration: none; font-weight: bold; font-size: 14px; }
        .whatsapp-icon { background: #25D366; width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 20px; }

        .link-citas { display: block; color: white; text-decoration: none; font-size: 13px; margin-top: 15px; font-weight: bold; }
        
        .btn-inicio { display: inline-block; background-color: #FCE4EC; color: #333; text-decoration: none; padding: 10px 30px; border-radius: 20px; font-weight: bold; margin-top: 20px; font-size: 14px; }
    </style>
</head>
<body>

    <header>
        <div class="logo-badge">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" onerror="this.src='https://via.placeholder.com/75'">
        </div>
        <div class="header-title">LOOK MAGICO - CONFIRMACION</div>
    </header>

    <div class="sub-header">
        <p>¡Tus datos han sido registrados!</p>
        <p>Para cualquier duda, envíanos un mensaje a WhatsApp.</p>
    </div>

    <div class="card-purple">
        <h2>DETALLES DE TU RESERVA</h2>

        <div class="inner-box">
            <div class="details-white">
                <div><span>Nombre:</span> <strong>{{ $cita->user->name ?? 'Pily Carmona' }}</strong></div>
                <div><span>Servicio:</span> <strong>{{ $cita->servicio }}</strong></div>
                <div><span>Fecha:</span> <strong>{{ \Carbon\Carbon::parse($cita->fecha)->locale('es')->isoFormat('D \d\e MMMM') }}</strong></div>
                <div><span>Hora:</span> <strong>{{ $cita->hora }}</strong></div>
                <div><span>Núm. Teléfono:</span> <strong>{{ $cita->user->telefono ?? '4772554597' }}</strong></div>
                
                <div class="monto">
                    <span>Monto Estimado:</span> <strong>${{ number_format($montoEstimado, 2) }} MXN</strong>
                </div>
            </div>

            <a href="https://wa.me/524772554597?text=Hola,%20quisiera%20consultar%20sobre%20mi%20cita%20de%20{{ urlencode($cita->servicio) }}" class="whatsapp-btn" target="_blank">
                <div class="whatsapp-icon">💬</div>
                <span>Enviar WhatsApp</span>
            </a>

            <a href="{{ url('/cliente/citas') }}" class="link-citas">&lt; Ir a mis citas &gt;</a>
        </div>

        <a href="{{ url('/cliente/inicio') }}" class="btn-inicio">Volver al Inicio</a>
    </div>

</body>
</html>