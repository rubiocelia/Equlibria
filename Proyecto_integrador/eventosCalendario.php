<?php
require_once("conecta.php");
$conexion = getConexion();

// Consulta para obtener talleres y cursos
$sql = "SELECT 'Taller' as tipo, nombre_talleres as nombre, fecha_talleres as fecha FROM talleres
        UNION
        SELECT 'Curso' as tipo, nombre_cursos as nombre, fechas_cursos as fecha FROM cursos";

$result = $conexion->query($sql);

$eventos = array();

while ($row = $result->fetch_assoc()) {
    $evento = array(
        'title' =>  $row['nombre'],
        'start' => $row['fecha'],
    );
    array_push($eventos, $evento);
}

echo json_encode($eventos);
$conexion->close();
?>
