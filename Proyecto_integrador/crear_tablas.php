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
    } else {
        $conexion->query("DROP DATABASE Equilibria");
        $conexion->query("CREATE DATABASE Equilibria");
        $conexion->select_db("Equilibria");
    }
}
crearTablas($conexion);
// Creamos tablas si no existen
$sql_pacientes = "CREATE TABLE IF NOT EXISTS pacientes (
    id_pacientes INT AUTO_INCREMENT PRIMARY KEY,
    
    nombre_pacientes VARCHAR(255) NOT NULL,
    usuario_pacientes VARCHAR(255) NOT NULL,
    apellidos_pacientes VARCHAR(255) NOT NULL,
    contrasena_pacientes VARCHAR(255) NOT NULL,
    telefono_paciente VARCHAR(255) NOT NULL,
    mail_pacientes VARCHAR(255) NULL,
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



$sql_eventos = "CREATE TABLE IF NOT EXISTS eventos (
    id_evento INT AUTO_INCREMENT PRIMARY KEY,
    nombre_evento VARCHAR(255) NOT NULL,
    descripcion_evento TEXT,
    precio_evento VARCHAR(10) NOT NULL,
    fechas_evento DATE NOT NULL,
    instructor_evento VARCHAR(255) NOT NULL,
    tipo_evento VARCHAR(255) NOT NULL
)";

$sql_cita_psicologica = "CREATE TABLE IF NOT EXISTS cita_psicologica (
    id_cita_psicologica INT AUTO_INCREMENT PRIMARY KEY,
    fechas_cita DATE NULL,
    hora_cita VARCHAR(255)  NULL,
    id_pacientes INT NOT NULL,
    id_profesionales INT NOT NULL,
    FOREIGN KEY (id_pacientes) REFERENCES pacientes(id_pacientes),
    FOREIGN KEY (id_profesionales) REFERENCES profesionales(id_profesionales)
)";



$sql_reserva_evento = "CREATE TABLE IF NOT EXISTS reserva_eventos (
    id_reserva_evento INT AUTO_INCREMENT PRIMARY KEY,
    id_paciente INT NOT NULL,
    id_evento INT NOT NULL,
    FOREIGN KEY (id_paciente) REFERENCES pacientes(id_pacientes),
    FOREIGN KEY (id_evento) REFERENCES eventos(id_evento)
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



if ($conexion->query($sql_eventos) === TRUE) {
    echo "Tabla 'eventos' creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'eventos': " . $conexion->error . "<br>";
}

if ($conexion->query($sql_cita_psicologica) === TRUE) {
    echo "Tabla 'cita psicológica' creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'profesionales': " . $conexion->error . "<br>";
}

if ($conexion->query($sql_reserva_evento) === TRUE) {
    echo "Tabla 'reserva evento' creada con éxito.<br>";
} else {
    echo "Error al crear la tabla 'reserva evento': " . $conexion->error . "<br>";
}

// Insertamos datos iniciales

$sql_insert_profesionales = "INSERT INTO profesionales (nombre_profesionales, apellidos_profesionales, telefono_profesionales, especialidad) VALUES
    ('Mara', 'Sánchez Moreno', '689321579', 'Psicologia'),
    ('Sofía', 'Sepúlveda Rivera', '648931586','Asistencia a personas mayores'),
    ('Martín', 'Cañadas Carriedo', '647553056', 'Asistencia a personas mayores'),
    ('Fernando', 'Rodríguez Bellido', '689321579', 'Asistencia a niños'),
    ('Ana', 'Gómez Rodríguez', ' 648931586','Psicologia'),
    ('Beatriz', 'Rodrigo Marquínez', '647553057', 'Asistencia a niños')";

$sql_insert_pacientes = "INSERT INTO pacientes (nombre_pacientes, apellidos_pacientes, telefono_paciente, genero, fecha_nacimiento, usuario_pacientes, contrasena_pacientes, mail_pacientes) VALUES
    ('Laura', 'Escanes Villar', '623456789', 'F', '1995-04-05', 'lauraescanes', 'Laura95', 'lauraescanes@gmail.com'),
    ('Ana', 'Herrero Sánchez', '687654321', 'F', '1994-03-16', 'anaherrero' , 'AnaH1994', 'anaherrero@gmail.com'),
    ('Humberto', 'Fernández Serrano', '656789123', 'M', '1943-08-07', 'humbertofernandez', 'Humberto43', 'humbertofernandez@hotmail.com'),
    ('Mario', 'Fernández García', '654341495', 'M', '1999-06-05', 'mariofernandez', 'Mario99', 'mariofernandez@gmail.com'),
    ('David', 'Del Pino Romero', '687654321', 'F', '1994-03-16', 'daviddelpino', 'David94', 'daviddelpino@gmail.com'),
    ('Daniel', 'Herrero Martínez', '628196324', 'M', '1989-08-07', 'danielherrero', 'Daniel89', 'danielherrero@gmail.com')";



