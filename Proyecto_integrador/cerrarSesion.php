<?php
// Iniciamos sesión
session_start();
// Cerramos la sesion
session_destroy();
// Volver al index
header("Location: index.php");
exit();

?>