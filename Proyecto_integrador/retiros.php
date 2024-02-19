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
             <div class="subrayado2">
                <h3>Nuestros retiros</h3>
             </div>

             <div class="tarjetasRetiros">
                <div class="retiros">
                    <img src="img/retiroVerano.jpg">
                    <h3>Retiro verano</h3>
                    <p>Escapa de la rutina y redescubre tu bienestar en nuestro Retiro de Verano al Aire Libre.
                         Este refugio único en medio de la naturaleza ofrece un programa especializado para mejorar tu salud mental,
                          combinando la serenidad del entorno natural con actividades que nutren el alma. Desde yoga al amanecer hasta meditación al atardecer,
                           cada momento está diseñado para fomentar la paz interior y la atención plena.
                            Bajo la guía de expertos en bienestar, explorarás técnicas de mindfulness y participarás en talleres 
                            que promueven el equilibrio emocional y mental. Las caminatas por la naturaleza, los baños en aguas frescas
                             y los momentos de reflexión personal se combinan para ofrecerte una experiencia profundamente revitalizante.
                    </p>
                    <div class="detalles-retiros">
                    <div class="price-container">
                    <span >🛒 Precio: 80€</span>
                    </div>
                    <button type="button" name="VolverIndex" onclick="window.location.href='reservaEvento.php';">¡Apúntate!</button>
                 </div>
                   
                    </div>
                </div>

 <!-- RETIRO INVIERNO -->

             <div class="tarjetasRetiros">
                <div class="retiros">
                    <img src="img/retiroInvierno.jpg">
                    <h3>Retiro invierno</h3>
                    <p>
                    Sumérgete en la magia del invierno y redescubre tu paz interior en nuestro exclusivo Retiro de Invierno,
                     un santuario lejos del ajetreo de la vida cotidiana. En el corazón de un paisaje invernal sereno,
                      te ofrecemos una experiencia única diseñada para nutrir tu bienestar mental y emocional.
                       Este retiro es una invitación a abrazar la tranquilidad del invierno, 
                       permitiéndote reconectar con tu esencia en un entorno de belleza nevada.
                    Nuestro programa está meticulosamente planeado para incluir actividades que calientan el cuerpo y el alma,
                     desde sesiones de yoga frente a la chimenea hasta meditaciones guiadas que reflejan la quietud del paisaje invernal.
                      Cada momento está pensado para promover una sensación de paz y bienestar, 
                      ayudándote a cultivar la atención plena y la serenidad en medio de la majestuosa naturaleza invernal.
                    </p>
                    <div class="detalles-retiros">
                    <span>🛒 Precio: 80€</span>
                    <button type="button" name="VolverIndex" onclick="window.location.href='reservaEvento.php';">¡Apúntate!</button>
                 </div>
                   
                    </div>
                </div>
 <!-- PREGUNTAS SOBRE RETIROS -->

                <div class="faq-container" id="preguntasRespuestas">
            <h1 class="faq-title">Preguntas frecuentes sobre los retiros</h1>

            <div class="faq-item">
                <h2 class="faq-question">¿Qué está incluido en el precio del retiro?
                     <span class="faq-icon">▶</span></h2>
                <div class="faq-answer">
                    <p> El precio generalmente incluye alojamiento, todas las comidas (desayuno, almuerzo y cena), 
                        acceso a todas las actividades programadas (yoga, meditación, talleres de mindfulness, etc.), y el uso de las instalaciones del retiro. Cualquier servicio o actividad extra será especificado en la descripción del paquete.</p>
                </div>
            </div>

            <div class="faq-item">
                <h2 class="faq-question">¿Qué debo llevar al retiro? <span
                        class="faq-icon">▶</span>
                </h2>
                <div class="faq-answer">
                    <p>Recomendamos traer ropa cómoda para las actividades de yoga y meditación, ropa adecuada para el clima, artículos personales, una botella de agua reutilizable, y cualquier medicamento o necesidad personal específica. Te enviaremos una lista de empaque detallada una vez que hayas confirmado tu reserva.</p>
                </div>
            </div>

            <div class="faq-item">
                <h2 class="faq-question">¿Puedo asistir al retiro solo/a? <span
                        class="faq-icon">▶</span>
                </h2>
                <div class="faq-answer">
                    <p>Absolutamente, muchos de nuestros huéspedes asisten solos. Es una excelente oportunidad para conocer a nuevas personas con intereses similares en un ambiente seguro y acoge</p>
                </div>
            </div>

            <div class="faq-item">
                <h2 class="faq-question">¿Necesito tener experiencia previa en yoga o meditación para asistir? <span class="faq-icon">▶</span>
                </h2>
                <div class="faq-answer">
                    <p> No, nuestros retiros están diseñados para acoger tanto a principiantes como a practicantes avanzados. Ofrecemos instrucciones y adaptaciones para asegurar que todos puedan participar cómodamente.</p>
                </div>
            </div>
        

        <div class="faq-item">
                <h2 class="faq-question">¿Qué tipo de alojamiento se ofrece? <span class="faq-icon">▶</span>
                </h2>
                <div class="faq-answer">
                    <p> Ofrecemos una variedad de opciones de alojamiento que van desde habitaciones compartidas hasta suites privadas. Las descripciones detalladas y fotos de las opciones de alojamiento están disponibles bajo petición.</p>
                </div>
            </div>
        

        <div class="faq-item">
                <h2 class="faq-question">¿Hay tiempo libre para explorar el área circundante? <span class="faq-icon">▶</span>
                </h2>
                <div class="faq-answer">
                    <p>Sí, aunque nuestro programa es completo y diseñado para ofrecerte una experiencia profundamente revitalizante, también entendemos la importancia del tiempo personal. Programamos tiempo libre cada día para que puedas explorar los alrededores, relajarte en las instalaciones del retiro o disfrutar de actividades opcionales adicionales, según tus intereses.</p>
                </div>
            </div>
       

        <div class="faq-item">
                <h2 class="faq-question">¿Es este retiro adecuado para todos los niveles de fitness? <span
                        class="faq-icon">▶</span>
                </h2>
                <div class="faq-answer">
                    <p>Nuestros retiros están diseñados para acomodar a personas de todos los niveles de fitness. Las actividades físicas como el yoga y las caminatas se adaptan para diferentes niveles de habilidad. Si tienes preocupaciones específicas sobre tu condición física o limitaciones, por favor comunícate con nosotros antes de reservar para discutir cómo podemos satisfacer tus necesidades.</p>
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