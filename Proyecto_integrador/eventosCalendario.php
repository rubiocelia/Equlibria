<?php
session_start();

require_once("conecta.php");
$conexion = getConexion();

$idPacienteLogin = isset($_SESSION['idPacienteLogin']) ? $_SESSION['idPacienteLogin'] : null;

if ($idPacienteLogin) {
    $sql = "(SELECT e.id_evento AS id, e.nombre_evento AS title, e.fechas_evento AS start, 'Evento' AS tipo
         FROM eventos e
         INNER JOIN reserva_eventos re ON e.id_evento = re.id_evento
         WHERE re.id_paciente = ?)
        UNION
        (SELECT cp.id_cita_psicologica AS id, 
         IF(cp.hora_cita IS NULL, CONCAT('Asistencia a domicilio con: ', p.nombre_profesionales, ' ', p.apellidos_profesionales), CONCAT('Cita psicológica con ', p.nombre_profesionales, ' ', p.apellidos_profesionales)) AS title, 
         IF(cp.hora_cita IS NULL, DATE_FORMAT(cp.fechas_cita, '%Y-%m-%d'), CONCAT(DATE_FORMAT(cp.fechas_cita, '%Y-%m-%d'), ' ', cp.hora_cita)) AS start, 
         IF(cp.hora_cita IS NULL, 'Asistencia domiciliaria', 'Cita') AS tipo
         FROM cita_psicologica cp
         INNER JOIN profesionales p ON cp.id_profesionales = p.id_profesionales
         WHERE cp.id_pacientes = ?)
        ORDER BY start";

    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("ii", $idPacienteLogin, $idPacienteLogin);
        $stmt->execute();
        $resultado = $stmt->get_result();

        $eventosYCitas = array();
        while ($row = $resultado->fetch_assoc()) {
            if ($row['tipo'] == 'Cita') {
                // Solo para citas psicológicas, formatea la hora y la fecha
                $fechaHora = new DateTime($row['start']);
                $formatoFechaHora = $fechaHora->format('H:i'); // Extrae solo la hora y minutos
                $tituloFormateado = $formatoFechaHora . ' - ' . $row['title'];
            } else {
                // Para eventos, usa el título tal cual
                $tituloFormateado = $row['title'];
            }

            // Agrega el evento o cita al arreglo con el formato adecuado
            $eventosYCitas[] = array(
                'id' => $row['id'],
                'title' => $tituloFormateado,
                'start' => $row['start']
            );
        }
        echo json_encode($eventosYCitas);

        $stmt->close();
    }
}

$conexion->close();
?>
