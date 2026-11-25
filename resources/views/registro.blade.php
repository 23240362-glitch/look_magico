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
        }

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

        header .login-link {
            color: white;
            font-size: 14px;
            font-weight: bold;
            text-decoration: underline;
        }

        main {
            flex: 1;
            max-width: 420px;
            margin: 30px auto;
            text-align: center;
            padding: 0 20px;
            width: 100%;
        }

        .title-bienvenida {
            color: #9C5174;
            font-size: 22px;
            letter-spacing: 2px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .form-group {
            margin-bottom: 12px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 11px;
            letter-spacing: 1px;
            color: #333;
            font-weight: bold;
            margin-bottom: 4px;
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
            padding: 10px 18px;
            border-radius: 25px;
            font-size: 13px;
            font-weight: bold;
            outline: none;
        }

        .eye-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
            cursor: pointer;
        }

        .btn-submit-pink {
            background-color: #FFC0CB;
            color: black;
            border: none;
            padding: 10px 35px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 14px;
            text-decoration: underline;
            cursor: pointer;
            margin-top: 15px;
        }

        .btn-submit-pink:hover {
            background-color: #f7b6c6;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: left;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Look Mágico" onerror="this.src='https://via.placeholder.com/60?text=Logo'">
        </div>
        <h1 class="title-header">LOOK MÁGICO - CREAR CUENTA</h1>
        <a href="{{ route('login.cliente') }}" class="login-link">Iniciar Sesión 🔑</a>
    </header>

    <main>
        <h2 class="title-bienvenida">REGÍSTRATE</h2>

        @if($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/registro') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="form-group">
                <label for="name">Nombre</label>
                <div class="input-purple-container">
                    <input type="text" id="name" name="name" class="input-purple" value="{{ old('name') }}" required>
                </div>
            </div>

            <!-- Apellido -->
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <div class="input-purple-container">
                    <input type="text" id="apellido" name="apellido" class="input-purple" value="{{ old('apellido') }}" required>
                </div>
            </div>

            <!-- Correo -->
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <div class="input-purple-container">
                    <input type="email" id="email" name="email" class="input-purple" value="{{ old('email') }}" required>
                </div>
            </div>

            <!-- Teléfono -->
            <div class="form-group">
                <label for="telefono">Teléfono (10 dígitos)</label>
                <div class="input-purple-container">
                    <input type="text" id="telefono" name="telefono" class="input-purple" value="{{ old('telefono') }}" maxlength="10" required>
                </div>
            </div>

            <!-- Contraseña -->
            <div class="form-group">
                <label for="password">Contraseña</label>
                <div class="input-purple-container">
                    <input type="password" id="password" name="password" class="input-purple" required>
                    <span class="eye-icon" onclick="togglePassword('password', this)">👁️</span>
                </div>
            </div>

            <!-- Confirmar Contraseña -->
            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <div class="input-purple-container">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="input-purple" required>
                    <span class="eye-icon" onclick="togglePassword('password_confirmation', this)">👁️</span>
                </div>
            </div>

            <button type="submit" class="btn-submit-pink">CREAR CUENTA</button>
        </form>
    </main>

    <script>
        function togglePassword(inputId, eyeIcon) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                eyeIcon.textContent = "🙈";
            } else {
                input.type = "password";
                eyeIcon.textContent = "👁️";
            }
        }
    </script>
</body>
</html>