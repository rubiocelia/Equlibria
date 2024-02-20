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
    <link rel="stylesheet" href="css/recursosGratuitos.css">
    <title>Recursos gratuitos</title>
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
                <li class="registro"><a href="#">Registrase</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="podcast" id="podcast">
            <div class="tituloPodcast">
                <img src="img/spotify.png" alt="">
                <div class="subrayadoPod">
                    <h3>Podcasts</h3>
                </div>
            </div>
            <div class="tarjPodcasts">
                <div class="tarjetaPodcast">
                    <a href="https://open.spotify.com/show/4S9Df6SgTiy9V0WQqC0mu9" target="_blank"><img class="fotoPod"
                            src="img/pdct.png" alt="podcast1"></a>
                    <h2>Vivir positivo y sin ansiedad</h2>
                    <p> By UTVCO</p>
                    <img class="logoPodcast" src="img/logoSpotify.png" alt="podcast logo">
                </div>

                <div class="tarjetaPodcast">
                    <a href="https://open.spotify.com/show/333BYqSFiwCNDu0ewIa2Eu" target="_blank"><img class="fotoPod"
                            src="img/pdct4.png" alt="podcast1"></a>
                    <h2>El mensaje de la ansiedad</h2>
                    <p> By DESANSIEDAD</p>
                    <img class="logoPodcast" src="img/logoSpotify.png" alt="podcast logo">
                </div>

                <div class="tarjetaPodcast">
                    <a href="https://open.spotify.com/show/3wFVDyEHFtFS91qbL50hch" target="_blank"><img class="fotoPod"
                            src="img/pdct3.png" alt="podcast1"></a>
                    <h2>Sin miedo</h2>
                    <p> By RAFEL SANTANDREU</p>
                    <img class="logoPodcast" src="img/logoSpotify.png" alt="podcast logo">
                </div>

                <div class="tarjetaPodcast">
                    <a href="https://open.spotify.com/show/2l1ghVilJaxdTb2XSzP7wp" target="_blank"><img class="fotoPod"
                            src="img/pdct2.png" alt="podcast1"></a>
                    <h2>Mindfulness supera la ansiedad</h2>
                    <p> By SUPERA LA ANSIEDAD</p>
                    <img class="logoPodcast" src="img/logoSpotify.png" alt="podcast logo">
                </div>

                <div class="tarjetaPodcast">
                    <a href="https://open.spotify.com/show/5Nw7iAXxoP7roodIYiCHhc" target="_blank"><img class="fotoPod"
                            src="img/pdct5.png" alt="podcast1"></a>
                    <h2>Ansiedad</h2>
                    <p> By KASSANDRA CALDERON</p>
                    <img class="logoPodcast" src="img/logoSpotify.png" alt="podcast logo">
                </div>

                <div class="tarjetaPodcast">
                    <a href="https://open.spotify.com/show/6thp7hhpxcM1fyqqI01qsq" target="_blank"><img class="fotoPod"
                            src="img/pdct6.png" alt="podcast1"></a>
                    <h2>Cómo sobrellevar la ANSIEDAD</h2>
                    <p> By ANDRE SOSA</p>
                    <img class="logoPodcast" src="img/logoSpotify.png" alt="podcast logo">
                </div>
            </div>
        </div>

        <div class="libros" id="librosAutoayuda">
            <div class="subrayado">
                <h3>Libros autoayuda</h3>
            </div>
            <div class="navegacion">
                <span class="flecha-izquierda">🡠</span>
                <div class="libros-container">
                    <div class="libro_card">
                        <img src="img/libro1.png" alt="Portada del Libro" class="libro-img">
                        <div class="libro-info">
                            <h2>Bye bye ansiedad</h2>
                            <h3>El método eficaz para vivir tranquilo</h3>
                            <p class="autor">Por Ferran Cases</p>
                            <p class="descripcion">"BYE BYE ANSIEDAD" de
                                Ferran Cases es un libro que comparte un método personal y
                                efectivo
                                para superar la ansiedad
                                y mejorar la felicidad. Basado en experiencias propias y casos
                                tratados, el autor aborda el origen de la ansiedad, proporciona una fórmula
                                estructurada,
                                pautas diarias y hábitos comprobados. Las reglas fundamentales incluyen dedicar tiempo
                                al
                                autoconocimiento y seguir el método paso a paso. El objetivo final es alcanzar la cima
                                de la
                                montaña de la serenidad, liberándose de la ansiedad.</span></p>

                            <a href="link_de_compra_libro" class="btn-comprar">Comprar</a>
                        </div>
                    </div>

                    <div class="libro_card">
                        <img src="img/libro2.png" alt="Portada del Libro" class="libro-img">
                        <div class="libro-info">
                            <h2>El fin de la ansiedad</h2>
                            <h3>El mensaje que cambiará tu vida</h3>
                            <p class="autor">Por Ferran Cases</p>
                            <p class="descripcion">"En 'El fin de la ansiedad', Gio Zararri aborda cómo superar
                                esta emoción mediante herramientas internas. Destaca que la
                                ansiedad
                                surge por la necesidad
                                de cambio personal y sostiene que todo lo necesario para superarla está dentro de cada
                                uno.
                                El libro ha sido exitoso en ventas y elogiado en revistas de psicología gracias a su
                                enfoque
                                cercano y humorístico."</p>
                            <a href="link_de_compra_libro" class="btn-comprar">Comprar</a>
                        </div>
                    </div>

                    <div class="libro_card">
                        <img src="img/libro3.png" alt="Portada del Libro" class="libro-img">
                        <div class="libro-info">
                            <h2>Deshacer la Ansiedad</h2>
                            <p class="autor">Por Judson Brewer</p>
                            <p class="descripcion">"En 'Desactiva la
                                Ansiedad', Judson Brewer ofrece técnicas respaldadas por la investigación cerebral para
                                erradicar la ansiedad. Explora cómo la ansiedad impulsa
                                comportamientos negativos y presenta
                                un programa práctico basado en más de 20 años de investigación, utilizando la curiosidad
                                y
                                la atención plena para desactivar los desencadenantes de la ansiedad y mejorar el
                                bienestar."</p>
                            <a href="link_de_compra_libro" class="btn-comprar">Comprar</a>
                        </div>
                    </div>

                    <div class="libro_card">
                        <img src="img/libro4.png" alt="Portada del Libro" class="libro-img">
                        <div class="libro-info">
                            <h2>Cómo hacer que te pasen cosas buenas</h2>
                            <p class="autor">Por Marian Rojas Estapé</p>
                            <p class="descripcion"> "Entiende tu cerebro, gestiona tus emociones, mejora tu vida.
                                Uniendo
                                el punto de vista científico, psicológico y humano, la autora nos ofrece una reflexión
                                profunda, salpicada de útiles consejos y con vocación eminentemente didáctica, acerca de
                                la aplicación de nuestras propias capacidades al empeño de procurarnos una existencia
                                plena y feliz: conocer y optimizar determinadaszonas del cerebro, fijar metas y
                                objetivos en la vida, ejercitar la voluntad, poner en marcha la inteligencia emocional,
                                desarrollar la asertividad, evitar el exceso de autocrítica y autoexigencia, reivindicar
                                el papel del optimismo..."</p>
                            <a href="link_de_compra_libro" class="btn-comprar">Comprar</a>
                        </div>
                    </div>

                    <div class="libro_card">
                        <img src="img/libro5.png" alt="Portada del Libro" class="libro-img">
                        <div class="libro-info">
                            <h2>Sin miedo</h2>
                            <h3>El mensaje que cambiará tu vida</h3>
                            <p class="autor">Por Marian Rojas Estapé</p>
                            <p class="descripcion">"En 'Sin Miedo', se presenta un método
                                definitivo para superar el miedo sin necesidad de recurrir a fármacos. Cientos de miles
                                de
                                personas han reconfigurado su cerebro con este método respaldado por estudios
                                científicos.
                                Con cuatro pasos claros y concisos, el libro aborda desde ataques de ansiedad hasta
                                timidez,
                                permitiendo a cualquiera convertirse en su mejor versión: una persona libre, poderosa y
                                feliz."</p>
                            <a href="link_de_compra_libro" class="btn-comprar">Comprar</a>
                        </div>
                    </div>
                    <span class="flecha-derecha">🡢</span>
                </div>
            </div>
        </div>
        <div class="videos" id="videos">
            <div class="subrayado">
                <h3>Videos mindfulness</h3>
            </div>
            <div class="video-gallery">
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/wSndsVh8HRM?si=LsCV1LHn3xEx_BNa"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <h3>Meditación para la ansiedad</h3>
                    <p>Meditación guiada para reducir la ansiedad y recuperar la sensación de control en tu vida. Una
                        meditación relajante perfecta para conciliar el sueño, o para empezar el día con positividad.
                        Escúchala con auriculares para una mejor experiencia!</p>
                </div>
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/aBsnQjJ2_Nk?si=06crZEwvzQlVEe99"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <h3>Paz y calma en 15 min</h3>
                    <p>En esta meditación guiada para la ansiedad y las emociones negativas vamos a realizar 15 minutos
                        mágicos que te aportarán paz y calma mental además de eliminar el estrés, la ansiedad y los
                        pensamientos negativos. </p>
                </div>
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/bryyBFqH56k?si=8Ahjo-0TihLu7pf3"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <h3>Meditación Relajación para Embarazadas</h3>
                    <p>Este audio de hipnoparto dura 25 minutos. Te aconsejo que lo escuches antes de ir a dormir, en
                        los momentos que te dediques un tiempo para ti y tu bebé o, simplemente, cuando te apetezca.

                        Te animo a que sea regularmente, por ejemplo, 3 veces por semana. Verás que escucharlo es muy
                        relajante.

                        También, puedes escucharlo sola con tus auriculares o junto con tu acompañante.
                    </p>
                </div>
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/VZrUfADraX8?si=ALBZZctSWuNfK2BP"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <h3>Elimina el estrés en 5 minutos</h3>
                    <p>Hacer pequeñas pausas o pequeños descansos en nuestro día es fundamental no solo para protegernos
                        del estrés sino para ser más productivos, más eficientes, tener una mayor concentración y por
                        supuesto sentirnos más tranquilos y relajados a pesar de llevar un día ajetreado... Compruébalo
                        tu mism@!!</p>
                </div>
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/fcsFdEqOeCI?si=U-ZdTXD8Jy3kQ2bG"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <h3>Mindfulness para un sueño reparador</h3>
                    <p>A continuación, vas a disfrutar de una meditación realizada por la experta Instructora de
                        Mindfulness del Instituto Europeo de Psicología Positiva Aroa Ruiz.
                        Te invitamos a realizar esta breve meditación , puedes practicarla acostado con la intención de
                        desarrollar tu Atención Plena antes de ir a dormir y que de esta manera te predispongas a tener
                        un sueño reparador. </p>
                </div>
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/u_lFkobfF6Y?si=CeFxH4XCa0TVSyAE"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <h3>Mindfulness para la autoestima de los adolescentes</h3>
                    <p>Meditación guiada para aumentar la AUTOESTIMA y confianza en los niños y adolescentes. Con la
                        ayuda de Isabel Bersabé, neurodocente especializada en Mindfulness, nuestros hijos aprenderán a
                        atender a la autoestima como un elemento principal en nuestras vidas. ¡Dale al play para estar
                        presentes en el aquí y ahora!</p>
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
    <script src="js/recursosGratuitos.js"></script>
</body>