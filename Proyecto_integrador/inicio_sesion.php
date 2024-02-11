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
</body>

</html>