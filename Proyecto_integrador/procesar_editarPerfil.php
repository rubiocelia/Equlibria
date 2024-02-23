<?php
// Incluir el archivo de conexión a la base de datos
require_once("conecta.php");

// Iniciar sesión
session_start();

// Verificar si el usuario ha iniciado sesión y si los datos del formulario están presentes
if(isset($_SESSION['idPacienteLogin']) && isset($_POST['nombre_pacientes'])) {
    $conexion = getConexion(); // Asumiendo que getConexion devuelve un objeto de conexión

    // Recuperar los datos del formulario
    $idPaciente = $_SESSION['idPacienteLogin'];
    $nombre = $_POST['nombre_pacientes'];
    $apellidos = $_POST['apellidos_pacientes'];
    $email = $_POST['mail_pacientes'];
    $telefono = $_POST['telefono_paciente'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $genero = $_POST['genero'];
    $usuario = $_POST['usario_pacientes'];
    $contrasena = $_POST['contrasena_pacientes']; // Contraseña que el usuario ha ingresado

    // Preparar la consulta SQL para actualizar los datos del paciente
    $sql = "UPDATE pacientes SET nombre_pacientes=?, apellidos_pacientes=?, mail_pacientes=?, telefono_paciente=?, fecha_nacimiento=?, genero=?, usuario_pacientes=?, contrasena_pacientes=? WHERE id_pacientes=?";

    $stmt = $conexion->prepare($sql);
    if($stmt) {
        // Se pasa la contraseña encriptada en lugar de la contraseña en texto plano
        $stmt->bind_param("ssssssssi", $nombre, $apellidos, $email, $telefono, $fechaNacimiento, $genero, $usuario, $contrasena, $idPaciente);
        
        // Ejecutar la consulta
        if($stmt->execute()) {
            // Mensaje de éxito
            $mensaje = "¡Los datos se han guardado correctamente!";
        } else {
            // Error al actualizar
            $mensaje = "Error al actualizar.";
        }
    } else {
        // Error al preparar la consulta
        $mensaje = "Error al preparar la consulta.";
    }
    
    // Cerrar conexión
    $conexion->close();
    
    // Mostrar mensaje y botón de volver al perfil
    echo "<div style='text-align: center; margin-top: 50px;'>";
    echo "<div style='display: inline-block; padding: 20px;  border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);'>";
    echo "<p style='font-size: 18px; color: black;'>$mensaje</p>";
    echo "<a href='perfil.php' style='display: inline-block; background-color: #d4f4c5; color: black; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; margin-top: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.2);'>Volver al perfil</a>";
    echo "</div>";
    echo "</div>";

} else {
    // Redireccionar si el usuario no está logueado o los datos del formulario no están presentes
    header("Location: inicio_sesion.php");
}
?>
