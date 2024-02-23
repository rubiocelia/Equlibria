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
$listaProfesionales = obtenerProfesionales();
$listaHorasDisponibles= [];
$idPacienteLogin = null;
// Validamos que la sesión este iniciada para seguir con la reserva 
if (isset($_SESSION['idPacienteLogin'])){
    // Como esta se sesion iniciada recuperamos el idPacienteLogin
    $idPacienteLogin= $_SESSION['idPacienteLogin'];
    //session_destroy();
} else {
    // Como no se ha inciado sesión mandamos a la pagina de login
    header("Location: inicio_sesion.php?sendTo=citaPsicologia");
    exit();
}
$datosPaciente = obtenerDatosPaciente($idPacienteLogin);

// Verificamos si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
        <link rel="stylesheet" href="./css/citaPsicologia.css">
        <script src="./js/validacion_reservaEvento.js"></script>
        <title>Pedir Cita - Equilibria</title>
    </head>
    <body class="citaPsicologia">
        <div class="subrayado">
            <h3>Reserva ahora tu sesión</h3>
        </div>
        <div class="contenedorForm">
            <form class="formReserva" method="post" action="citaPsicologia.php">
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
                
                <div class="filasFormulario">
                    <div class="columnasForm">
                        <label for="mail_paciente">Correo Electrónico:</label>
                        <input type="email" id="mail_paciente" name="mail_paciente" value="<?php echo $datosPaciente['mail_pacientes']; ?>" disabled>
                    </div>
                </div>
                <div class="filasFormulario">
                    <div class="columnasForm">
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
                <div class="filasFormulario">
                    <div class="columnasForm">
                        <label for="fecha_cita">Elige el día:</label>
                        <input type="date" name="fecha_cita" id="fecha_cita" required>
                    </div>
                </div>

                <div class="filasFormulario">
                    <div class="columnasForm">
                        <label for="hora_cita">Elige la hora:</label>
                        <select name="hora_cita" id="hora_cita" required disabled>
                            <!-- Las opciones se llenarán dinámicamente con JavaScript -->
                        </select>
                        <p name="noDisponibles" id="noDisponibles" hidden> No hay horas disponibles </p>
                    </div>
                </div>

                <button class="botonform" type="submit" name="Enviar">Enviar formulario</button>
                <button class="botonVolver" type="button" name="VolverIndex" onclick="window.location.href='index.php';">Volver Inicio</button>
            </form>
        </div>
        <script src="./js/cargarHorasDisponibles.js"></script>
    </body>
</html>