<?php

require_once("conecta.php");

$conexion = getConexion();

// Función para recuperar el id del paciente registrado
function obtenerIdNewPaciente($userNewPaciente){
    $conexion = getConexion();
    $sql_get_pacientes = "SELECT * FROM pacientes WHERE usuario_pacientes = ?";
    $stmt = $conexion->prepare($sql_get_pacientes);
    $stmt->bind_param("s", $userNewPaciente);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $datosPaciente = $resultado->fetch_assoc();
    return $datosPaciente['id_pacientes'];
}
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
            $_SESSION["idPacienteLogin"] = obtenerIdNewPaciente($usuario_pacientes);
            header("Location: perfil.php");
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
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../Proyecto_integrador/css/registro.css">
    <script src="../Proyecto_integrador/js/validacion_registrar.js"></script>
    <title>Registro - Equilibria</title>
</head>
<body class="registroFormulario">
    <div class="subrayadoFormularioRegistro">
        <h3>Crear cuenta</h3>
    </div>
     <div class="containerFormRegistro">
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
                    <div class="inputArea">
                        <label for="contrasena_pacientes">Contraseña:</label>
                        <input type="password" id="contrasena_pacientes" name="contrasena_pacientes">
                    </div>
                    <div class="container">
                        <div class="strengthMeter"></div>
                    </div>    
                </div>
            </div>
            <hr>
            <p>¿Tienes una cuenta?<a href="inicio_sesion.php"> Inicia sesión en tu cuenta</a></p>
            <button type="submit">Crear cuenta</button>
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
    <script src="../Proyecto_integrador/js/registro.js"></script>
</body>
</html>