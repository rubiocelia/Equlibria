<?php

require_once("conecta.php");

$conexion = getConexion();

// Iniciamos sesión
session_start();
// Función para recuperar evento reservado
function obtenerEvento($idEvento){
    $conexion = getConexion();
    $queryEventos= "SELECT * FROM eventos WHERE id_evento=$idEvento ORDER BY tipo_evento ASC";
    $consulta = $conexion->query($queryEventos);
    $eventos = $consulta->fetch_assoc();
    $conexion->close();
    return $eventos;
}
// Inicializar variables
$idEvento = $conexion->real_escape_string($_GET['idEvento']);
$eventoReservado=obtenerEvento($idEvento);
$idPacienteLogin;
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

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/reservaEventos.css">
        <link rel="icon" href="img/logo.png" type="image/x-icon">
        <title>Reservar Completada</title>
    </head>
    <body class="reservaEvento">
        <div class="subrayado">
            <h3>¡Apúntate!</h3>
        </div>
        <div class="contenedorForm">
            <form class="formReserva" method="post" action="">
                <div>
                    <p>¡¡Reserva realizada con éxito!!</p>
                    <span>Datos de la reserva: <?php echo $eventoReservado['nombre_evento']. ' || '.$eventoReservado['fechas_evento']. ' || ' .$eventoReservado['precio_evento']; ?></span>
                </div>
                <button class="botonVolver" type="button" name="VolverIndex" onclick="window.location.href='perfil.php';">Ir a mi perfil</button>
            </form>
        </div>
    </body>
</html>