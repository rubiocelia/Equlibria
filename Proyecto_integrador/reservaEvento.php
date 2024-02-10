<!--


SELECT
	'5' as id_profesionales,
    horarios.hora as 'hora_cita'
   /*CASE WHEN (citas.id_cita_psicologica IS NULL) THEN 'Disponible' ELSE 'No Disponible' END AS disponilidad*/
FROM 
	(
        SELECT '17:00' AS 'hora' UNION
        SELECT '18:00' AS 'hora' UNION
        SELECT '19:00' AS 'hora' UNION
        SELECT '20:00' AS 'hora' UNION
        SELECT '21:00' AS 'hora'
    ) as horarios
    LEFT JOIN cita_psicologica as citas ON horarios.hora=citas.hora_cita AND citas.id_profesionales='5' AND citas.fechas_cita='2024-02-11'
WHERE
	citas.id_cita_psicologica IS NULL
-->




<?php

require_once("conecta.php");

$conexion = getConexion();

// Iniciamos sesión
session_start();
// Función para recuperar todos los eventos
function obtenerEventos(){
    $conexion = getConexion();
    $queryEventos= "SELECT * FROM eventos ORDER BY tipo_evento ASC";
    $consulta = $conexion->query($queryEventos);
    $eventos = $consulta->fetch_all(MYSQLI_ASSOC);
    $conexion->close();
    return $eventos;
}

// Inicializar variables
$listaEventos= [];
$listaEventos = obtenerEventos();
// Cuando esten las paginas conectadas quitar la siguiente linea. Se recibira en la llamada de POST.
$idPacienteLogin = 1;

// Verificamos si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idPacienteLogin = $_POST['idPacienteLogin'] ?? '';
    $idEventoSeleccionado = $_POST['evento_seleccionado'] ?? '';
    // Acciones que vamos a realizar cuando el submit que ejecuta el POST es ENVIAR.
    if (isset($_POST['Enviar'])) {
        // Preparamos la sentencia para realizar en insert 
        $sql_insert_reserva_eventos = "INSERT INTO reserva_eventos (id_paciente, id_evento) VALUES (?, ?)";
        $insert = $conexion->prepare($sql_insert_reserva_eventos);
        $insert->bind_param("ii", $idPacienteLogin, $idEventoSeleccionado);
        // Ejecutamos la sentencia preparada
        $insert->execute();
        $insert->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="validacion_reservaEvento.js"></script>
        <title>Crear cuenta - Equilibria</title>
    </head>
    <body class="inicioSesion">
        <div class="subrayadoFormulario">
            <h3>Aprende con nosotr@s</h3>
        </div>
        <div class="containerForm">
            <form class="formInicioSesion" method="post" action="reservaEvento.php">
                <div class="form-row">
                    <div class="form-column">
                        <label for="nombre_paciente">Nombre:</label>
                        <input type="text" id="nombre_paciente" name="nombre_paciente">
                    </div>
                    <div class="form-column">                      
                        <label for="apellidos_paciente">Apellidos:</label>
                        <input type="text" id="apellidos_paciente" name="apellidos_paciente">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-column">
                        <label for="mail_paciente">Correo Electrónico:</label>
                        <input type="email" id="mail_paciente" name="mail_paciente">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-column">
                        <label for="id_evento">Elige tu Curso/Retiro/Taller:</label>
                        <select name="evento_seleccionado" id="evento_seleccionado" required>
                            <?php if (!empty($listaEventos)) : ?>
                                <?php foreach ($listaEventos as $item) : ?>
                                    <option value="<?php echo $item['id_evento']; ?>"><?php echo $item['nombre_evento']. ' || '.$item['fechas_evento']. ' || ' .$item['precio_evento']; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="idPacienteLogin" value="<?php echo $idPacienteLogin; ?>">
                <button type="submit" name="Enviar">Enviar formulario</button>
            </form>
        </div>
    </body>
</html>