<?php
require_once("conecta.php");

$conexion = getConexion();

//fución para crear las tablas y bbdd
function crearTablas($conexion) {
    
    // Verificar si la base de datos existe
    $verificarBD = $conexion->query("SHOW DATABASES LIKE 'Equilibria'");
    if ($verificarBD->num_rows <= 0) {
        // Crear la base de datos si no existe
        if (!$conexion->query("CREATE DATABASE Equilibria")) {
            die("Error al crear la base de datos: " . $conexion->error);
        }

        //agrega la conexión a la base de datos
        $conexion->select_db("Equilibria");
    }
}

// Creamos tablas si no existen
$sql_pacientes = "CREATE TABLE IF NOT EXISTS pacientes (
    id_pacientes INT AUTO_INCREMENT PRIMARY KEY,
    DNI VARCHAR(255) NOT NULL,
    nombre_pacientes VARCHAR(255) NOT NULL,
    usuario_pacientes VARCHAR(255) NOT NULL,
    apellidos_pacientes VARCHAR(255) NOT NULL,
    contrasena_pacientes VARCHAR(255) NOT NULL,
    telefono_paciente VARCHAR(255) NOT NULL,
    mail_pacientes VARCHAR(255) NOT NULL,
    genero VARCHAR(10) NOT NULL,
    fecha_nacimiento DATE NOT NULL
)";

$sql_profesionales = "CREATE TABLE IF NOT EXISTS profesionales (
    id_profesionales INT AUTO_INCREMENT PRIMARY KEY,
    nombre_profesionales VARCHAR(255) NOT NULL,
    apellidos_profesionales VARCHAR(255) NOT NULL,
    telefono_profesionales INT(255) NOT NULL,
    experiencia TEXT,
    especialidad VARCHAR(255) NOT NULL
)";

$sql_talleres = "CREATE TABLE IF NOT EXISTS talleres (
    id_talleres INT AUTO_INCREMENT PRIMARY KEY,
    pacientes_apuntados VARCHAR(255) NOT NULL,
    nombre_talleres VARCHAR(255) NOT NULL,
    descripcion_talleres TEXT,
    precio_talleres VARCHAR(10) NOT NULL,
    fecha_talleres DATE NOT NULL,
    instructor_talleres VARCHAR(255) NOT NULL
)";

$sql_cursos = "CREATE TABLE IF NOT EXISTS cursos (
    id_cursos INT AUTO_INCREMENT PRIMARY KEY,
    pacientes_apuntados VARCHAR(255) NOT NULL,
    nombre_cursos VARCHAR(255) NOT NULL,
    descripcion_cursos TEXT,
    precio_cursos VARCHAR(10) NOT NULL,
    fechas_cursos DATE NOT NULL,
    instructor_cursos VARCHAR(255) NOT NULL
)";

$sql_retiros = "CREATE TABLE IF NOT EXISTS retiros (
    id_retiros INT AUTO_INCREMENT PRIMARY KEY,
    pacientes_apuntados VARCHAR(255) NOT NULL,
    nombre_retiros VARCHAR(255) NOT NULL,
    descripcion_retiros TEXT,
    precio_retiros VARCHAR(10) NOT NULL,
    fechas_retiros DATE NOT NULL,
    instructor_retiros VARCHAR(255) NOT NULL
)";

$sql_cita_psicologica = "CREATE TABLE IF NOT EXISTS cita_psicologica (
    id_cita_psicologica INT AUTO_INCREMENT PRIMARY KEY,
    fechas_cita DATE NOT NULL,
    hora_cita VARCHAR(255) NOT NULL,
    id_pacientes INT NOT NULL,
    id_profesionales INT NOT NULL,
    FOREIGN KEY (id_pacientes) REFERENCES pacientes(id_pacientes),
    FOREIGN KEY (id_profesionales) REFERENCES profesionales(id_profesionales)
)";

$sql_reserva_cursos = "CREATE TABLE IF NOT EXISTS reserva_cursos (
    id_reserva_cursos INT AUTO_INCREMENT PRIMARY KEY,
    id_pacientes INT NOT NULL,
    id_cursos INT NOT NULL,
    FOREIGN KEY (id_pacientes) REFERENCES pacientes(id_pacientes),
    FOREIGN KEY (id_cursos) REFERENCES cursos(id_cursos)
)";

$sql_reserva_talleres = "CREATE TABLE IF NOT EXISTS reserva_talleres (
    id_reserva_talleres INT AUTO_INCREMENT PRIMARY KEY,
    id_pacientes INT NOT NULL,
    id_talleres INT NOT NULL,
    FOREIGN KEY (id_pacientes) REFERENCES pacientes(id_pacientes),
    FOREIGN KEY (id_talleres) REFERENCES talleres(id_talleres)
)";

