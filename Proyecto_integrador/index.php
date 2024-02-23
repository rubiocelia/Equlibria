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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/index.css">
    <script src="./js/validar_inicioSesion.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Equilibria</title>
</head>

<body class="inicio">
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
        <div class="pginicio">
            <h1>Aprende a fluir <br> con tus emociones</h1>
            <a href="citaPsicologia.php" class="boton_inicio">¡Únete a nuestra terapia!</a>

        </div>
        <div class="bienvenido">
            <h3 class="titBienvenido">Bienvenida/o</h3>
            <p>Te proporcionamos un entorno de tranquilidad y protección, donde te asistimos en tomar el control de tu
                propia vida. <br> <br> Simplemente al estar aquí, demuestras gran valentía.</p>
        </div>
        <div>
            <div class="subrayado">
                <h3>Nuestros talleres</h3>
            </div>
            <div class="talleresInicio">
                <div class="taller">
                    <img src="img/taller1.png">
                    <h3>Autoestima</h3>
                    <p>Aprenderás sobre autoestima y como integrarla en tu vida para lograr rebajar los niveles de
                        ansiedad
                        y
                        conocer mejor tu cuerpo y tus habilidades.
                    </p>
                    <a href="reservaEvento.php" class="linkIndex">¡Resérvalo!</a>

                </div>

                <div class="taller">
                    <img src="img/taller2.png">
                    <h3>Mejora habilidades sociales</h3>
                    <p>En este taller de hablididades sociales trabajaremos todas las áreas en las que las habilidades
                        sociales adquieren un papel importante.
                    </p>
                    <a href="reservaEvento.php" class="linkIndex">¡Resérvalo!</a>
                </div>

                <div class="taller">
                    <img src="img/taller3.png">
                    <h3>Gestión de la ansiedad</h3>
                    <p>Descubre en este taller todo lo que debes saber sobre tu ansiedad. Vamos a aprender a acapetar y
                        escuchar desde el amor nuestra ansiedad.
                    </p>
                    <a href="reservaEvento.php" class="linkIndex">¡Resérvalo!</a>
                </div>

                <div class="taller">
                    <img src="img/taller4.png">
                    <h3>Autoexigencia y perfeccionismo</h3>
                    <p>En este taller trabajaremos en reconocer y acompañar nuestra autoexigenciaa y profundizaremos en
                        el origen.
                    </p>
                    <a href="reservaEvento.php" class="linkIndex">¡Resérvalo!</a>
                </div>
            </div>
        </div>
        <div class="profesionales">
            <h2>¡Estos son nuestros profesionales!</h2>
            <img src="img/prof1.png">
            <img src="img/prof2.png">
            <img src="img/prof3.png">
            <img src="img/prof4.png">
            <img src="img/prof5.png">
            <img src="img/prof6.png">
            <br>
            <button>¡Conoce a nuestro equipo!</button>
        </div>

        <div>
            <div class="subrayado">
                <h3>Nuestros cursos</h3>
            </div>
        </div>
        <div class="container">
            <div class="cursos">
                <img src="img/cursoAutoestima.png" alt="">
                <div class="card-description">
                    <div class="card-title">
                        <h3>Curso de autoestima</h3>
                    </div>
                    <div class="card-text">
                        <p>
                            Un curso de autoestima es una experiencia diseñada para fortalecer la confianza y la
                            autovaloración de los participantes, brindando herramientas para superar
                            inseguridades y mejorar la relación con uno mismo.
                        </p>
                    </div>
                    <div class="card-link">
                        <p>Por: Javier Chicano </p>
                        <a href="reservaEvento.php" class="linkIndex">¡Resérvalo!</a>
                    </div>
                </div>
            </div>

            <div class="cursos">
                <img src="img/cursoDependenciaEmocional.png" alt="">
                <div class="card-description">
                    <div class="card-title">
                        <h3>Curso de dependencia emocional</h3>
                    </div>
                    <div class="card-text">
                        <p>Este curso sobre Dependencia Emocional te ayudará a liberarte de patrones
                            destructivos y a cultivar relaciones más saludables a través de la autonomía
                            emocional y la autoestima.
                        </p>
                    </div>
                    <div class="card-link">
                        <p>Por: Juan Pepón</p>
                        <a href="reservaEvento.php" class="linkIndex">¡Resérvalo!</a>
                    </div>
                </div>
            </div>
            <div class="cursos">
                <img src="img/cursoAnsiedadOnline.png" alt="">
                <div class="card-title">
                    <h3>Curso ansiedad online</h3>
                </div>
                <div class="card-text">
                    <p>El curso de Ansiedad en línea te brinda las herramientas para comprender y gestionar
                        la ansiedad desde la comodidad de tu hogar. Aprende estrategias efectivas para
                        controlar el estrés y recupera tu bienestar emocional.
                    </p>
                </div>
                <div class="card-link">
                    <p>Por: Alejandro Junyent</p>
                    <a href="reservaEvento.php" class="linkIndex">¡Resérvalo!</a>
                </div>
            </div>
            <div class="cursos">
                <img src="img/cursoParejas.png" alt="">
                <div class="card-description">
                    <div class="card-title">
                        <h3>Curso para parejas</h3>
                    </div>
                    <div class="card-text">
                        <p>Nuestro curso para parejas es una oportunidad para fortalecer la conexión y mejorar
                            la comunicación en tu relación. Aprenderás herramientas efectivas para construir una
                            base sólida y resolver desafíos juntos.
                        </p>
                    </div>
                    <div class="card-link">
                        <p>Por: Alvaro Serrano</p>
                        <a href="reservaEvento.php" class="linkIndex">¡Resérvalo!</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
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
    <script src="./js/main.js"></script>
    <script src="./js/validar_inicioSesion.js"></script>
</body>

</html>