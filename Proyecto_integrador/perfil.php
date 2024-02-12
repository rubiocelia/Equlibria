<?php
// Conexion a BBDD
require_once("conecta.php");
$conexion = getConexion();
// Contectar con la sesion
session_start();
// Funcion para recuperar los datos del paciente
function obtenerDatosPaciente($idPaciente) {
    $conexion = getConexion();
    // Consulta para obtener la información del usuario por ID
    $sql = "SELECT * FROM pacientes WHERE id_pacientes = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idPaciente);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $paciente = $resultado->fetch_assoc();
    $conexion->close();
    return $paciente;
}

// Variables de control
$sesionActiva=false;
$idPacienteLogin=null;
$paciente=null;
// Validamos que la sesión este iniciada
if (isset($_SESSION['idPacienteLogin'])){
    // Como esta se sesion iniciada recuperamos el idPacienteLogin
    $idPacienteLogin= $_SESSION['idPacienteLogin'];
    $sesionActiva=true;
    $paciente=obtenerDatosPaciente($idPacienteLogin);
} else {
    header("Location: inicio_sesion.php");
    exit();
}

// No olvides cerrar la conexión
mysqli_close($conexion);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="vendor/fullcalendar/main.css">
    <link rel="stylesheet" href="src/css/calendar.css">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core/locales/es.js'></script>
    <script src='cambiarPerfil.js'></script>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es', // Establecer el idioma del calendario a español
                firstDay: 1,
                initialView: 'dayGridMonth',
                events: './server/citasCalendario.php', // URL del endpoint que devuelve los eventos en JSON
                eventColor: '#92AAB3',
                eventClick: function (info) {
                    // Crear y mostrar un desplegable con la información del evento en español
                    var details = `
                <div class="event-details">
                <p>ID: ${info.event.id}</p>
                <p>Especialista: ${info.event.title}</p>
                <p>Fecha: ${info.event.start.toLocaleString('es')}</p>
                </div>
            `;
                    // Asegúrate de que solo se muestre un desplegable a la vez
                    var existingDetails = document.querySelector('.event-details');
                    if (existingDetails) {
                        existingDetails.parentNode.removeChild(existingDetails);
                    }
                    // Insertar el nuevo desplegable
                    document.body.insertAdjacentHTML('beforeend', details);
                }
            });
            calendar.render();
        });
    </script>


</head>

