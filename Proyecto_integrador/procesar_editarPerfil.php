<?php
require_once("conecta.php");
$conexion = getConexion();

// Asegurándose de que el método utilizado para acceder a esta página es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogida de datos del formulario
    $id_pacientes = $_SESSION['id_pacientes']; // Asumiendo que has almacenado el ID del paciente en la sesión
    $nombre_pacientes = $_POST['nombre_pacientes'];
    $apellidos_pacientes = $_POST['apellidos_pacientes'];
    $mail_pacientes = $_POST['mail_pacientes'];
    $telefono_paciente = $_POST['telefono_paciente'];
    $usuario_pacientes = $_POST['usuario_pacientes'];
    $contrasena_pacientes = $_POST['contrasena_pacientes']; // Considera encriptar esta contraseña antes de almacenarla

    // Consulta SQL para actualizar los datos del paciente
    $sql = "UPDATE pacientes SET nombre_pacientes=?, apellidos_pacientes=?, mail_pacientes=?, telefono_paciente=?, usuario_pacientes=?, contrasena_pacientes=? WHERE id_pacientes=?";

    $stmt = $conexion->prepare($sql);
    if ($stmt) {
        // Encriptar la contraseña antes de almacenarla, por ejemplo, usando password_hash()
        $contrasena_pacientes_hash = password_hash($contrasena_pacientes, PASSWORD_DEFAULT);

        $stmt->bind_param("ssssssi", $nombre_pacientes, $apellidos_pacientes, $mail_pacientes, $telefono_paciente, $usuario_pacientes, $contrasena_pacientes_hash, $id_pacientes);
        
        if ($stmt->execute()) {
            // Redirigir a alguna página de confirmación o de perfil
            header("Location: perfil.php");
        } else {
            // Manejar el error, por ejemplo, mostrando un mensaje al usuario
            echo "Error al actualizar el perfil: " . $conexion->error;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conexion->error;
    }
}

$conexion->close();
?>
