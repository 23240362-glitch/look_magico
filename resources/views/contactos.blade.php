<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos - Look Mágico</title>
    <!-- Tipografías similares al diseño -->
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Íconos FontAwesome para WhatsApp, Mapa, Facebook e Instagram -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/contactos.css') }}">
</head>
<body>

    <!-- Encabezado superior -->
    <header class="header-contactos">
        <div class="header-left">
            <button class="menu-btn" aria-label="Menú">
                <i class="fa-solid fa-equals"></i>
            </button>
            <h1>C O N T A C T O S</h1>
        </div>
        <div class="header-logo">
            <!-- Asegúrate de colocar el logo de Look Mágico en public/img/logo.png -->
            <img src="{{ asset('img/logo.png') }}" alt="Look Mágico Logo">
        </div>
    </header>

    <!-- Contenedor Principal -->
    <main class="main-container">
        <h2 class="titulo-seccion">¡QUEREMOS SABER DE TI!</h2>

        <div class="grid-contacto">
            <!-- Columna Izquierda: Formulario -->
            <div class="card-morada form-container">
                <form action="#" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="input-group">
                        <input type="text" name="apellido" placeholder="Apellido" required>
                    </div>
                    <div class="input-group">
                        <input type="tel" name="telefono" placeholder="Número de Teléfono" required>
                    </div>
                    <div class="input-group select-wrapper">
                        <select name="asunto" required>
                            <option value="" disabled selected>Asunto</option>
                            <option value="cita">Agendar cita</option>
                            <option value="servicios">Información de servicios</option>
                            <option value="productos">Consulta de productos</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <textarea name="comentarios" rows="4" placeholder="Comentarios" required></textarea>
                    </div>
                    <button type="submit" class="btn-enviar">Enviar Mensaje</button>
                </form>
            </div>

            <!-- Columna Derecha: Tarjetas de Información y Redes -->
            <div class="info-column">
                
                <!-- Tarjeta 1: Ubicación -->
                <div class="card-morada info-card ubicacion-card">
                    <div class="info-text">
                        <p>Nos encontramos en</p>
                        <p><i class="fa-solid fa-location-dot pin-rojo"></i> Calle Guillermo Prieto #148</p>
                        <p>Colonia Centro 37000</p>
                    </div>
                    <a href="https://maps.google.com/?q=Calle+Guillermo+Prieto+148,+Centro,+37000+Leon,+Gto." target="_blank" class="icono-mapa" title="Ver en Google Maps">
                        <i class="fa-solid fa-location-dot"></i>
                    </a>
                </div>

                <!-- Tarjeta 2: Atención a Cliente / WhatsApp -->
                <div class="card-morada info-card whatsapp-card">
                    <p class="card-titulo">Atención a Cliente</p>
                    <p class="telefono-texto">Teléfono : 477 123 4567</p>
                    <a href="https://wa.me/524771234567" target="_blank" class="whatsapp-link">
                        <span class="icono-wa"><i class="fa-brands fa-whatsapp"></i></span>
                        <span>Enviar WhatsApp</span>
                    </a>
                </div>

                <!-- Fila inferior: Horarios + Redes Sociales -->
                <div class="bottom-row">
                    <div class="card-morada info-card horarios-card">
                        <p class="card-titulo"><i class="fa-regular fa-clock reloj-rojo"></i> Horarios de Atención</p>
                        <p>Lunes a Viernes: 09:00 AM – 08:00 PM</p>
                        <p>Sábados: 09:00 AM – 06:00 PM</p>
                        <p>Domingos: Cerrado</p>
                    </div>

                    <div class="redes-sociales">
                        <p>Síguenos en :</p>
                        <div class="redes-iconos">
                            <a href="https://facebook.com" target="_blank" class="btn-social fb" aria-label="Facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href="https://instagram.com" target="_blank" class="btn-social ig" aria-label="Instagram">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>
</html>