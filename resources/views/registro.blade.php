<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Look Mágico - Crear Cuenta</title>
    <style>
        body { background-color: #fdf5f7; font-family: sans-serif; margin: 0; padding: 20px; }
        .logo { width: 85px; position: absolute; top: 15px; left: 15px; }
        .card-container { max-width: 450px; margin: 40px auto; background: #b185db; border-radius: 20px; padding: 25px; box-shadow: 0 4px 10px rgba(0,0,0,0.15); color: white; position: relative; }
        .close-btn { position: absolute; right: 15px; top: 15px; background: #8ac926; color: white; text-decoration: none; padding: 2px 8px; font-weight: bold; border-radius: 4px; }
        .inner-box { background: #b54378; border-radius: 15px; padding: 20px; }
        label { display: block; margin-top: 10px; font-size: 14px; text-align: left; }
        input[type="text"], input[type="email"], input[type="password"], input[type="tel"] { width: 100%; padding: 10px; margin-top: 4px; border: none; border-radius: 20px; background: #fce4ec; box-sizing: border-box; }
        .terms { margin-top: 15px; font-size: 13px; text-align: center; }
        .btn-submit { display: block; width: 60%; margin: 15px auto 5px auto; padding: 10px; background: #fce4ec; color: #333; font-weight: bold; border: none; border-radius: 20px; cursor: pointer; }
        .login-link { display: block; text-align: center; color: white; font-size: 13px; margin-top: 10px; text-decoration: underline; }
    </style>
</head>
<body>

    <img src="{{ asset('img/logo.png') }}" class="logo" alt="Logo">

    <div class="card-container">
        <a href="{{ url('/login') }}" class="close-btn">X</a>
        <h2>REGÍSTRATE EN LOOK MÁGICO</h2>
        <p>Es rápido y fácil</p>

        <form action="{{ url('/registro') }}" method="POST" class="inner-box">
            @csrf
            <label>Nombre</label>
            <input type="text" name="name" required>

            <label>Apellido</label>
            <input type="text" name="apellido" required>

            <label>Correo</label>
            <input type="email" name="email" required>

            <label>Número de Celular</label>
            <input type="tel" name="telefono" required>

            <label>Contraseña</label>
            <input type="password" name="password" required>

            <label>Confirmar contraseña</label>
            <input type="password" name="password_confirmation" required>

            <div class="terms">
                <input type="checkbox" name="terms" required> Acepto los Términos y Condiciones
            </div>

            <button type="submit" class="btn-submit">REGISTRARME</button>
            <a href="{{ url('/login/cliente') }}" class="login-link">¿Ya tienes cuenta? Inicia Sesión</a>
        </form>
    </div>

</body>
</html>