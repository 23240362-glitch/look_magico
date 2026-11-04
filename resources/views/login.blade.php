<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Acceso Cliente</title>
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

        header .register-link {
            color: white;
            font-size: 14px;
            font-weight: bold;
            text-decoration: underline;
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
            font-size: 24px; 
            letter-spacing: 2px; 
            margin-bottom: 25px; 
            text-transform: uppercase;
        }

        /* Formulario y campos */
        .form-group { 
            margin-bottom: 15px; 
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
        
        .eye-icon { 
            position: absolute; 
            right: 15px; 
            top: 50%; 
            transform: translateY(-50%); 
            font-size: 18px; 
            cursor: pointer; 
        }

        .forgot-link { 
            display: block; 
            color: #9C5174; 
            font-size: 13px; 
            font-weight: bold; 
            text-decoration: underline; 
            margin: 15px 0 20px 0; 
            text-transform: uppercase; 
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
        }
    </style>
</head>
<body>

    <!-- Encabezado superior -->
    <header>
        <div class="logo-box">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Look Mágico" onerror="this.src='https://via.placeholder.com/60?text=Logo'">
        </div>
        <h1 class="title-header">LOOK MAGICO - INICIO CLIENTE</h1>
        <a href="{{ url('/registro') }}" class="register-link">¡Crear Cuenta 👄</a>
    </header>

    <!-- Contenido principal -->
    <main>
        <section>
            <h2 class="title-bienvenida">HOLA BELLEZA</h2>

        @if($errors->any())
            <p style="color: red; font-size: 13px; font-weight: bold; margin-bottom: 15px;">
                {{ $errors->first() }}
            </p>
        @endif
        
            <form action="{{ route('login.cliente.post') }}" method="POST">
                @csrf
                
                <!-- Campo Usuario / Correo -->
                <div class="form-group">
                    <label for="email">Usuario</label>
                    <div class="input-purple-container">
                        <input type="email" id="email" name="email" class="input-purple" placeholder="PILYCARMONA@GMAIL.COM" required>
                    </div>
                </div>

                <!-- Campo Contraseña -->
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <div class="input-purple-container">
                        <input type="password" id="password" name="password" class="input-purple" placeholder="••••••••" required>
                        <!-- Se agrega onclick para activar la función Javascript -->
                        <span class="eye-icon" onclick="togglePassword('password', this)">👁️</span>
                    </div>
                </div>

                <!-- Enlace a recuperación de contraseña -->
                <a href="{{ route('password.request') }}" class="forgot-link">¿OLVIDASTE TU CONTRASEÑA?</a>

                <!-- Botón de envío -->
                <button type="submit" class="btn-submit-pink">INICIAR SESIÓN</button>
            </form>
        </section>
    </main>

    <!-- Script dentro del body para alternar visibilidad -->
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