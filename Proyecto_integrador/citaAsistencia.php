<?php

require_once("conecta.php");

$conexion = getConexion();

// Iniciamos sesión
session_start();
// Función para recuperar los datos del paciente
function obtenerDatosPaciente($idPaciente){
    $conexion = getConexion();
    $consulta = $conexion->query("SELECT * FROM pacientes WHERE id_pacientes='$idPaciente'");
    $paciente = $consulta->fetch_assoc();
    $conexion->close();
    return $paciente;
}
// Inicializar variables
$listaProfesionales= [];
// Cuando esten las paginas conectadas quitar la siguiente linea. Se recibira en la llamada de POST.
$idPacienteLogin = null;
// Validamos que la sesión este iniciada para seguir con la reserva 
if (isset($_SESSION['idPacienteLogin'])){
    // Como esta se sesion iniciada recuperamos el idPacienteLogin
    $idPacienteLogin= $_SESSION['idPacienteLogin'];
    //session_destroy();
} else {
    // Como no se ha inciado sesión mandamos a la pagina de login
    header("Location: inicio_sesion.php?sendTo=citaAsistencia");
    exit();
}
$datosPaciente = obtenerDatosPaciente($idPacienteLogin);

// Verificamos si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
        <link rel="stylesheet" href="./css/citaAsistencia.css">
        <script src="./js/validacion_citaAsistencia.js"></script>
        <title>Pedir Cita - Equilibria</title>
    </head>
    <body class="citaAsistencia">
        <div class="subrayado">
            <h3>Reserva ahora tu asistencia</h3>
        </div>
        <div class="contenedorForm">
            <form class="formReserva" method="post" action="citaAsistencia.php">
                <!-- Nombre y Apellidos del paciente -->
                <div class="filasFormulario">
                    <div class="columnasForm">
                        <label for="nombre_paciente">Nombre:</label>
                        <input type="text" id="nombre_paciente" name="nombre_paciente" value="<?php echo $datosPaciente['nombre_pacientes']; ?>" disabled>
                    </div>
                    <div class="columnasForm">                      
                        <label for="apellidos_paciente">Apellidos:</label>
                        <input type="text" id="apellidos_paciente" name="apellidos_paciente" value="<?php echo $datosPaciente['apellidos_pacientes']; ?>" disabled>
                    </div>
                </div>
                <!-- Email -->
                <div class="filasFormulario">
                    <div class="columnasForm">
                        <label for="mail_paciente">Correo Electrónico:</label>
                        <input type="email" id="mail_paciente" name="mail_paciente" value="<?php echo $datosPaciente['mail_pacientes']; ?>" disabled>
                    </div>
                </div>
                <!-- Tipo de asistencia -->
                <div class="filasFormulario">
                    <div class="columnasForm">
                        <label for="id_tipoAsistencia">Elige tu tipo de asistencia:</label>
                        <select name="tipoAsistencia" id="tipoAsistencia" required>
                            <option value="" disabled selected></option>
                            <option value="Asistencia a niños">Asistencia a niños</option>
                            <option value="Asistencia a personas mayores">Asistencia a personas mayores</option>
                        </select>
                    </div>
                </div>
                <!-- Seleccionar asistente -->
                <div class="filasFormulario">
                    <div class="columnasForm">
                        <label for="asistente">Elige tu especialista:</label>
                        <select name="id_Asistente" id="id_Asistente" required disabled>
                            <option value="" disabled selected> Pte. de tipo asistencia </option>
                            <!-- Las opciones se llenarán dinámicamente con JavaScript -->
                        </select>
                        <p name="noDisponibles_asistentes" id="noDisponibles_asistentes" hidden> No hay asistentes disponibles </p>
                    </div>
                </div>
                <!-- Seleccionar dia de asistencia -->
                <div class="filasFormulario">
                    <div class="columnasForm">
                        <label for="lab_fecha_cita">Elige el día:</label>
                        <input type="date" name="fecha_cita" id="fecha_cita" required disabled>
                    </div>
                </div>
                <!-- Msj - Fecha no disponible -->
                <div class="filasFormulario">
                    <div class="columnasForm">
                        <p name="noDisponibles_fechaCita" id="noDisponibles_fechaCita" hidden> No hay citas disponibles </p>
                    </div>
                </div>

                <button class="botonform" type="submit" name="btn_Enviar" id="btn_Enviar">Enviar formulario</button>
                <button class="botonVolver" type="button" name="VolverIndex" onclick="window.location.href='index.php';">Volver Inicio</button>
            </form>
        </div>
        <script src="./js/cargarDinamicaAsistencia.js"></script>
    </body>
</html>