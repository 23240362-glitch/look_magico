<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Restablecer Contraseña</title>
    <style>
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
            font-family: 'Arial Rounded MT Bold', 'Segoe UI', sans-serif; 
        }

        body { 
            background-color: #FAF0E6; 
            color: #333; 
            min-height: 100vh; 
            display: flex;
            flex-direction: column;
        }

        /* Encabezado superior */
        header { 
            background-color: #9C5174; 
            color: white; 
            padding: 10px 20px;
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
        }

        header .logo-box {
            width: 60px;
            display: flex;
            align-items: center;
        }

        header .logo-box img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        header .title-header { 
            font-size: 18px; 
            letter-spacing: 2px; 
            font-weight: bold; 
            text-align: center;
            flex-grow: 1;
        }

        header .spacer {
            width: 60px;
        }

        /* Contenido principal */
        main { 
            flex: 1;
            max-width: 420px; 
            margin: 40px auto; 
            text-align: center; 
            padding: 0 20px; 
        }

        .title-bienvenida { 
            color: #9C5174; 
            font-size: 22px; 
            letter-spacing: 2px; 
            margin-bottom: 25px; 
        }

        /* Formulario y campos */
        .form-group { 
            margin-bottom: 20px; 
            text-align: left; 
        }

        .form-group label { 
            display: block; 
            font-size: 12px; 
            letter-spacing: 1px; 
            color: #333; 
            font-weight: bold; 
            margin-bottom: 5px; 
            text-transform: uppercase; 
        }

        .input-purple-container { 
            position: relative; 
            width: 100%; 
        }

        .input-purple { 
            width: 100%; 
            background-color: #B088F5; 
            color: white; 
            border: none; 
            padding: 12px 20px; 
            border-radius: 25px; 
            font-size: 14px; 
            font-weight: bold; 
            outline: none; 
        }

        .input-purple::placeholder { 
            color: #EAE0FF; 
        }

        .btn-submit-pink { 
            background-color: #FFC0CB; 
            color: black; 
            border: none; 
            padding: 12px 35px; 
            border-radius: 25px; 
            font-weight: bold; 
            font-size: 14px; 
            text-decoration: underline; 
            cursor: pointer; 
            width: 100%;
            margin-top: 10px;
        }

        .back-link {
            display: inline-block;
            color: #9C5174;
            font-weight: bold;
            font-size: 13px;
            margin-top: 20px;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Encabezado superior -->
    <header>
        <div class="logo-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Look Mágico" onerror="this.src='https://via.placeholder.com/60?text=Logo'">
        </div>
        <h1 class="title-header">LOOK MÁGICO</h1>
        <div class="spacer"></div>
    </header>

    <!-- Contenido principal -->
    <main>
        <section>
            <h2 class="title-bienvenida">RESTABLECER CONTRASEÑA</h2>

            @if($errors->any())
                <p style="color: red; font-size: 14px; margin-bottom: 15px;">{{ $errors->first() }}</p>
            @endif

            <form action="{{ route('password.update') }}" method="POST">
                @csrf

                <!-- Campo Correo Electrónico -->
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <div class="input-purple-container">
                        <input type="email" id="email" name="email" class="input-purple" placeholder="ejemplo@gmail.com" required>
                    </div>
                </div>

                <!-- Campo Nueva Contraseña -->
                <div class="form-group">
                    <label for="password">Nueva Contraseña</label>
                    <div class="input-purple-container">
                        <input type="password" id="password" name="password" class="input-purple" placeholder="Ingresa tu nueva contraseña" required>
                    </div>
                </div>

                <!-- Botón de envío -->
                <button type="submit" class="btn-submit-pink">Guardar Nueva Contraseña</button>
            </form>

            <a href="{{ url('/login/admin') }}" class="back-link">&larr; Volver al Login</a>
        </section>
    </main>

</body>
</html>