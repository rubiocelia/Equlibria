<?php

require_once("conecta.php");

$conexion = getConexion();

// Iniciamos sesión
session_start();


// Verificamos si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos datos del formulario
    $usuario_pacientes = $_POST['usuario_pacientes'];
    $contrasena_pacientes = $_POST['contrasena_pacientes'];
    $nombre_pacientes = $_POST['nombre_pacientes'];
    $apellidos_pacientes = $_POST['apellidos_pacientes'];
    $telefono_paciente = $_POST['telefono_paciente'];
    $mail_pacientes = $_POST['mail_pacientes'];

    //Hashing de la contraseña
    $contrasena_pacientes_hash = password_hash($contrasena_pacientes, PASSWORD_DEFAULT);

    // El usuario existe, procedemos con la inserción en la tabla de consultas
    $sql_insert_paciente = "INSERT INTO pacientes (usuario_pacientes, contrasena_pacientes, nombre_pacientes, apellidos_pacientes, telefono_paciente, mail_pacientes) VALUES
        ('$usuario_pacientes', '$contrasena_pacientes', '$nombre_pacientes', '$apellidos_pacientes', '$telefono_paciente', '$mail_pacientes')";

    // Ejecutamos la consulta
    if ($conexion->query($sql_insert_paciente) === TRUE) {
        "Paciente creado";
    } else {
        echo "Error 333.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <script src="validacion.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Crear cuenta-Equilibria</title>
</head>

<body class="inicioSesion">
    <div class="subrayadoFormulario">
        <h3>Crear cuenta</h3>
    </div>
    <div class="containerForm">
        <form class="formInicioSesion" method="post" action="" onsubmit="return validarFormularioCrear()">
            <label for="nombre_pacientes">Nombre:</label>
            <input type="text" id="nombre_pacientes" name="nombre_pacientes">

            <br><br>

            <label for="apellidos_pacientes">Apellidos:</label>
            <input type="text" id="apellidos_pacientes" name="apellidos_pacientes">

            <br><br>

            <label for="telefono_paciente">Número de Teléfono:</label>
            <input type="tel" id="telefono_paciente" name="telefono_paciente">

            <br><br>

            <label for="mail_pacientes">Correo Electrónico:</label>
            <input type="email" id="mail_pacientes" name="mail_pacientes">

            <br><br>

            <label for="usuario_pacientes">Nombre de Usuario:</label>
            <input type="text" id="usuario_pacientes" name="usuario_pacientes">

            <br><br>

            <label for="contrasena_pacientes">Contraseña:</label>
            <input type="password" id="contrasena_pacientes" name="contrasena_pacientes">

            <br><br>

            <button type="submit">Crear cuenta</button>
        </form>
    </div>
</body>

</html>