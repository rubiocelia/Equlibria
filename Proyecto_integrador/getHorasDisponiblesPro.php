<?php require_once("conecta.php");
    $conexion = getConexion();

    // Recuperamos los parámetros de la consulta que recibimos desde el método GET
    $idProfesional = $conexion->real_escape_string($_GET['profesional_seleccionado']);
    $fecha = $conexion->real_escape_string($_GET['fecha']);

    // Preparar la consulta para evitar inyecciones SQL
    $query = "SELECT horarios.hora as 'hora_cita'
              FROM (
                SELECT '17:00' AS 'hora' UNION
                SELECT '18:00' AS 'hora' UNION
                SELECT '19:00' AS 'hora' UNION
                SELECT '20:00' AS 'hora' UNION
                SELECT '21:00' AS 'hora'
              ) as horarios
              LEFT JOIN cita_psicologica as citas
              ON horarios.hora = citas.hora_cita
              AND citas.id_profesionales = ?
              AND citas.fechas_cita = ?
              WHERE citas.id_cita_psicologica IS NULL";

    // Crear una sentencia preparada
    if ($stmt = $conexion->prepare($query)) {
        // Vincular parámetros a la sentencia preparada
        $stmt->bind_param("ss", $idProfesional, $fecha); // 'ss' indica que ambos parámetros son strings

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener los resultados
        $result = $stmt->get_result();
        $horas = $result->fetch_all(MYSQLI_ASSOC);

        // Cerrar la sentencia preparada
        $stmt->close();
    } else {
        // Manejar error en la preparación de la consulta
        $horas = [];
    }

    $conexion->close();

    // Devolver horas disponibles como JSON
    header('Content-Type: application/json');
    echo json_encode(['horasDisponibles' => $horas]);?>