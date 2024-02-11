<?php require_once("conecta.php");
    $conexion = getConexion();

    // Recuperamos los parámetros de la consulta que recibimos desde el método GET
    $tipoAsistencia = $conexion->real_escape_string($_GET['tipoAsistencia']);
    // Preparar la consulta para evitar inyecciones SQL
    $query = "SELECT id_profesionales, nombre_profesionales, apellidos_profesionales FROM profesionales WHERE especialidad=? ORDER BY nombre_profesionales ASC";

    // Crear una sentencia preparada
    if ($stmt = $conexion->prepare($query)) {
        // Vincular parámetros a la sentencia preparada
        $stmt->bind_param("s", $tipoAsistencia);
        // Ejecutar la consulta
        $stmt->execute();
        // Obtener los resultados
        $result = $stmt->get_result();
        $profesionales = $result->fetch_all(MYSQLI_ASSOC);

        // Cerrar la sentencia preparada
        $stmt->close();
    } else {
        // Manejar error en la preparación de la consulta
        $profesionales = [];
    }

    $conexion->close();

    // Devolver horas disponibles como JSON
    header('Content-Type: application/json');
    echo json_encode(['profesionales' => $profesionales]);?>