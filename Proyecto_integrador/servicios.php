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
    <link rel="stylesheet" href="css/servicios.css">
    <title>Servicios</title>
</head>

<body class="bodyServicios">
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


<!--------TALLERES----- -->
    <div class="pgservicios">
            <h1>Nuestros profesionales te pueden ayudar</h1> <br> <br>
            <h2>Tu bienestar merece ser prioridad. <br>
                 La terapia puede ser el primer paso</h2>
            <button class="boton_servicios">¡Pide cita!</button>
        </div>
        
        <div>
            <div class="subrayado">
                <h3>Nuestros talleres</h3>
            </div>
            <div class="talleresServicios">
                <div class="tallerServicios">
                    <img src="img/taller1.png">
                    <h3>Autoestima</h3>
                    <p>Nuestro curso te enseñará a fortalecer tu autoestima para reducir la ansiedad y mejorar tu bienestar. 
                        Aprenderás a conocer mejor tu cuerpo y tus habilidades para potenciar tu confianza y alcanzar tus metas.
                        No solo eso, también profundizaremos en la conexión entre la autoestima y el autoconocimiento.
                        Exploraremos cómo conocer mejor tu cuerpo, tus habilidades y tus límites contribuye a fortalecer tu autoestima y te ayuda a desarrollar todo tu potencial.
                    </p>
                    <div class="price-button-container">
                    <span> Precio:80€</span>
                    <button>¡Resérvalo!</button>
                    </div>
                </div>

                <div class="tallerServicios">
                    <img src="img/taller2.png">
                    <h3>Mejora habilidades sociales</h3>
                    <p>En nuestro taller de habilidades sociales, nos sumergiremos en un viaje completo que abarca todas las áreas 
                        donde las habilidades sociales desempeñan un papel crucial en la vida cotidiana.
                        Exploraremos cómo estas habilidades impactan en nuestras interacciones personales, profesionales y en nuestra calidad de vida en general.
                    </p>
                    <span> Precio:80€</span>
                    <button>¡Resérvalo!</button>
                </div>

                <div class="tallerServicios">
                    <img src="img/taller3.png">
                    <h3>Gestión de la ansiedad</h3>
                    <p>En este taller, te invitamos a embarcarte en un viaje de autoexploración para comprender a fondo tu ansiedad
                    Además, nos sumergiremos en la importancia de escuchar activamente nuestra ansiedad, reconociendo los mensajes que puede estar tratando de comunicarnos sobre nuestras necesidades emocionales y mentales.
                     Aprenderás a transformar tu relación con la ansiedad, utilizando su energía para fomentar el crecimiento personal y el bienestar emocional.
                    </p>
                    <span> Precio:80€</span>
                    <button>¡Resérvalo!</button>
                </div>

                <div class="tallerServicios">
                    <img src="img/taller4.png">
                    <h3>Autoexigencia y perfeccionismo</h3>
                    <p>En este taller, nos sumergiremos en el complejo mundo de la autoexigencia, explorando sus raíces y aprendiendo a acompañarla de manera compasiva.
                         Profundizaremos en el origen de nuestra autoexigencia, explorando cómo se forma a lo largo de nuestras vidas y cómo puede impactar nuestra salud emocional y mental.
                    </p>
                    <span> Precio:80€</span>
                    <button>¡Resérvalo!</button>
                </div>
            </div>
        </div>

        <!--------CURSOS----- -->
        <div class="subrayado">
                <h3>Nuestros cursos</h3>
            </div>
       
        <div class="contenidoCursos">
            <div class="cursos">
            <div class="imagenCurso">
                <img src="img/autoestima.jpg" alt="">
            </div>
                <div class="tarjetaDescripcion">
                    <div class="card-titulo">
                        <h3>Curso de autoestima</h3>
                    </div>
                    <div class="textoTarjeta">
                        <p>
                        Un curso de autoestima se presenta como una experiencia transformadora,
                         cuyo objetivo primordial es fortalecer la confianza personal y fomentar la autovaloración entre sus participantes.
                          Este tipo de curso está meticulosamente diseñado para ofrecer un conjunto de herramientas prácticas y teóricas 
                          que permitan a los individuos enfrentar y superar sus inseguridades,
                           así como mejorar significativamente la relación que mantienen consigo mismos.
                        </p>
                    </div>
                <div class="course-details">
                    <span class="time-details">🕛 9 horas</span>
                    <span class="online-details">💻 Online</span>
                    <span class="online-details">🛒 Precio: 80€</span>
                 </div>
                    <div class="tarjeta-link">
                        <p>Impartido por: Javier </p>
                        <button>¡Resérvalo!</button>
                    </div>
                </div>
            </div>

            <div class="cursos">
            <div class="imagenCurso2">
                <img src="img/autoexigencia.jpg" alt="">
                </div>
                <div class="tarjetaDescripcion">
                    <div class="card-titulo">
                        <h3>Curso de dependencia emocional</h3>
                    </div>
                    <div class="textoTarjeta">
                        <p>Este curso sobre Dependencia Emocional está diseñado como un camino hacia la libertad personal,
                             ofreciendo a los participantes las herramientas y conocimientos necesarios para liberarse de patrones de comportamiento destructivos
                              y fomentar relaciones interpersonales más sanas y equilibradas. A través de la comprensión profunda de la autonomía emocional y el fortalecimiento de la autoestima,
                               los asistentes aprenderán a establecer límites saludables y a cultivar un sentido de individualidad que respeta la interdependencia emocional sin caer en la dependencia.
                        </p>
                    </div>
                <div class="course-details">
                    <span class="time-details">🕛 6 horas</span>
                    <span class="online-details">💻 Online</span>
                    <span class="online-details">🛒 Precio: 80€</span>
                 </div>
                    <div class="tarjeta-link">
                        <p>Impartido por: Juan </p>
                        <button>¡Resérvalo!</button>
                    </div>
                </div>
            </div>
            <div class="cursos">
            <div class="imagenCurso">
                <img src="img/ansiedad.jpg" alt="">
                </div>
                <div class="tarjetaDescripcion">
                <div class="card-titulo">
                    <h3>Curso ansiedad online</h3>
                </div>
                <div class="textoTarjeta">
                    <p>El curso de Ansiedad en línea está meticulosamente diseñado para ofrecerte una comprensión profunda de la ansiedad, 
                        permitiéndote identificar sus causas, reconocer sus síntomas y aplicar estrategias efectivas para su gestión,
                         todo esto desde la comodidad y privacidad de tu hogar. 
                         Este programa educativo te brinda un conjunto de herramientas prácticas y teóricas para controlar el estrés
                          y mejorar tu bienestar emocional, guiándote paso a paso en el camino hacia una vida más tranquila y satisfactoria.
                    </p>
                </div>
                <div class="course-details">
                    <span class="time-details">🕛 8 horas</span>
                    <span class="online-details">💻 Online</span>
                    <span class="online-details">🛒 Precio: 80€</span>
                 </div>
                <div class="tarjeta-link">
                    <p>Impartido por: Alejandro </p>
                    <button>¡Resérvalo!</button>
                </div>
            </div>
            </div>
            <div class="cursos">
            <div class="imagenCurso2">
                <img src="img/autoexigencia.jpg" alt="">
                </div>
                <div class="tarjetaDescripcion">
                    <div class="card-titulo">
                        <h3>Curso para parejas</h3>
                    </div>
                    <div class="textoTarjeta">
                        <p>
                            Nuestro curso para parejas está diseñado como una experiencia enriquecedora y transformadora,
                             ideal para aquellos que buscan fortalecer su conexión y mejorar la comunicación dentro de su relación.
                              Este programa ofrece una oportunidad única para profundizar en el entendimiento mutuo 
                              y descubrir nuevas formas de interactuar que promuevan una base sólida y duradera para la pareja. 
                              A través de un enfoque práctico y empático, aprenderás herramientas efectivas y estrategias probadas 
                              para superar los desafíos comunes en las relaciones, fomentando un vínculo más fuerte y saludable entre ambos.
                        </p>
                    </div>
                    <div class="course-details">
                    <span class="time-details">🕛 15 horas</span>
                    <span class="online-details">💻 Online</span>
                    <span class="online-details">🛒 Precio: 80€</span>
                 </div>
                    <div class="tarjeta-link">
                        <p>Impartido por: Alvaro </p>
                        <button>¡Resérvalo!</button>
                    </div>
                </div>
            </div>
        </div>
        </div>

