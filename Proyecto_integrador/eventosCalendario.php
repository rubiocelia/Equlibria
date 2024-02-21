<?php
// Asegúrate de iniciar la sesión al principio de tu script
session_start();

require_once("conecta.php");
$conexion = getConexion();

// Asumiendo que 'idPacienteLogin' es el ID del paciente en sesión
$idPacienteLogin = isset($_SESSION['idPacienteLogin']) ? $_SESSION['idPacienteLogin'] : null;

if ($idPacienteLogin) {
    // Consulta para obtener los eventos a los que el paciente está inscrito
    $sql = "SELECT e.id_evento, e.nombre_evento, e.descripcion_evento, e.fechas_evento, e.tipo_evento 
            FROM eventos e
            INNER JOIN reserva_eventos re ON e.id_evento = re.id_evento
            WHERE re.id_paciente = ?";

    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("i", $idPacienteLogin);
        $stmt->execute();
        $resultado = $stmt->get_result();

        $eventos = array();
        while ($row = $resultado->fetch_assoc()) {
            // Agrega cada evento a tu array de eventos
            // Puedes ajustar las claves del array según lo necesites para tu calendario
            $eventos[] = array(
                'title' => $row['nombre_evento'],
                'start' => $row['fechas_evento'],
                // Agrega cualquier otra propiedad que necesites
            );
        }
        echo json_encode($eventos); // Devuelve el JSON de eventos

        $stmt->close();
    }
}

$conexion->close();
?>
