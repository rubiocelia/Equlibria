<?php

require_once("conecta.php");

$conexion = getConexion();

// Iniciamos sesión
session_start();

// Inicializar variables
$listaProfesionales= [];
// Cuando esten las paginas conectadas quitar la siguiente linea. Se recibira en la llamada de POST.
$idPacienteLogin = 1;

// Verificamos si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idPacienteLogin = $_POST['idPacienteLogin'] ?? '';
    $id_profesional = $_POST['id_Asistente'] ?? '';
    $fecha_cita = $_POST['fecha_cita'] ?? '';
    // Acciones que vamos a realizar cuando el submit que ejecuta el POST es ENVIAR.
    if (isset($_POST['btn_Enviar'])) {
        // Preparamos la sentencia para realizar en insert 
        $sql_insert = "INSERT INTO cita_psicologica (fechas_cita, id_pacientes, id_profesionales) VALUES (?, ?, ?)";
        $insert = $conexion->prepare($sql_insert);
        $insert->bind_param("sii", $fecha_cita, $idPacienteLogin, $id_profesional);
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
        <script src="validacion_citaAsistencia.js"></script>
        <title>Pedir Cita - Equilibria</title>
    </head>
    <body class="citaAsistencia">
        <div class="subrayadoFormulario">
            <h3>Reserva ahora tu asistencia</h3>
        </div>
        <div class="containerForm">
            <form class="formInicioSesion" method="post" action="citaAsistencia.php">
                <!-- Nombre y Apellidos del paciente -->
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
                <!-- Email del paciente -->
                <div class="form-row">
                    <div class="form-column">
                        <label for="mail_paciente">Correo Electrónico:</label>
                        <input type="email" id="mail_paciente" name="mail_paciente">
                    </div>
                </div>
                <!-- Tipo de asistencia -->
                <div class="form-row">
                    <div class="form-column">
                        <label for="id_tipoAsistencia">Elige tu tipo de asistencia:</label>
                        <select name="tipoAsistencia" id="tipoAsistencia" required>
                            <option value="" disabled selected></option>
                            <option value="Asistencia a niños">Asistencia a niños</option>
                            <option value="Asistencia a personas mayores">Asistencia a personas mayores</option>
                        </select>
                    </div>
                </div>
                <!-- Seleccionar asistente -->
                <div class="form-row">
                    <div class="form-column">
                        <label for="asistente">Elige tu especialista:</label>
                        <select name="id_Asistente" id="id_Asistente" required disabled>
                            <option value="" disabled selected> Pte. de tipo asistencia </option>
                            <!-- Las opciones se llenarán dinámicamente con JavaScript -->
                        </select>
                        <p name="noDisponibles_asistentes" id="noDisponibles_asistentes" hidden> No hay asistentes disponibles </p>
                    </div>
                </div>
                <!-- Seleccionar dia de asistencia -->
                <div class="form-row">
                    <div class="form-column">
                        <label for="lab_fecha_cita">Elige el día:</label>
                        <input type="date" name="fecha_cita" id="fecha_cita" required disabled>
                    </div>
                </div>
                <!-- Msj - Fecha no disponible -->
                <div class="form-row">
                    <div class="form-column">
                        <p name="noDisponibles_fechaCita" id="noDisponibles_fechaCita" hidden> No hay citas disponibles </p>
                    </div>
                </div>

                <input type="hidden" name="idPacienteLogin" value="<?php echo $idPacienteLogin; ?>">
                <button type="submit" name="btn_Enviar" id="btn_Enviar">Enviar formulario</button>
            </form>
        </div>
        <script src="cargarDinamicaAsistencia.js"></script>
    </body>
</html>