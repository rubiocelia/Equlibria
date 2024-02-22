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
    <link rel="stylesheet" href="../Proyecto_integrador/css/quienesSomos.css">
    <script src="../Proyecto_integrador/js/validar_contacto.js"></script>
    <title>Quienes somos</title>
</head>

<body>
    <header class="header">
        <a href="index.html"><img class="logo" src="img/logo2.png" alt="" class="logo"></a>
        <a href="index.html"><img class="nombre" src="img/nombre.png" alt="" class="logo"></a>
        <nav>
            <ul class="menu">
                <li class="dropdown">
                    <a href="#" class="dropbtn">¿Quiénes somos?</a>
                    <div class="dropdown-content">
                        <a href="#">Nosotros</a>
                        <a href="#">Profesionales</a>
                        <a href="#">Contáctanos</a>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropbtn">Recursos gratuitos</a>
                    <div class="dropdown-content">
                        <a href="#">Podcast</a>
                        <a href="#">Libros autoayuda</a>
                        <a href="#">Videos mindfulness</a>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropbtn">Servicios</a>
                    <div class="dropdown-content">
                        <a href="#">Terapia psicológica</a>
                        <a href="#">Talleres</a>
                        <a href="#">Cursos</a>
                        <a href="#">Asistencia a domicilio</a>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropbtn">Retiros</a>
                    <div class="dropdown-content">
                        <a href="#">Retiro de verano</a>
                        <a href="#">Retiro de invierno</a>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropbtn">Perfil</a>
                    <div class="dropdown-content">
                        <a href="#">Mi perfil</a>
                        <a href="#">Calendario</a>
                        <a href="#">Ayuda</a>
                        <a href="#">Eliminar cuenta</a>
                        <a href="#">Cerrar sesión</a>
                    </div>
                </li>

                <li class="iniciarSesion"><a href="#">Iniciar sesión</a></li>
                <li class="registro"><a href="#">Registrarse</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="pgquienessomos">
            <div class="subrayadoQuienesSomos">
                <h3>¿Quiénes somos?</h3>
                <p>En Equilibria, nos dedicamos apasionadamente a cultivar el bienestar mental y emocional. Somos un equipo de profesionales comprometidos, liderados por expertos en psicología como la renombrada psicóloga Ana Gómez Rodríguez. 
                    <br><br>
                    Especializados en el tratamiento de la ansiedad y diversos problemas psicológicos, ofrecemos cursos y talleres de autoayuda diseñados para empoderar a nuestros clientes en su viaje hacia la salud mental. 
                    <br><br>
                    En Equilibria, creemos en el poder de la autenticidad y la comprensión, creando un espacio donde cada individuo pueda encontrar equilibrio y fortaleza emocional.</p>
            </div>
        </div>
        <div class="container">
            <div class="subrayadoPsicologos">
            <h3>Psicólogos</h3>
            </div>
            <div class="profile">
                <img src="../Proyecto_integrador/img/prof1.png" alt="Ana Gómez Rodríguez">
                <div class="beatriz">
                <h2>Ana Gómez Rodríguez</h2>
                <br>
                <p>La psicóloga especializada en ansiedad de Equilibria, se distingue por su enfoque 
                    compasivo y expertise en el manejo de trastornos ansiosos. Con una sólida formación,
                    Ana trabaja incansablemente para proporcionar a sus pacientes herramientas efectivas
                    y estrategias personalizadas. Su compromiso con el bienestar emocional se refleja 
                    en cada sesión, guiando a aquellos que buscan equilibrio hacia una vida más tranquila 
                    y plena.</p>
                </div>
                <div class="boton-cv-der">
                    <button class="btn">Ver CV</button>
                </div>
            </div>
        </div>
        <br>
        <div class="container2">
            <div class="profile2">
                <img src="../Proyecto_integrador/img/prof5.png" alt="Mara Sánchez Moreno">
                <div class="fernando">
                <h2>Mara Sánchez Moreno</h2>
                <br>
                <p>Mara Sánchez Moreno, destacada psicóloga de terapia de parejas en Equilibria, se 
                    especializa en fortalecer relaciones y cultivar conexiones saludables. Con una 
                    perspectiva compasiva, Mara aborda desafíos en la comunicación y resolución de 
                    conflictos, trabajando con parejas para crear un espacio de comprensión mutua. 
                    Su enfoque basado en evidencia y experiencia clínica ha llevado a resultados 
                    positivos, consolidando a Mara como una profesional confiable en el campo de la 
                    psicología de parejas en Equilibria.</p>
                </div>
                <div class="boton-cv-izq">
                    <button class="btn">Ver CV</button>
                </div>
            </div>
        </div>
            <div class="container3">
                <a href="citaPsicologia.php"><button class="btn-big">¡Reserva con tu psicólogo!</button></a>
        </div>
        <br><br><br><br>
        <div class="container">
            <div class="subrayadoAsistentesM">
            <h3>Asistentes para mayores</h3>    
            </div>
            <div class="profile">
                <img src="../Proyecto_integrador/img/prof6.png" alt="Ana Gómez Rodríguez">
                <div class="beatriz">
                <h2>Martín Cañadas Carriedo</h2>
                <br>
                <p>Martín Cañadas Carriedo, el asistente para personas mayores de Equilibria, es un 
                    dedicado profesional comprometido con el bienestar y la comodidad de los clientes 
                    mayores. Con un enfoque amable y compasivo, Martín brinda apoyo integral, desde 
                    actividades diarias hasta compañía emocional. Su experiencia en el cuidado de 
                    personas mayores y su atención personalizada lo convierten en un recurso valioso 
                    para mejorar la calidad de vida de quienes confían en Equilibria para el cuidado 
                    de sus seres queridos.</p>
                </div>
                <div class="boton-cv-der">
                    <button class="btn">Ver CV</button>
                </div>
            </div>
            <br>
        </div>
        <div class="container2">
            <div class="profile2">
                <img src="../Proyecto_integrador/img/prof2.png" alt="Mara Sánchez Moreno">
                <div class="fernando">
                <h2>Sofía Sepúlveda Rivera</h2>
                <br>
                <p>Sofía Sepúlveda Rivera, la asistente para personas mayores de Equilibria, se 
                    distingue por su compromiso inquebrantable con el bienestar y la atención 
                    individualizada. Con empatía y dedicación, Sofía proporciona un apoyo integral, 
                    abordando las necesidades diarias y brindando compañía afectuosa. Su enfoque 
                    centrado en la persona y su experiencia en el cuidado de adultos mayores hacen de 
                    ella una valiosa integrante del equipo de Equilibria, comprometida con mejorar la 
                    calidad de vida de quienes confían en sus servicios.</p>
                </div>
                <div class="boton-cv-izq">
                    <button class="btn">Ver CV</button>
                </div>
            </div>
        </div>
        <br><br><br><br>
        <div class="container">
            <div class="subrayadoAsistentesN">
            <h3>Asistentes para niños</h3>    
            </div>
            <div class="profile">
                <img src="../Proyecto_integrador/img/prof4.png" alt="Ana Gómez Rodríguez">
                <div class="beatriz">
                <h2>Beatriz Rodrigo Marquínez</h2>
                <br>
                <p>Beatriz Rodrigo Marquínez, la asistente para niños de Equilibria, destaca por su 
                    dedicación y cariño en la atención infantil. Con un enfoque lúdico y educativo, 
                    Beatriz se esfuerza por crear un entorno seguro y estimulante para los pequeños. 
                    Su compromiso con el desarrollo integral se refleja en cada interacción, brindando 
                    apoyo tanto emocional como práctico. Beatriz, integrante vital del equipo de 
                    Equilibria, trabaja incansablemente para asegurar que cada niño experimente un 
                    crecimiento saludable y positivo.</p>
                </div>
                <div class="boton-cv-der">
                    <button class="btn">Ver CV</button>
                </div>
            </div>
        </div>
        <br>
        <div class="container2">
            <div class="profile2">
                <img src="../Proyecto_integrador/img/prof3.png" alt="Mara Sánchez Moreno">
                <div class="fernando">
                <h2>Fernando Rodríguez Bellido</h2>
                <br>
                <p>Fernando Rodríguez Bellido, el asistente para niños en Equilibria, se distingue por 
                    su entusiasmo contagioso y enfoque centrado en el bienestar infantil. Con habilidades 
                    pedagógicas y un trato amigable, Fernando crea un ambiente educativo y divertido para 
                    los pequeños a su cargo. Su compromiso con el desarrollo integral se refleja en 
                    actividades estimulantes y apoyo emocional constante. Como parte fundamental del 
                    equipo de Equilibria, Fernando trabaja incansablemente para fomentar un crecimiento 
                    positivo y saludable en cada niño.</p>
                </div>
                <div class="boton-cv-izq">
                    <button class="btn">Ver CV</button>
                </div>
            </div>
        </div>
            <div class="container3">
                <a href="citaAsistencia.php"><button class="btn-big">¡Reserva con tu asistente!</button></a>
        </div>
        <br><br><br><br>
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
        <script src="./js/faq.js"></script>
        <br><br><br>
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
        <br>
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