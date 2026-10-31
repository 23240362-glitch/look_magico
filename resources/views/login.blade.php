<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Registro Cliente / Login</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Arial Rounded MT Bold', 'Segoe UI', sans-serif; }
        body { background-color: #FAF0E6; color: #333; }

        /* Topbar con link a la derecha */
        header { background-color: #9C5174; color: white; height: 60px; display: flex; align-items: center; justify-content: space-between; padding: 0 20px; position: relative; }
        .title-header { font-size: 18px; letter-spacing: 2px; font-weight: bold; margin-left: 90px; }
        .top-link { color: white; text-decoration: underline; font-size: 12px; font-weight: bold; }

        /* Logo flotante a la izquierda */
        .logo-badge { position: absolute; left: 20px; top: 10px; width: 85px; height: 85px; background: white; border-radius: 18px; border: 2px solid #FFD1DC; display: flex; align-items: center; justify-content: center; z-index: 10; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .logo-badge img { width: 100%; height: auto; border-radius: 15px; }

        /* Formulario centrado */
        .login-box { max-width: 420px; margin: 40px auto; text-align: center; padding: 0 20px; }
        .title-hola { color: #9C5174; font-size: 22px; letter-spacing: 2px; margin-bottom: 25px; }

        .form-group { margin-bottom: 20px; text-align: left; }
        .form-group label { display: block; font-size: 12px; letter-spacing: 1px; color: #333; font-weight: bold; margin-bottom: 6px; text-transform: uppercase; }

        /* Campos morados estilo cápsula */
        .input-purple-container { position: relative; width: 100%; }
        .input-purple { width: 100%; background-color: #B088F5; color: white; border: none; padding: 12px 20px; border-radius: 25px; font-size: 14px; font-weight: bold; outline: none; }
        .input-purple::placeholder { color: #EAE0FF; }
        
        .eye-icon { position: absolute; right: 15px; top: 50%; transform: translateY(-50%); font-size: 18px; cursor: pointer; }

        .forgot-link { display: block; color: #9C5174; font-size: 12px; font-weight: bold; text-decoration: underline; margin: 15px 0 25px 0; text-transform: uppercase; }

        /* Botón Iniciar Sesión */
        .btn-submit-pink { background-color: #FFC0CB; color: black; border: none; padding: 10px 35px; border-radius: 20px; font-weight: bold; font-size: 14px; text-decoration: underline; cursor: pointer; }
    </style>
</head>
<body>

    <header>
        <div class="logo-badge">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" onerror="this.src='https://via.placeholder.com/80?text=Look+Magico'">
        </div>
        <div class="title-header">LOOK MAGICO - REGISTRO CLIENTE</div>
        <a href="#" class="top-link">¡Crear Cuenta 👄</a>
    </header>

    <div class="login-box">
        <h2 class="title-hola">HOLA BELLEZA</h2>

        <form action="{{ route('login.cliente.post') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label>Usuario</label>
                <div class="input-purple-container">
                    <input type="email" name="email" class="input-purple" value="PILYCARMONA@GMAIL.COM" required>
                </div>
            </div>

            <div class="form-group">
                <label>Contraseña</label>
                <div class="input-purple-container">
                    <input type="password" name="password" class="input-purple" value="12345678" required>
                    <span class="eye-icon">👁️</span>
                </div>
            </div>

            <a href="#" class="forgot-link">¿Olvidaste tu contraseña?</a>

            <button type="submit" class="btn-submit-pink">INICIAR SESIÓN</button>
        </form>
    </div>

</body>
</html>