$sql_insert_eventos = "INSERT INTO eventos (nombre_evento, descripcion_evento, fechas_evento, precio_evento, instructor_evento, tipo_evento) VALUES
    ('Taller de autoestima', 'Aprenderás sobre autoestima', '2024-02-20', '60,00€', 'Amelia','Taller'),
    ('Taller de autoestima', 'Aprenderás sobre autoestima', '2024-03-15', '60,00€', 'Amelia','Taller'),
    ('Taller mejora tus habiladades sociales', 'Aprenderás a mejorar tus habilidades sociales', '2024-03-09', '50,00€', 'Aaron','Taller'),
    ('Taller mejora tus habiladades sociales', 'Aprenderás a mejorar tus habilidades sociales', '2024-05-10', '50,00€', 'Aaron','Taller'),
    ('Taller de gestion de la ansiedad', 'Aprederás a gestionar la ansiedad', '2024-05-04', '30,00€', 'Celia','Taller'),
    ('Taller de gestion de la ansiedad', 'Aprederás a gestionar la ansiedad', '2024-08-21', '30,00€', 'Celia','Taller'),
    ('Taller autoexigencia y perfeccionismo', 'Aprederás sobre autoexigencia y perfeccionismo', '2024-01-09', '70,00€', 'Elena','Taller'),
    ('Taller autoexigencia y perfeccionismo', 'Aprederás sobre autoexigencia y perfeccionismo', '2025-01-09', '70,00€', 'Elena','Taller'),
    ('Curso de autoestima', 'Aprende a gestionar tu autoestima', '2024-04-01', '40,00€', 'Javier','Curso'),
    ('Curso de autoestima', 'Aprende a gestionar tu autoestima', '2025-02-10', '40,00€', 'Javier','Curso'),
    ('Curso de dependencia emocional', 'Aprende a saber llevar tu dependencia emocional', '2024-02-08', '80,00€', 'Juan','Curso'),
    ('Curso de dependencia emocional', 'Aprende a saber llevar tu dependencia emocional', '2024-12-11', '80,00€', 'Juan','Curso'),
    ('Curos de ansiedad online', 'Aprende a gestionar tu ansiedad', '2024-03-17', '45,00€', 'Alejandro','Curso'),
    ('Curos de ansiedad online', 'Aprende a gestionar tu ansiedad', '2024-11-08', '45,00€', 'Alejandro','Curso'),
    ('Curso para parejas', 'Curso específico de parejas', '2024-07-12', '60,00€', 'Álvaro','Curso'),
    ('Curso para parejas', 'Curso específico de parejas', '2024-10-29', '60,00€', 'Álvaro','Curso'),
    ('Retiros de verano', 'Retiros de verano', '2024-08-21', '80,00€', 'Lucca','Retiro'),
    ('Retiros de invierno', 'Retiros de invierno', '2024-02-28', '80,00€', 'Ismael','Retiro')";

$sql_insert_cita_psicologica = "INSERT INTO cita_psicologica (id_pacientes, id_profesionales,fechas_cita,hora_cita) VALUES
('1', '1', '2024-03-10','17:00'),
('3', '5','2024-04-11','19:00'),
('4', '5','2024-05-21','18:00'),
('2', '1','2024-03-20','20:00')";

$sql_insert_reserva_eventos = "INSERT INTO reserva_eventos (id_paciente, id_evento) VALUES
('1', '1'),
('1', '7'),
('1', '3'),
('3', '4'),
('4', '11'),
('5', '18'),
('6', '12'),
('2', '6'),
('2', '17'),
('2', '15')";



if ($conexion->query($sql_insert_profesionales) === TRUE) {
    echo "Datos iniciales de profesionales insertados con éxito.<br>";
} else {
    echo "Error al insertar datos iniciales de profesionales: " . $conexion->error . "<br>";
}



if ($conexion->query($sql_insert_pacientes) === TRUE) {
    echo "Datos iniciales de pacientes insertados con éxito.<br>";
} else {
    echo "Error al insertar datos iniciales de pacientes: " . $conexion->error . "<br>";
}

if ($conexion->query($sql_insert_eventos) === TRUE) {
    echo "Datos iniciales de eventos insertados con éxito.<br>";
} else {
    echo "Error al insertar datos iniciales de eventos: " . $conexion->error . "<br>";
}

if ($conexion->query($sql_insert_cita_psicologica) === TRUE) {
    echo "Datos iniciales de cita psicológica insertados con éxito.<br>";
} else {
    echo "Error al insertar datos iniciales de cita psicológica: " . $conexion->error . "<br>";
}
if ($conexion->query($sql_insert_reserva_eventos) === TRUE) {
    echo "Datos iniciales de reserva eventos insertados con éxito.<br>";
} else {
    echo "Error al insertar datos iniciales de reserva eventos: " . $conexion->error . "<br>";
}


// Cerramos conexión
mysqli_close($conexion);
?>