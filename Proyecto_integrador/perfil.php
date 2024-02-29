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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/perfil.css">
    <link rel="stylesheet" href="vendor/fullcalendar/main.css">
    <link rel="stylesheet" href="src/css/calendar.css">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core/locales/es.js'></script>
    <script src="./js/calendario.js"></script>



</head>

<body class="perfil">
    <header class="header">

        <a href="index.php"><img class="logo" src="img/logo2.png" alt="" class="logo"></a>
        <a href="index.php"><img class="nombre" src="img/nombre.png" alt="" class="logo"></a>
        <nav>
            
            
            <ul class="menu">
                <li class="dropdown">
                    <a href="QuienesSomos.php" class="dropbtn">¿Quiénes somos?</a>
                    <div class="dropdown-content">
                        <a href="QuienesSomos.php#quienesSomos">Nosotros</a>
                        <a href="QuienesSomos.php#psicologos">Profesionales</a>
                        <a href="QuienesSomos.php#preguntasRespuestas">Ayuda</a>
                        <a href="QuienesSomos.php#contacto">Contáctanos</a>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="recursosGratuitos.php" class="dropbtn">Recursos gratuitos</a>
                    <div class="dropdown-content">
                        <a href="recursosGratuitos.php#podcast">Podcast</a>
                        <a href="recursosGratuitos.php#librosAutoayuda">Libros autoayuda</a>
                        <a href="recursosGratuitos.php#videos">Videos mindfulness</a>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="servicios.php" class="dropbtn">Servicios</a>
                    <div class="dropdown-content">
                        <a href="servicios.php#citaPsicologica">Terapia psicológica</a>
                        <a href="servicios.php#talleres">Talleres</a>
                        <a href="servicios.php#cursos">Cursos</a>
                        <a href="servicios.php#asistencia">Asistencia a domicilio</a>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="retiros.php" class="dropbtn">Retiros</a>
                    <div class="dropdown-content">
                        <a href="retiros.php#retiros">Retiros</a>
                        <a href="retiros.php#preguntasRespuestas">Preguntas retiros</a>
                    </div>
                </li>
                <?php if ($sesionActiva): ?>
                <li class="dropdown">
                    <a href="perfil.php" class="dropbtn">Perfil</a>
                    <div class="dropdown-content">
                        <a href="perfil.php#perfil">Mi perfil</a>
                        <a href="perfil.php#calendario">Calendario</a>
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
                <form class="formEditarPerfil" method="post" action="procesar_editarPerfil.php">
                    <div class="form-group">
                        <label for="nombre_pacientes">Nombre</label>
                        <input type="text" id="nombre_pacientes" name="nombre_pacientes" placeholder="Nombre"
                            value="<?php echo htmlspecialchars($paciente['nombre_pacientes']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="apellidos_pacientes">Apellidos</label>
                        <input type="text" id="apellidos_pacientes" name="apellidos_pacientes" placeholder="Apellidos"
                            value="<?php echo htmlspecialchars($paciente['apellidos_pacientes']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="mail_pacientes">Email</label>
                        <input type="email" id="mail_pacientes" name="mail_pacientes" placeholder="Correo electrónico"
                            value="<?php echo htmlspecialchars($paciente['mail_pacientes']); ?>" required>
                    </div>

                    <div class="form-group-bajo">
                        <label for="telefono_pacientes">Teléfono</label>
                        <input type="tel" id="telefono_pacientes" name="telefono_paciente" placeholder="Teléfono"
                            value="<?php echo htmlspecialchars($paciente['telefono_paciente']); ?>">
                    </div>

                    <div class="form-group-bajo">
                        <label for="fechaNacimiento">Fecha de nacimiento</label>
                        <input type="date" id="fechaNacimiento" name="fechaNacimiento" placeholder="Fecha de nacimiento"
                            value="<?php echo htmlspecialchars($paciente['fecha_nacimiento']); ?>">
                    </div>

                    <div class="form-group-bajo">
                        <label for="genero">Género</label>
                        <input type="text" id="genero" name="genero" placeholder="Género"
                            value="<?php echo htmlspecialchars($paciente['genero']); ?>">
                    </div>

                    
                    <button type="submit">Guardar cambios</button>
                </form>

            </div>
        </div>
        <div class="calendario" id="calendar">

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
                <h3>Nosotros</h3>
                <a href="QuienesSomos.php#quienesSomos">Nosotros</a>
                <a href="QuienesSomos.php#psicologos">Profesionales</a>
                <a href="QuienesSomos.php#preguntasRespuestas">Ayuda</a>
                <a href="QuienesSomos.php#contacto">Contáctanos</a>
            </div>
            <div class="footer-section">
                <h3>Servicios</h3>
                <a href="servicios.php#citaPsicologica">Terapia psicológica</a>
                <a href="servicios.php#talleres">Talleres</a>
                <a href="servicios.php#cursos">Cursos</a>
                <a href="servicios.php#asistencia">Asistencia a domicilio</a>
            </div>
            <div class="footer-section">
                <h3>Mi cuenta</h3>
                <a href="perfil.php#perfil">Mi perfil</a>
                <a href="perfil.php#calendario">Calendario</a>
            </div>
            <div class="footer-section">
                <h3>Recursos gratuitos</h3>
                <a href="recursosGratuitos.php#podcast">Podcast</a>
                <a href="recursosGratuitos.php#librosAutoayuda">Libros autoayuda</a>
                <a href="recursosGratuitos.php#videos">Tutoriales mindfulness</a>
            </div>
            <div class="footer-section">
                <h3>Retiros</h3>
                <a href="retiros.php#retiros">Retiros</a>
                <a href="retiros.php#preguntasRespuestas">Preguntas retiros</a>
            </div>

        </div>
        <div class="footer-branding">
            <p class="nombre_footer">Equilibria</p>
            <p>&copy; 2024 Equilibria. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script src='./js/cambiarPerfil.js'></script>
    <script src='./js/validar_inicioSesion.js'></script>
    <script src='./js/validar_contacto.js'></script>
    <script src='./js/faq.js'></script>

</body>

</html>