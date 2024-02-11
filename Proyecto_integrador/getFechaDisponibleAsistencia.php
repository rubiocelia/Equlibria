<?php require_once("conecta.php");
    $conexion = getConexion();

    // Recuperamos los parámetros de la consulta que recibimos desde el método GET
    $idProfesional = $conexion->real_escape_string($_GET['idAsistente']);
    $fecha = $conexion->real_escape_string($_GET['fechaCita']);

    // Preparar la consulta para evitar inyecciones SQL
    $query = "SELECT citas.id_cita_psicologica FROM cita_psicologica as citas WHERE citas.id_profesionales = ? AND citas.fechas_cita = ?";

    // Crear una sentencia preparada
    if ($stmt = $conexion->prepare($query)) {
        // Vincular parámetros a la sentencia preparada
        $stmt->bind_param("ss", $idProfesional, $fecha); // 'ss' indica que ambos parámetros son strings

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener los resultados
        $result = $stmt->get_result();
        $citas = $result->fetch_all(MYSQLI_ASSOC);

        // Cerrar la sentencia preparada
        $stmt->close();
    } else {
        // Manejar error en la preparación de la consulta
        $horas = [];
    }

    $conexion->close();

    // Devolver horas disponibles como JSON
    header('Content-Type: application/json');
    echo json_encode(['citas' => $citas]);?>