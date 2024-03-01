<?php

require_once("conecta.php");

$conexion = getConexion();

// Iniciamos sesión
session_start();

// Función para recuperar los datos de la cita creada 
function obtenerDatosCita($idCita){
    $conexion = getConexion();
    $consulta = $conexion->query("SELECT 
            profesionales.nombre_profesionales AS nombre
            ,profesionales.apellidos_profesionales AS apellidos
            ,profesionales.especialidad
            ,cita.fechas_cita AS fechaCita
            ,cita.hora_cita AS horaCita
        FROM 
            cita_psicologica AS cita
            LEFT JOIN profesionales ON cita.id_profesionales=profesionales.id_profesionales
        WHERE 
            cita.id_cita_psicologica=$idCita");
    $cita = $consulta->fetch_assoc();
    $conexion->close();
    return $cita;
}
// Inicializar variables
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
$idCita = $conexion->real_escape_string($_GET['idCita']);
$datosCita= obtenerDatosCita($idCita);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/reservaEventos.css">
        <link rel="icon" href="img/logo.png" type="image/x-icon">
        <title>Cita completada</title>
    </head>
    <body class="reservaEvento">
        <div class="subrayado">
            <h3>Te esperamos</h3>
        </div>
        <div class="contenedorForm">
            <form class="formReserva" method="post" action="">
                <div>
                    <p><strong>Cita registrada con éxito! ✔️</strong></p>
                    <span>📝 Datos de la reserva:</span>
                    <p></p>
                    <span>&emsp;&emsp;Profesional: <?php echo $datosCita['nombre'].' '.$datosCita['apellidos']; ?> </span><br>
                    <span>&emsp;&emsp;Fecha: <?php echo $datosCita['fechaCita']; ?> </span><br>
                    <span>&emsp;&emsp;Hora: <?php echo $datosCita['horaCita']; ?> </span> 
                </div>
                <button class="botonVolver" type="button" name="VolverIndex" onclick="window.location.href='perfil.php';">Ir a mi perfil</button>
            </form>
        </div>
    </body>
</html>