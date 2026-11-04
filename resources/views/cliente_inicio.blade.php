<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Inicio Cliente</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Arial Rounded MT Bold', 'Segoe UI', sans-serif; }
        body { background-color: #FAF0E6; color: #333; position: relative; min-height: 100vh; }

        /* Encabezado superior mauve */
        header { background-color: #9C5174; color: white; height: 65px; display: flex; align-items: center; justify-content: space-between; padding: 0 20px; position: relative; }
        
        .menu-icon { font-size: 32px; color: white; cursor: pointer; text-decoration: none; font-weight: bold; }
        .title-header { font-size: 20px; letter-spacing: 2px; font-weight: bold; flex-grow: 1; text-align: center; margin-right: 40px; }

        /* Logo flotante superpuesto a la derecha */
        .logo-badge { position: absolute; right: 20px; top: 10px; width: 85px; height: 85px; background: white; border-radius: 18px; border: 2px solid #FFD1DC; display: flex; align-items: center; justify-content: center; z-index: 10; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .logo-badge img { width: 100%; height: auto; border-radius: 15px; }

        /* Contenido principal */
        .main-container { text-align: center; padding: 40px 20px; max-width: 800px; margin: 0 auto; }
        .bienvenida-txt { color: #9C5174; font-size: 24px; font-weight: bold; letter-spacing: 1px; margin-bottom: 8px; text-transform: uppercase; }
        .quote-txt { font-weight: bold; font-size: 15px; margin-bottom: 25px; color: #000; }

        /* Imagen central */
        .img-container { margin: 0 auto 25px auto; width: 260px; border-radius: 25px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.15); }
        .img-container img { width: 100%; display: block; border-radius: 25px; }

        .desc-txt { max-width: 650px; margin: 0 auto 30px auto; font-size: 15px; font-weight: bold; line-height: 1.4; color: #000; }

        /* Botones rosados */
        .buttons-row { display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; }
        .btn-pink { background-color: #FFC0CB; color: black; border: none; padding: 12px 35px; border-radius: 25px; font-weight: bold; font-size: 14px; text-decoration: underline; cursor: pointer; display: inline-block; }
        .btn-pink:hover { background-color: #f7b6c6; }
    </style>
</head>
<body>

    <header>
        <div class="menu-icon">☰</div>
        <div class="title-header">LOOK MAGICO</div>
        <div class="logo-badge">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" onerror="this.src='https://via.placeholder.com/80?text=Look+Magico'">
        </div>
    </header>

    <div class="main-container">
        <h2 class="bienvenida-txt">¡BIENVENIDA A TU LUGAR SEGURO!</h2>
        <p class="quote-txt">"Realza tu belleza natural y renueva tu energía"</p>

        <div class="img-container">
            <img src="{{ asset('images/estilismo.png') }}" alt="Estilismo" onerror="this.src='https://via.placeholder.com/260x160/9C5174/FFFFFF?text=Estilismo'">
        </div>

        <p class="desc-txt">
            Ofrecemos una experiencia exclusiva de estilismo, cuidado facial y relajación personalizada para que te sientas y te veas increíble
        </p>

        <div class="buttons-row">
            <a href="{{ url('/agenda') }}" class="btn-pink">Agenda tu cita hoy</a>
            <a href="{{ url('/servicios') }}" class="btn-pink">Ver servicios</a>
        </div>
    </div>

</body>
</html>