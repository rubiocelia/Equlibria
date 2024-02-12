<?php
require_once("conecta.php");

$conexion = getConexion();

// Iniciamos sesión
session_start();

// Verificamos el inicio de sesión del paciente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los datos del formulario
    $usuario_pacientes = $_POST["usuario_pacientes"];
    $contrasena_pacientes = $_POST["contrasena_pacientes"];

    // Consultamos la base de datos para verificar el inicio de sesión
    // Selecciona también el id_pacientes para poder redirigir con ese dato
    $sql_verificar_pacientes = "SELECT * FROM pacientes WHERE usuario_pacientes = ? AND contrasena_pacientes = ?";
    $stmt = $conexion->prepare($sql_verificar_pacientes);
    $stmt->bind_param("ss", $usuario_pacientes, $contrasena_pacientes);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        // Inicio de sesión exitoso, almacenamos datos del paciente en la sesión
        $pacientes = $resultado->fetch_assoc();
        $_SESSION["pacientes"] = $pacientes;

        // Redirigimos a la página de perfil incluyendo el ID del usuario en la URL
        header("Location: perfil.php?id=" . $pacientes['id_pacientes']);
        exit();
    } else {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                validarFormularioInicio();
            });
          </script>";
    }
}

// Cerramos conexión
mysqli_close($conexion);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script src="validar_inicioSesion.js"></script>
    <title>Inicio sesión-Equilibria</title>
</head>

<body class="inicioSesion">
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
<div class="subrayadoFormulario">
                <h3>Iniciar sesión</h3>
            </div>
            <a href="">
                <button type="submit" class="google-signin">
                    <object data="../Proyecto_integrador/img/google.svg"></object>
                    <span>Inicia sesión con Google</span>
                </button>
            </a>
            <div class="containerForm">
                <form class="formInicioSesion" method="post" action="inicio_sesion.php"
                    onsubmit="validarFormularioInicio()">
                    <hr>
                    <label for="usuario_pacientes">Usuario:</label>
                    <input type="text" id="usuario_pacientes" name="usuario_pacientes">
                    <span id="errorUsuario" class="error-mensaje"></span>

                    <br><br>

                    <label for="contrasena_pacientes">Contraseña:</label>
                    <div class="input-container">
                        <input type="password" id="contrasena_pacientes" name="contrasena_pacientes">
                        <span onclick="togglePasswordVisibility()">
                            <i class="eye-icon2">🙉</i>
                        </span>
                    </div>
                    <span id="errorContrasena" class="error-mensaje"></span>
                    <hr>
                    <br>

                    <p>¿No tienes una cuenta?<a href="registrarse.php"> Crea una cuenta</a></p>

                    <button type="submit">Acceder a mi cuenta</button>
                </form>
            </div>
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

</html>