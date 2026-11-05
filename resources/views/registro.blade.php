<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Crear Cuenta</title>
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
            position: relative;
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

        /* Contenido Principal */
        main {
            flex: 1;
            max-width: 480px;
            margin: 30px auto;
            padding: 0 20px;
            width: 100%;
        }

        .card-container { 
            background: #9C5174; 
            border-radius: 20px; 
            padding: 25px; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.15); 
            color: white; 
            position: relative; 
            text-align: center;
        }

        .close-btn { 
            position: absolute; 
            right: 15px; 
            top: 15px; 
            background: #FFC0CB; 
            color: #000; 
            text-decoration: none; 
            padding: 4px 10px; 
            font-weight: bold; 
            border-radius: 50%;
            font-size: 14px;
        }

        .card-container h2 {
            font-size: 20px;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .card-container p {
            font-size: 13px;
            margin-bottom: 15px;
            opacity: 0.9;
        }

        .inner-box { 
            background: #BD4B7B; 
            border-radius: 15px; 
            padding: 20px; 
            text-align: left;
        }

        .form-group {
            margin-bottom: 12px;
        }

        .form-group label { 
            display: block; 
            margin-bottom: 4px; 
            font-size: 12px; 
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-purple { 
            width: 100%; 
            padding: 10px 15px; 
            border: none; 
            border-radius: 20px; 
            background: #B088F5; 
            color: white;
            font-weight: bold;
            font-size: 14px;
            outline: none;
            box-sizing: border-box; 
        }

        .input-purple::placeholder {
            color: #EAE0FF;
        }

        .terms { 
            margin: 15px 0; 
            font-size: 12px; 
            text-align: center; 
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .terms input[type="checkbox"] {
            accent-color: #9C5174;
            cursor: pointer;
        }

        .btn-submit { 
            display: block; 
            width: 70%; 
            margin: 15px auto 5px auto; 
            padding: 10px; 
            background: #FFC0CB; 
            color: #000; 
            font-weight: bold; 
            border: none; 
            border-radius: 20px; 
            cursor: pointer; 
            text-decoration: underline;
            font-size: 14px;
        }

        .btn-submit:hover {
            background-color: #f7b6c6;
        }

        .login-link { 
            display: block; 
            text-align: center; 
            color: white; 
            font-size: 13px; 
            margin-top: 12px; 
            text-decoration: underline; 
            font-weight: bold;
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
        <div class="card-container">
            <a href="{{ url('/login/cliente') }}" class="close-btn">✕</a>
            <h2>REGÍSTRATE EN LOOK MÁGICO</h2>
            <p>Es rápido y fácil</p>

            <form action="{{ url('/registro') }}" method="POST" class="inner-box">
                @csrf
                
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" class="input-purple" required>
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="input-purple" required>
                </div>

                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" id="email" name="email" class="input-purple" required>
                </div>

                <div class="form-group">
                    <label for="telefono">Número de Celular</label>
                    <input type="tel" id="telefono" name="telefono" class="input-purple" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" class="input-purple" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="input-purple" required>
                </div>

                <div class="terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms" style="margin:0; cursor:pointer;">Acepto los Términos y Condiciones</label>
                </div>

                <button type="submit" class="btn-submit">REGISTRARME</button>
                <a href="{{ url('/login/cliente') }}" class="login-link">¿Ya tienes cuenta? Inicia Sesión</a>
            </form>
        </div>
    </main>

</body>
</html>