$sql_reserva_retiros = "CREATE TABLE IF NOT EXISTS reserva_retiros (
    id_reserva_retiros INT AUTO_INCREMENT PRIMARY KEY,
    id_pacientes INT NOT NULL,
    id_retiros INT NOT NULL,
    FOREIGN KEY (id_pacientes) REFERENCES pacientes(id_pacientes),
    FOREIGN KEY (id_retiros) REFERENCES retiros(id_retiros)
)";

// Ejecutamos consultas

if ($conexion->query($sql_pacientes) === TRUE) {
    echo "Tabla 'pacientes' creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'pacientes': " . $conexion->error . "<br>";
}

if ($conexion->query($sql_profesionales) === TRUE) {
    echo "Tabla 'profesionales' creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'profesionales': " . $conexion->error . "<br>";
}

if ($conexion->query($sql_talleres) === TRUE) {
    echo "Tabla 'talleres' creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'talleres': " . $conexion->error . "<br>";
}

if ($conexion->query($sql_cursos) === TRUE) {
    echo "Tabla 'cursos' creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'cursos': " . $conexion->error . "<br>";
}

if ($conexion->query($sql_retiros) === TRUE) {
    echo "Tabla 'retiros' creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'pacientes': " . $conexion->error . "<br>";
}

if ($conexion->query($sql_cita_psicologica) === TRUE) {
    echo "Tabla 'cita psicológica' creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'profesionales': " . $conexion->error . "<br>";
}

if ($conexion->query($sql_reserva_talleres) === TRUE) {
    echo "Tabla 'reserva talleres' creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'reserva talleres': " . $conexion->error . "<br>";
}

if ($conexion->query($sql_reserva_cursos) === TRUE) {
    echo "Tabla 'reserva cursos' creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'reserva cursos': " . $conexion->error . "<br>";
}

if ($conexion->query($sql_reserva_retiros) === TRUE) {
    echo "Tabla 'reserva retiros' creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'reserva retiros': " . $conexion->error . "<br>";
}

// Insertamos datos iniciales

$sql_insert_profesionales = "INSERT INTO profesionales (nombre_profesionales, apellidos_profesionales, telefono_profesionales, especialidad) VALUES
    ('Mara', 'Sánchez Moreno', '689321579', 'Psicólogo'),
    ('Sofía', 'Sepúlveda Rivera', '648931586','Asistente de personas mayores'),
    ('Martín', 'Cañadas Carriedo', '6078203648', 'Asistente de personas mayores'),
    ('Fernando', 'Rodríguez Bellido', '689321579', 'Asistente de niños'),
    ('Ana', 'Gómez Rodríguez', ' 648931586','Psicóloga'),
    ('Beatriz', 'Rodrigo Marquínez', '6078203648', 'Asistente de niños')";

$sql_insert_pacientes = "INSERT INTO pacientes (DNI, nombre_pacientes, apellidos_pacientes, telefono_paciente, genero, fecha_nacimiento, usuario_pacientes, contrasena_pacientes) VALUES
    ('45735844S', 'Laura', 'Escanes Villar', '623456789', 'F', '1995-04-05', 'lauraescanes', 'Laura95'),
    ('15430654P', 'Ana', 'Herrero Sánchez', '687654321', 'F', '1994-03-16', 'anaherrero' , 'AnaH1994'),
    ('52633694M', 'Humberto', 'Fernández Serrano', '656789123', 'M', '1943-08-07', 'humbertofernandez', 'Humberto43'),
    ('95535844S', 'Mario', 'Fernández García', '654341495', 'M', '1999-06-05', 'mariofernandez', 'Mario99'),
    ('25430654P', 'David', 'Del Pino Romero', '687654321', 'F', '1994-03-16', 'daviddelpino', 'David94'),
    ('54633698M', 'Daniel', 'Herrero Martínez', '628196324', 'M', '1989-08-07', 'danielherrero', 'Daniel89')";

$sql_insert_talleres = "INSERT INTO talleres (nombre_talleres, descripcion_talleres, fecha_talleres, precio_talleres, instructor_talleres) VALUES
    ('Taller de autoestima', 'Aprenderás sobre autoestima', '2024-02-20', '60,00€', 'Amelia'),
    ('Taller mejora tus habiladades sociales', 'Aprenderás a mejorar tus habilidades sociales', '2024-03-09', '50,00€', 'Aaron'),
    ('Taller de gestion de la ansiedad', 'Aprederás a gestionar la ansiedad', '2024-05-04', '30,00€', 'Celia'),
    ('Taller autoexigencia y perfeccionismo', 'Aprederás sobre autoexigencia y perfeccionismo', '2024-01-09', '70,00€', 'Elena')"; 

