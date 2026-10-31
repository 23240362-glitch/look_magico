<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Mágico - Elige tu Usuario</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Arial Rounded MT Bold', 'Segoe UI', sans-serif; }
        body { background-color: #FAF0E6; color: #333; }

        header { background-color: #9C5174; color: white; height: 60px; display: flex; align-items: center; justify-content: center; position: relative; }
        .title-header { font-size: 20px; letter-spacing: 2px; font-weight: bold; }

        .logo-badge { position: absolute; left: 20px; top: 10px; width: 85px; height: 85px; background: white; border-radius: 18px; border: 2px solid #FFD1DC; display: flex; align-items: center; justify-content: center; z-index: 10; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .logo-badge img { width: 100%; height: auto; border-radius: 15px; }

        .role-container { max-width: 800px; margin: 40px auto; text-align: center; padding: 0 20px; }
        .title-choose { color: #9C5174; font-size: 24px; letter-spacing: 3px; margin-bottom: 40px; text-transform: uppercase; }

        .roles-grid { display: flex; justify-content: center; gap: 50px; flex-wrap: wrap; }
        .role-card { text-align: center; width: 260px; text-decoration: none; color: inherit; }

        .circle-avatar { width: 220px; height: 220px; border-radius: 50%; border: 6px solid #A27BEE; background-color: white; margin: 0 auto 20px auto; display: flex; align-items: center; justify-content: center; overflow: hidden; position: relative; }
        .circle-avatar img { width: 85%; height: auto; }

        .btn-role-pink { background-color: #FFC0CB; color: black; border: none; padding: 12px 30px; border-radius: 25px; font-weight: bold; font-size: 15px; text-decoration: underline; display: block; width: 100%; }
        .btn-role-pink:hover { background-color: #f7b6c6; }
    </style>
</head>
<body>

    <header>
        <div class="logo-badge">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" onerror="this.src='https://via.placeholder.com/80?text=Look+Magico'">
        </div>
        <div class="title-header">LOOK MAGICO</div>
    </header>

    <div class="role-container">
        <h2 class="title-choose">ELIGE TU USUARIO</h2>

        <div class="roles-grid">
            <!-- Opción Clienta -->
            <a href="{{ route('login.cliente') }}" class="role-card">
                <div class="circle-avatar">
                    <img src="{{ asset('images/clienta-avatar.png') }}" alt="Soy Clienta" onerror="this.src='https://via.placeholder.com/180?text=Clienta'">
                </div>
                <button class="btn-role-pink">Soy clienta</button>
            </a>

            <!-- Opción Administradora -->
            <a href="{{ route('login.admin') }}" class="role-card">
                <div class="circle-avatar">
                    <img src="{{ asset('images/admin-avatar.png') }}" alt="Soy Administradora" onerror="this.src='https://via.placeholder.com/180?text=Admin'">
                </div>
                <button class="btn-role-pink">Soy administradora</button>
            </a>
        </div>
    </div>

</body>
</html>