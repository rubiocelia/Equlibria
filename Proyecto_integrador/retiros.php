<?php
require_once("conecta.php");
$conexion = getConexion();
// Conectamos a la sesion
session_start();
// Variables para controlar el formulario
$sesionActiva=false;
$idPacienteLogin=null;
// Validamos que la sesión este iniciada
if (isset($_SESSION['idPacienteLogin'])){
    // Como esta se sesion iniciada recuperamos el idPacienteLogin
    $idPacienteLogin= $_SESSION['idPacienteLogin'];
    $sesionActiva=true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/retiros.css">
    <title>Retiros</title>
</head>

<body>
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


    <!-- RETIRO VERANO -->
             <div class="subrayado">
                <h3>Nuestros retiros</h3>
             </div>

             <div class="talleresServicios">
                <div class="tallerServicios">
                    <img src="img/retiroVerano.jpg">
                    <h3>Retiro verano</h3>
                    <p>Desconéctate de la rutina y reconéctate contigo mismo en nuestro exclusivo Retiro de Verano al Aire Libre.
                         Sumérgete en la serenidad de la naturaleza y disfruta de un programa diseñado para enriquecer tu salud mental.
                          Con actividades relajantes, talleres de mindfulness y el apoyo de expertos en bienestar,
                           es el momento perfecto para revitalizar tu espíritu. ¡Espacios limitados para una experiencia transformadora!
                    </p>
                    <div class="course-details">
                    <span class="online-details">🛒 Precio: 80€</span>
                    <button type="button" name="VolverIndex" onclick="window.location.href='reservaEvento.php';">¡Apúntate!</button>
                 </div>
                   
                    </div>
                </div>

 <!-- RETIRO INVIERNO -->

             <div class="talleresServicios">
                <div class="tallerServicios">
                    <img src="img/retiroInvierno.jpg">
                    <h3>Retiro invierno</h3>
                    <p>Desconéctate de la rutina y reconéctate contigo mismo en nuestro exclusivo Retiro de Verano al Aire Libre.
                         Sumérgete en la serenidad de la naturaleza y disfruta de un programa diseñado para enriquecer tu salud mental.
                          Con actividades relajantes, talleres de mindfulness y el apoyo de expertos en bienestar,
                           es el momento perfecto para revitalizar tu espíritu. ¡Espacios limitados para una experiencia transformadora!
                    </p>
                    <div class="course-details">
                    <span class="online-details">🛒 Precio: 80€</span>
                    <button type="button" name="VolverIndex" onclick="window.location.href='reservaEvento.php';">¡Apúntate!</button>
                 </div>
                   
                    </div>
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
</body>