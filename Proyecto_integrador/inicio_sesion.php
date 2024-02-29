<?php
require_once("conecta.php");

$conexion = getConexion();

// Iniciamos sesión
session_start();
//Recuperamos la url de destino tras el inicio de sesion
$urlDestino="";
if (isset($_GET['sendTo'])) {
    $urlDestino = $_GET['sendTo'];
}

// Verificamos el inicio de sesión del paciente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperamos la url de destino al hacer login
    $urlDestino= $_POST['sendTo'];
    // Validamos que llamada al metodo POST venga del boton login para realizar el inicio de sesión
    if (isset($_POST['Login'])) {
        // Obtenemos los datos del formulario
        $usuario_pacientes = $_POST["usuario_pacientes"];
        $contrasena_pacientes = $_POST["contrasena_pacientes"];

        // Consultamos la base de datos para verificar el inicio de sesión
        $sql_verificar_pacientes = "SELECT * FROM pacientes WHERE usuario_pacientes = ?";
        $stmt = $conexion->prepare($sql_verificar_pacientes);
        $stmt->bind_param("s", $usuario_pacientes);
        $stmt->execute();
        $resultado = $stmt->get_result();
        // Valimos que se hayan devuelto resultados para incluirlos en la sesion
        if ($resultado->num_rows > 0) {
            // Recuperamos los datos del paciente encontrado.
            $datosPaciente = $resultado->fetch_assoc();
            // Verificamos la contraseña
            if (password_verify($contrasena_pacientes, $datosPaciente['contrasena_pacientes'])) {
                //Contraseña valida - Iniciamos la sesión
                // Inicio de sesión exitoso, almacenamos datos del paciente en la sesión
                $_SESSION["idPacienteLogin"] = $datosPaciente['id_pacientes'];
                // Redirigimos a la página de perfil incluyendo el ID del usuario en la URL
                if($urlDestino==''){
                    header("Location: perfil.php");
                } else {
                    header("Location: ".$urlDestino.".php");
                }
                exit();
            } else {
                //Contraseña no valida
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        validarFormularioInicio();
                    });
                </script>";
            }
        } else {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    validarFormularioInicio();
                });
            </script>";
        }
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
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/validar_inicioSesion.js"></script>
    <!-- <script src="./js/inicioSesion.js"></script> -->
    <title>Inicio sesión-Equilibria</title>
</head>

<body class="inicioSesion">
<div class="subrayadoFormulario">
                <h3>Iniciar sesión</h3>
            </div>
            <div class="containerForm">
                <form class="formInicioSesion" id="loginForm" method="post" action="inicio_sesion.php"
                    onsubmit="validarFormularioInicio()">
                    <hr>
                    <label for="usuario_pacientes">Usuario:</label>
                    <input type="text" id="usuario_pacientes" name="usuario_pacientes">
                    <!-- <span id="errorUsuario" class="error-mensaje"></span> -->

                    <br><br>

                    <label for="contrasena_pacientes">Contraseña:</label>
                    <div class="input-container">
                        <input type="password" id="contrasena_pacientes" name="contrasena_pacientes">
                        <span onclick="togglePasswordVisibility()">
                            <span class="eye-icon">🙉</span>
                        </span>
                    </div>
                    <!-- <span id="errorContrasena" class="error-mensaje"></span> -->
                    <hr>
                    <br>

                    <p>¿No tienes una cuenta?<a href="registrarse.php"> Crea una cuenta</a></p>
                    <input type="hidden" name="sendTo" value="<?php echo $urlDestino; ?>">
                    <button type="submit" name="Login">Acceder a mi cuenta</button>
                    <a href="../Proyecto_integrador/index.php"><button class="volverAtras" onclick="window.location.href='index.php';">Volver al Inicio</button></a>
                </form>
            </div>
            <!-- Modal Structure -->
    <div id="modal-backdrop" class="modal-backdrop" style="display:none;">
    <div id="modal" class="modal" style="display:none;">
        <div class="modal-content">
            <h2>Atención ⚠️</h2>
            <br>
            <p id="modal-message">Mensaje del modal</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
        </div>
    </div>
    </div>
</body>
</html>