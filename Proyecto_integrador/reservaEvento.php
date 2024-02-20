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
// Función para recuperar los datos del paciente
function obtenerDatosPaciente($idPaciente){
    $conexion = getConexion();
    $consulta = $conexion->query("SELECT * FROM pacientes WHERE id_pacientes='$idPaciente'");
    $paciente = $consulta->fetch_assoc();
    $conexion->close();
    return $paciente;
}
// Inicializar variables
$listaEventos= [];
$listaEventos = obtenerEventos();
$idPacienteLogin = null;

// Validamos que la sesión este iniciada para seguir con la reserva 
if (isset($_SESSION['idPacienteLogin'])){
    // Como esta se sesion iniciada recuperamos el idPacienteLogin
    $idPacienteLogin= $_SESSION['idPacienteLogin'];
    //session_destroy();
} else {
    // Como no se ha inciado sesión mandamos a la pagina de login
    header("Location: inicio_sesion.php?sendTo=reservaEvento");
    exit();
}
$datosPaciente = obtenerDatosPaciente($idPacienteLogin);

// Verificamos si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
        <link rel="stylesheet" href="./css/reservaEventos.css">
        <script src="./js/validacion_reservaEvento.js"></script>
        <title>Reservar - Equilibria</title>
    </head>
    <body class="reservaEvento">
        <div class="subrayado">
            <h3>Aprende con nosotr@s</h3>
        </div>
        <div class="contenedorForm">
            <form class="formReserva" method="post" action="reservaEvento.php">
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
                <button type="submit" name="Enviar">Enviar formulario</button>
                <button type="button" name="VolverIndex" onclick="window.location.href='index.php';">Volver Inicio</button>

            </form>
        </div>
    </body>
</html>