<body class="perfil">
    <header class="header">
        <a href="index.php"><img class="logo" src="img/logo2.png" alt="" class="logo"></a>
        <a href="index.php"><img class="nombre" src="img/nombre.png" alt="" class="logo"></a>
        <nav>
        <ul class="menu">
                <li class="dropdown">
                    <a href="QuienesSomos.html" class="dropbtn">¿Quiénes somos?</a>
                    <div class="dropdown-content">
                        <a href="#">Nosotros</a>
                        <a href="#">Profesionales</a>
                        <a href="#">Contáctanos</a>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="recursosGratuitos.html" class="dropbtn">Recursos gratuitos</a>
                    <div class="dropdown-content">
                        <a href="#">Podcast</a>
                        <a href="#">Libros autoayuda</a>
                        <a href="#">Videos mindfulness</a>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="servicios.php" class="dropbtn">Servicios</a>
                    <div class="dropdown-content">
                        <a href="#">Terapia psicológica</a>
                        <a href="#">Talleres</a>
                        <a href="#">Cursos</a>
                        <a href="#">Asistencia a domicilio</a>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="retiros.php" class="dropbtn">Retiros</a>
                    <div class="dropdown-content">
                        <a href="#">Retiro de verano</a>
                        <a href="#">Retiro de invierno</a>
                    </div>
                </li>
                <?php if ($sesionActiva): ?>
                    <li class="dropdown">
                        <a href="perfil.php" class="dropbtn">Perfil</a>
                        <div class="dropdown-content">
                            <a href="perfil.php">Mi perfil</a>
                            <a href="#">Calendario</a>
                            <a href="#">Ayuda</a>
                            <a href="#">Eliminar cuenta</a>
                            <a href="cerrarSesion.php">Cerrar sesión</a>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if (!$sesionActiva): ?>
                    <li class="iniciarSesion"><a href="inicio_sesion.php">Iniciar sesión</a></li>
                    <li class="registro"><a href="registrarse.php">Registrase</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
        
        <div id="perfil" class="Parteperfil">
            <div class="subrayadoFormulario">
                <h3>Cambiar perfil</h3>
            </div>
            <div class="editarPerfil">
                <!-- <div class="fotoPerfil">
                    <img src="ruta/a/imagen/default.png" alt="Foto de perfil" id="profilePic">
                    <label for="profileInput" class="cambiarFoto">
                        Cambiar foto
                    </label>
                    <input type="file" id="profileInput" name="profile_picture" accept="image/*">
                </div> -->
                <form class="formEditarPerfil" method="post" action="procesar_editarPerfil.php">
                    <div class="form-group">
                        <label for="nombre_pacientes">Nombre</label>
                        <input type="text" id="nombre_pacientes" name="nombre_pacientes" placeholder="Nombre" value="<?php echo htmlspecialchars($paciente['nombre_pacientes']); ?>">
                    </div>

                    <div class="form-group">
                    <label for="apellidos_pacientes">Apellidos</label>
                        <input type="text" id="apellidos_pacientes" name="apellidos_pacientes" placeholder="Apellidos" value="<?php echo htmlspecialchars($paciente['apellidos_pacientes']); ?>">
                    </div>

                    <div class="form-group">
                        <label for="mail_pacientes">Email</label>
                        <input type="email" id="mail_pacientes" name="mail_pacientes" placeholder="Correo electrónico" value="<?php echo htmlspecialchars($paciente['mail_pacientes']); ?>">
                    </div>

                    <div class="form-group-bajo">
                        <label for="telefono_pacientes">Teléfono</label>
                        <input type="tel" id="telefono_pacientes" name="telefono_paciente" placeholder="Teléfono" value="<?php echo htmlspecialchars($paciente['telefono_paciente']); ?>">
                    </div>

                    <div class="form-group-bajo">
                        <label for="DNI">DNI</label>
                        <input type="text" id="DNI" name="DNI" placeholder="DNI" value="<?php echo htmlspecialchars($paciente['DNI']); ?>">
                    </div>

                    <div class="form-group-bajo">
                    <label for="fechaNacimiento">Fecha de nacimiento</label>
                        <input type="date" id="fechaNacimiento" name="fechaNacimiento" placeholder="Fecha de nacimiento" value="<?php echo htmlspecialchars($paciente['fecha_nacimiento']); ?>">
                    </div>

                    <div class="form-group-bajo">
                    <label for="genero">Género</label>
                        <input type="text" id="genero" name="genero" placeholder="Género" value="<?php echo htmlspecialchars($paciente['genero']); ?>">
                    </div>

                    <div class="form-group-bajo">
                    <label for="usario_pacientes">Usuario</label>
                        <input type="text" id="usario_pacientes" name="usario_pacientes" placeholder="Usuario" value="<?php echo htmlspecialchars($paciente['usuario_pacientes']); ?>">
                    </div>

                    <div class="form-group-bajo">
                        <label for="contrasena_pacientes">Contraseña</label>
                        <input type="password" id="contrasena_pacientes" name="contrasena_pacientes" placeholder="Contraseña"value="<?php echo htmlspecialchars($paciente['contrasena_pacientes']); ?>">
                        <span onclick="togglePasswordVisibility()">
                            <i class="eye-icon">🙉</i>
                        </span>
                    </div>
                    <button type="submit">Guardar cambios</button>
                </form>

            </div>
        </div>
        <div class="calendario" id="calendar">

        </div>

        <div class="faq-container" id="preguntasRespuestas">
            <h1 class="faq-title">Preguntas frecuentes</h1>

            <div class="faq-item">
                <h2 class="faq-question">¿Necesito tener experiencia previa en técnicas de manejo de ansiedad para
                    inscribirme en los cursos? <span class="faq-icon">▶</span></h2>
                <div class="faq-answer">
                    <p> No es necesaria ninguna experiencia previa. Nuestros cursos están diseñados para ser accesibles
                        para principiantes y también ofrecen valor a aquellos con experiencia previa en manejo de
                        ansiedad.</p>
                </div>
            </div>

            <div class="faq-item">
                <h2 class="faq-question">¿Los cursos están dirigidos por profesionales cualificados? <span
                        class="faq-icon">▶</span>
                </h2>
                <div class="faq-answer">
                    <p>Todos nuestros cursos son impartidos por profesionales con formación especializada en terapias de
                        ansiedad y técnicas de manejo del estrés. Contamos con un equipo de psicólogos, terapeutas y
                        maestros de mindfulness.</p>
                </div>
            </div>

            <div class="faq-item">
                <h2 class="faq-question">¿En qué consisten los retiros de verano e invierno para la ansiedad? <span
                        class="faq-icon">▶</span>
                </h2>
                <div class="faq-answer">
                    <p>Nuestros retiros de verano e invierno son experiencias inmersivas de una semana diseñadas para
                        proporcionar un escape tranquilo y restaurador del estrés diario. Incluyen talleres, sesiones de
                        terapia en grupo e individual, meditación guiada, actividades al aire libre y tiempo para la
                        reflexión personal, todo en un entorno sereno y natural.</p>
                </div>
            </div>

            <div class="faq-item">
                <h2 class="faq-question">¿Qué libros recomiendan para entender mejor la ansiedad y cómo puedo
                    adquirirlos? <span class="faq-icon">▶</span>
                </h2>
                <div class="faq-answer">
                    <p> Contamos con una selección curada de libros que ofrecen valiosas perspectivas y estrategias para
                        manejar la ansiedad. Puedes encontrarlos en Amazon a través de los enlaces proporcionados en
                        nuestra página de recursos. Desde manuales prácticos hasta relatos personales inspiradores,
                        tenemos opciones para diferentes gustos y necesidades.</p>
                </div>
            </div>
        </div>

        <div class="contacto" id="contacto">
            <div class="subrayadoFormulario">
                <h3>Contáctanos</h3>
            </div>
            <form class="formInicioSesion" method="post" action="" onsubmit="return validarFormularioContacto()">
                <label for="nombreContacto">Nombre:</label>
                <input type="text" id="nombreContacto" name="nombreContacto">

                <br><br>

                <label for="apellidosContacto">Apellidos:</label>
                <input type="text" id="apellidosContacto" name="apellidosContacto">

                <br><br>

                <label for="mailContacto">E-mail:</label>
                <input type="email" id="mailContacto" name="mailContacto">

                <br><br>

                <label for="cuentanos">Cuéntanos tu problema:</label>
                <textarea name="cuentanos" id="cuentanos"></textarea>

                <br><br>

                <button type="submit">Enviar tu información</button>
            </form>
        </div>

    </main>
    <footer>
        <div class="redesSociales">
            <a href="https://www.facebook.com/" target="_blank"><img src="img/facebook.png" alt="Facebook"></a>
            <a href="https://twitter.com/" target="_blank"><img src="img/twitter.png" alt="Twitter"></a>
            <a href="https://www.instagram.com/" target="_blank"><img src="img/instagram.png" alt="Instagram"></a>
            <a href="https://www.tiktok.com/" target="_blank"><img src="img/tik-tok.png" alt="tiktok"></a>
        </div>

        <div class="footer-container">
            <div class="footer-section">
                <h3>Cursos</h3>
                <a href="#">Curso para parejas</a>
                <a href="#">Inteligencia emocional</a>
                <a href="#">Curso autoestima</a>
                <a href="#">Dependencia emocional</a>
                <a href="#">Ansiedad online</a>
            </div>
            <div class="footer-section">
                <h3>Recursos gratuitos</h3>
                <a href="#">Podcast</a>
                <a href="#">Libros autoayuda</a>
                <a href="#">Tutoriales mindfulness</a>
            </div>
            <div class="footer-section">
                <h3>Mi cuenta</h3>
                <a href="#">Calendario</a>
                <a href="#">Mi perfil</a>
                <a href="#">Ayuda</a>
                <a href="#">Eliminar cuenta</a>
            </div>
            <div class="footer-section">
                <h3>Taller</h3>
                <a href="#">Autoestima</a>
                <a href="#">Mejora tus habilidades sociales</a>
                <a href="#">Autoexigencia</a>
                <a href="#">Gestión de la ansiedad</a>
            </div>
            <div class="footer-section">
                <h3>Nosotros</h3>
                <a href="#">Profesionales</a>
                <a href="#">Opiniones</a>
                <a href="#">Contáctanos</a>
                <a href="#">¿Quiénes somos?</a>
            </div>
        </div>
        <div class="footer-branding">
            <p class="nombre_footer">Equilibria</p>
            <p>&copy; 2024 Equilibria. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script src='cambiarPerfil.js'></script>
    <script src='validar_inicioSesion.js'></script>
    <script src='validar_contacto.js'></script>
    <script src='faq.js'></script>

</body>

</html>
