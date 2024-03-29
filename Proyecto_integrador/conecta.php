<?php
function getConexion() {
    $host = "localhost";
    $usuario = "root";
    $contrasena = "";

    // Realizamos la conexión a MySQL server
    $conexion = new mysqli($host, $usuario, $contrasena);
    // Validamos que la conexión haya salido como esperamos
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Comprobamos si existe la BBDD "Equilibria"
    $verificarBD = $conexion->query("SHOW DATABASES LIKE 'Equilibria'");
    if ($verificarBD->num_rows > 0) {
        // Conectamos con la BBDD
        $conexion->select_db("Equilibria");
    } else {
        if (!$conexion->query("CREATE DATABASE Equilibria")) {
            die("Error al crear la base de datos: " . $conexion->error);
        }
        //agrega la conexión a la base de datos
        $conexion->select_db("Equilibria");
    }
    return $conexion;
}
?>