$sql_insert_cursos = "INSERT INTO cursos (nombre_cursos, descripcion_cursos, fechas_cursos, precio_cursos, instructor_cursos) VALUES
    ('Curso de autoestima', 'Aprende a gestionar tu autoestima', '2024-04-01', '40,00€', 'Javier'),
    ('Curso de dependencia emocional', 'Aprende a saber llevar tu dependencia emocional', '2024-02-08', '80,00€', 'Juan'),
    ('Curos de ansiedad online', 'Aprende a gestionar tu ansiedad', '2024-03-17', '45,00€', 'Alejandro'),
    ('Curso para parejas', 'Curso específico de parejas', '2024-07-12', '60,00€', 'Álvaro')";

$sql_insert_retiros = "INSERT INTO retiros (nombre_retiros, descripcion_retiros, fechas_retiros, precio_retiros, instructor_retiros) VALUES
    ('Retiros de verano', 'Retiros de verano', '2024-04-21', '40,00€', 'Lucca'),
    ('Retiros de verano', 'Retiros de invierno', '2024-02-28', '80,00€', 'Ismael')";

$sql_insert_reserva_talleres = "INSERT INTO reserva_talleres (id_pacientes, id_talleres) VALUES
    ('3', '2'),
    ('4', '2'),
    ('6', '2'),
    ('1', '4'),
    ('2', '4')";

$sql_insert_reserva_cursos = "INSERT INTO reserva_cursos (id_pacientes, id_cursos) VALUES
    ('2', '4'),
    ('6', '4'),
    ('2', '2'),
    ('5', '2'),
    ('1', '3'),
    ('6', '3')";

$sql_insert_reserva_retiros = "INSERT INTO reserva_retiros (id_pacientes, id_retiros) VALUES
    ('3', '1'),
    ('5', '1'),
    ('1', '1'),
    ('2', '1'),
    ('4', '2'),
    ('6', '2')";

$sql_insert_cita_psicologica = "INSERT INTO cita_psicologica (id_pacientes, id_profesionales) VALUES
    ('1', '1'),
    ('3', '5'),
    ('4', '5'),
    ('2', '1'),
    ('6', '1')";

if ($conexion->query($sql_insert_profesionales) === TRUE) {
    echo "Datos iniciales de profesionales insertados con éxito.<br>";
} else {
    echo "Error al insertar datos iniciales de profesionales: " . $conexion->error . "<br>";
}

if ($conexion->query($sql_insert_talleres) === TRUE) {
    echo "Datos iniciales de talleres insertados con éxito.<br>";
} else {
    echo "Error al insertar datos iniciales de talleres: " . $conexion->error . "<br>";
}

if ($conexion->query($sql_insert_pacientes) === TRUE) {
    echo "Datos iniciales de pacientes insertados con éxito.<br>";
} else {
    echo "Error al insertar datos iniciales de pacientes: " . $conexion->error . "<br>";
}

if ($conexion->query($sql_insert_cursos) === TRUE) {
    echo "Datos iniciales de cursos insertados con éxito.<br>";
} else {
    echo "Error al insertar datos iniciales de cursos: " . $conexion->error . "<br>";
}

if ($conexion->query($sql_insert_retiros) === TRUE) {
    echo "Datos iniciales de retiros insertados con éxito.<br>";
} else {
    echo "Error al insertar datos iniciales de retiros: " . $conexion->error . "<br>";
}

if ($conexion->query($sql_insert_cita_psicologica) === TRUE) {
    echo "Datos iniciales de cita psicológica insertados con éxito.<br>";
} else {
    echo "Error al insertar datos iniciales de cita psicológica: " . $conexion->error . "<br>";
}

if ($conexion->query($sql_insert_reserva_cursos) === TRUE) {
    echo "Datos iniciales de reserva cursos insertados con éxito.<br>";
} else {
    echo "Error al insertar datos iniciales de reserva cursos: " . $conexion->error . "<br>";
}

if ($conexion->query($sql_insert_reserva_retiros) === TRUE) {
    echo "Datos iniciales de reserva retiros insertados con éxito.<br>";
} else {
    echo "Error al insertar datos iniciales de reserva retiros: " . $conexion->error . "<br>";
}

if ($conexion->query($sql_insert_reserva_talleres) === TRUE) {
    echo "Datos iniciales de reserva talleres insertados con éxito.<br>";
} else {
    echo "Error al insertar datos iniciales de reserva talleres: " . $conexion->error . "<br>";
}

// Cerramos conexión
mysqli_close($conexion);
?>