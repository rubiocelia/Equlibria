<?php

require_once("conecta.php");

$conexion = getConexion();

// Iniciamos sesión
session_start();
// Función para recuperar los posibles psicolog@s existentes
function obtenerProfesionales() { 
    $conexion = getConexion();
    $queryProfesionales = "SELECT id_profesionales, nombre_profesionales, apellidos_profesionales FROM profesionales WHERE especialidad='Psicologia' ORDER BY nombre_profesionales ASC";
    $consulta = $conexion->query($queryProfesionales);
    $profesionales = $consulta->fetch_all(MYSQLI_ASSOC);
    $conexion->close();
    return $profesionales;
}
// Inicializar variables
$listaProfesionales= [];
$listaProfesionales = obtenerProfesionales();
$listaHorasDisponibles= [];
// Cuando esten las paginas conectadas quitar la siguiente linea. Se recibira en la llamada de POST.
$idPacienteLogin = 1;

// Verificamos si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idPacienteLogin = $_POST['idPacienteLogin'] ?? '';
    $id_profesional = $_POST['profesional_seleccionado'] ?? '';
    $fecha_cita = $_POST['fecha_cita'] ?? '';
    $hora_cita = $_POST['hora_cita'] ?? '';
    // Acciones que vamos a realizar cuando el submit que ejecuta el POST es ENVIAR.
    if (isset($_POST['Enviar'])) {
        // Preparamos la sentencia para realizar en insert 
        $sql_insert = "INSERT INTO cita_psicologica (fechas_cita, hora_cita, id_pacientes, id_profesionales) VALUES (?, ?, ?, ?)";
        $insert = $conexion->prepare($sql_insert);
        $insert->bind_param("ssii", $fecha_cita, $hora_cita, $idPacienteLogin, $id_profesional);
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
        <title>Pedir Cita - Equilibria</title>
    </head>
    <body class="citaAsistencia">
        <div class="subrayadoFormulario">
            <h3>Reserva ahora tu sesión</h3>
        </div>
        <div class="containerForm">
            <form class="formInicioSesion" method="post" action="citaPsicologia.php">
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
                        <label for="id_Profesional">Elige tu Psicólog@:</label>
                        <select name="profesional_seleccionado" id="profesional_seleccionado" required>
                            <?php if (!empty($listaProfesionales)) : ?>
                                <?php foreach ($listaProfesionales as $item) : ?>
                                    <option value="<?php echo $item['id_profesionales']; ?>"><?php echo $item['nombre_profesionales']. ' '.$item['apellidos_profesionales']; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-column">
                        <label for="fecha_cita">Elige el día:</label>
                        <input type="date" name="fecha_cita" id="fecha_cita" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-column">
                        <label for="hora_cita">Elige la hora:</label>
                        <select name="hora_cita" id="hora_cita" required disabled>
                            <!-- Las opciones se llenarán dinámicamente con JavaScript -->
                        </select>
                        <p name="noDisponibles" id="noDisponibles" hidden> No hay horas disponibles </p>
                    </div>
                </div>

                <input type="hidden" name="idPacienteLogin" value="<?php echo $idPacienteLogin; ?>">
                <button type="submit" name="Enviar">Enviar formulario</button>
            </form>
        </div>
        <script src="cargarHorasDisponibles.js"></script>
    </body>
</html>