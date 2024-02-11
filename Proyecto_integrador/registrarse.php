<?php

require_once("conecta.php");

$conexion = getConexion();

// Iniciamos sesión
session_start();

// Verificamos si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos datos del formulario
    $usuario_pacientes = $_POST['usuario_pacientes'];
    $contrasena_pacientes = $_POST['contrasena_pacientes']; // Contraseña en texto plano
    $nombre_pacientes = $_POST['nombre_pacientes'];
    $apellidos_pacientes = $_POST['apellidos_pacientes'];
    $telefono_paciente = $_POST['telefono_paciente'];
    $mail_pacientes = $_POST['mail_pacientes'];

    // Hashing de la contraseña
    $contrasena_pacientes_hash = password_hash($contrasena_pacientes, PASSWORD_DEFAULT);

    // Preparamos la consulta SQL para insertar el hash de la contraseña
    $sql_insert_paciente = "INSERT INTO pacientes (usuario_pacientes, contrasena_pacientes, nombre_pacientes, apellidos_pacientes, telefono_paciente, mail_pacientes) 
                            VALUES (?, ?, ?, ?, ?, ?)";

    // Preparar la sentencia
    if ($stmt = $conexion->prepare($sql_insert_paciente)) {
        // Vinculamos los parámetros a la sentencia preparada
        $stmt->bind_param("ssssis", $usuario_pacientes, $contrasena_pacientes_hash, $nombre_pacientes, $apellidos_pacientes, $telefono_paciente, $mail_pacientes);

        // Ejecutamos la sentencia preparada
        if ($stmt->execute()) {
            header("Location: perfil.html");
            exit();
        } else {
            echo "Error al crear el paciente: " . $stmt->error;
        }

        // Cerramos la sentencia preparada
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conexion->error;
    }
    // Cerramos conexión
    $conexion->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="validacion_registrar.js"></script>
    <title>Crear cuenta - Equilibria</title>
</head>
<body class="registroFormulario">
    <div class="subrayadoFormulario">
        <h3>Crear cuenta</h3>
    </div>
    <a href="">
                <button type="submit" class="google-signin">
                    <object data="../Proyecto_integrador/img/google.svg"></object>
                    <span>Regístrate con Google</span>
                </button>
    <div class="containerForm">
        <form class="formRegistro" method="post" action="">
        <hr>
            <div class="form-row">
                <div class="form-column">
                    <label for="nombre_pacientes">Nombre:</label>
                    <input type="text" id="nombre_pacientes" name="nombre_pacientes">
                </div>
                <div class="form-column">                      
                    <label for="apellidos_pacientes">Apellidos:</label>
                    <input type="text" id="apellidos_pacientes" name="apellidos_pacientes">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-column">
                    <label for="telefono_paciente">Número de Teléfono:</label>
                    <input type="tel" id="telefono_paciente" name="telefono_paciente">
                </div>
                <div class="form-column">
                    <label for="mail_pacientes">Correo Electrónico:</label>
                    <input type="email" id="mail_pacientes" name="mail_pacientes">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-column">
                    <label for="usuario_pacientes">Nombre de Usuario:</label>
                    <input type="text" id="usuario_pacientes" name="usuario_pacientes">
                </div>
                <div class="form-column">
                    <label for="contrasena_pacientes">Contraseña:</label>
                    <input type="password" id="contrasena_pacientes" name="contrasena_pacientes">
                </div>
            </div>
            <hr>
            <p>¿Tienes una cuenta?<a href="inicio_sesion.php"> Inicia sesión en tu cuenta</a></p>
            <button type="submit">Crear cuenta</button>
        </form>
    </div>
</body>

</html>