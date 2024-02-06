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
        die("La base de datos 'Equilibria' no existe.");
    }
    return $conexion;
}
?>