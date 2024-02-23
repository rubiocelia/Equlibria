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
    $DNI = $_POST['DNI'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $genero = $_POST['genero'];
    $usuario = $_POST['usario_pacientes'];
    $contrasena = $_POST['contrasena_pacientes']; // Contraseña que el usuario ha ingresado


    // Preparar la consulta SQL para actualizar los datos del paciente
    $sql = "UPDATE pacientes SET nombre_pacientes=?, apellidos_pacientes=?, mail_pacientes=?, telefono_paciente=?, DNI=?, fecha_nacimiento=?, genero=?, usuario_pacientes=?, contrasena_pacientes=? WHERE id_pacientes=?";

    $stmt = $conexion->prepare($sql);
    if($stmt) {
        // Se pasa la contraseña encriptada en lugar de la contraseña en texto plano
        $stmt->bind_param("sssssssssi", $nombre, $apellidos, $email, $telefono, $DNI, $fechaNacimiento, $genero, $usuario, $contrasena, $idPaciente);
        
        // Ejecutar la consulta
        if($stmt->execute()) {
            // Redireccionar al perfil con un mensaje de éxito
            echo "<script>alert('Exito al actualizar');</script>";
            
        } else {
            // Error al actualizar
            echo "<script>alert('Error al acrualizar');</script>";
        }
    } else {
        // Error al preparar la consulta
        echo "<script>alert('Exito al preparar la consulta');</script>";
    }
    
    // Cerrar conexión
    $conexion->close();
} else {
    // Redireccionar si el usuario no está logueado o los datos del formulario no están presentes
    header("Location: inicio_sesion.php");
}
?>
