<?php
require_once("conecta.php");

$conexion = getConexion();
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];

$response = ['telefono' => false, 'correo' => false, 'usuario' => false];

// Verificación del teléfono
$result = $conexion->query("SELECT id_pacientes FROM pacientes WHERE telefono_paciente = '$telefono'");
if ($result->num_rows > 0) {
    $response['telefono'] = true;
}

// Verificación del correo
$result = $conexion->query("SELECT id_pacientes FROM pacientes WHERE mail_pacientes = '$correo'");
if ($result->num_rows > 0) {
    $response['correo'] = true;
}

// Verificación del usuario
$result = $conexion->query("SELECT id_pacientes FROM pacientes WHERE usuario_pacientes = '$usuario'");
if ($result->num_rows > 0) {
    $response['usuario'] = true;
}

header('Content-Type: application/json');
echo json_encode($response);
?>