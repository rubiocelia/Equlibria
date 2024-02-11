<?php
session_start(); // Inicia una nueva sesión o reanuda la existente
require_once("conecta.php"); // Asegúrate de tener este archivo para la conexión a la base de datos

$conexion = getConexion(); // Obtiene la conexión a la base de datos

$response = ['success' => false, 'message' => '']; // Prepara una respuesta inicial

// Verifica si los datos del formulario han sido enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario_pacientes']);
    $contrasena = $_POST['contrasena_pacientes'];

    $sql = "SELECT id_pacientes, nombre_pacientes, contrasena_pacientes FROM pacientes WHERE usuario_pacientes = '$usuario'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        if (password_verify($contrasena, $fila['contrasena_pacientes'])) {
            // Inicio de sesión exitoso
            $_SESSION['usuario_id'] = $fila['id_pacientes'];
            $_SESSION['nombre_usuario'] = $fila['nombre_pacientes'];
            $response['success'] = true;
            // Redirección con JavaScript
            echo "<script>alert('Usuario y contraseña correcto'); window.location.href='perfil.html';</script>";
        } else {
            // Contraseña incorrecta
            echo "<script>alert('Contraseña incorrecta'); window.location.href='index.html#loginForm';</script>";
        }
    } else {
        // Usuario no encontrado
        echo "<script>alert('El usuario no existe.'); window.location.href='index.html#loginForm';</script>";
    }
    
    $conexion->close(); // Cierra la conexión a la base de datos
} else {
    $response['message'] = 'Método de solicitud no admitido.';
}