<!--------ASISTENCIA A DOMICILIO----- -->

      <div class="subrayado2">
  <h3>Asistencia a domicilio para personas mayores</h3>
</div>

<div class="secionAsistentes">
  <div class="contenidoAsistentes">
    <div class="perfilesAsistentes">
      <img src="img/prof6.png" alt="Martín Galadas" class="perfil-image">
      <p class="perfil-nombre">Martín Cañadas<br><span class="perfil-titulo">Asistente para mayores</span></p>
    </div>
    <div class="perfilesAsistentes">
      <img src="img/prof2.png" alt="Sofía Salpoveda" class="perfil-image">
      <p class="perfil-nombre">Sofía Sepúlveda<br><span class="perfil-titulo">Asistente para mayores</span></p>
    </div>
  </div>
  <div class="contenidoTexto">
    <p>Comprendemos la importancia de un soporte en salud mental accesible y personalizado para nuestros adultos mayores.
         Con el compromiso de proporcionar un servicio de atención integral, ofrecemos asistencia a domicilio especializada en salud mental
          para ayudar a mejorar la calidad de vida de quienes más lo necesitan. 
          Proporcionamos recursos y capacitación para que las familias puedan apoyar de manera efectiva a sus seres queridos.
</p>
    <button class="reserve-button">Pide cita</button>
  </div>
</div>

</div>


<!--------ASISTENCIA A DOMICILIO----- -->

<div class="subrayado2">
  <h3>Asistencia a domicilio para niños/as</h3>
</div>

<div class="secionAsistentes">
  <div class="contenidoAsistentes">
    <div class="perfilesAsistentes">
      <img src="img/prof4.png" alt="Fernando Rodríguez" class="perfil-image">
      <p class="perfil-nombre">Fernando Rodríguez<br><span class="perfil-titulo">Asistente para niños/as</span></p>
    </div>
    <div class="perfilesAsistentes">
      <img src="img/prof5.png" alt="Beatriz Rodrigo" class="perfil-image">
      <p class="perfil-nombre">Beatriz Rodrigo <br><span class="perfil-titulo">Asistente para niños/as</span></p>
    </div>
  </div>
  <div class="contenidoTexto">
    <p>Entendemos la importancia del bienestar emocional desde las primeras etapas de la vida.
         Ofrecemos un servicio especializado de asistencia a domicilio para niños pequeños,
          garantizando un ambiente de apoyo y comprensión que promueva su desarrollo saludable y feliz.
           Es un servicio pensado especialmente para aquellas madres y padres que no pueden dedicar el tiempo que les gustaría a sus hijos.
            Nuestros profesionales se encargan de que estén acompañados y cuidados en ese tiempo
</p>
    <button class="reserve-button">Pide cita</button>
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