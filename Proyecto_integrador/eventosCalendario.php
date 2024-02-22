<?php
// Asegúrate de iniciar la sesión al principio de tu script
session_start();

require_once("conecta.php");
$conexion = getConexion();

// Asumiendo que 'idPacienteLogin' es el ID del paciente en sesión
$idPacienteLogin = isset($_SESSION['idPacienteLogin']) ? $_SESSION['idPacienteLogin'] : null;

if ($idPacienteLogin) {
    // Consulta combinada para obtener los eventos y citas psicológicas
    $sql = "(SELECT e.id_evento AS id, e.nombre_evento AS title, e.fechas_evento AS start, 'Evento' AS tipo
             FROM eventos e
             INNER JOIN reserva_eventos re ON e.id_evento = re.id_evento
             WHERE re.id_paciente = ?)
            UNION
            (SELECT cp.id_cita_psicologica AS id, CONCAT('Cita con ', p.nombre_profesionales, ' ', p.apellidos_profesionales) AS title, cp.fechas_cita AS start, 'Cita' AS tipo
             FROM cita_psicologica cp
             INNER JOIN profesionales p ON cp.id_profesionales = p.id_profesionales
             WHERE cp.id_pacientes = ?)
            ORDER BY start";

    if ($stmt = $conexion->prepare($sql)) {
        // Bind the same patient ID twice because it's used in both parts of the UNION query
        $stmt->bind_param("ii", $idPacienteLogin, $idPacienteLogin);
        $stmt->execute();
        $resultado = $stmt->get_result();

        $eventosYCitas = array();
        while ($row = $resultado->fetch_assoc()) {
            // Agrega cada evento o cita al arreglo, ajustando las claves según necesites
            $eventosYCitas[] = array(
                'id' => $row['id'],
                'title' => $row['title'],
                'start' => $row['start'],
                'tipo' => $row['tipo'] // Esta línea es opcional, si deseas diferenciar entre tipos en el cliente
            );
        }
        echo json_encode($eventosYCitas); // Devuelve el JSON de eventos y citas

        $stmt->close();
    }
}

$conexion->close();
?>
