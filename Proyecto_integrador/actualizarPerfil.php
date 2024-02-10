<?php class PerfilPaciente {
    protected $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function actualizarPerfil($id_paciente, $nombre, $apellidos, $telefono, $correo, $nombreUsuario, $contrasena) {
        // Actualizar la información del paciente
        $sql = "UPDATE pacientes SET 
                    nombre_pacientes = ?, 
                    apellidos_pacientes = ?, 
                    telefono_paciente = ?, 
                    mail_pacientes = ?, 
                    usuario_pacientes = ?, 
                    contrasena_pacientes = ?
                WHERE id_pacientes = ?";

        if ($stmt = $this->conexion->prepare($sql)) {
            $stmt->bind_param("sssssssi", $nombre, $apellidos, $telefono, $correo, $nombreUsuario, $contrasena, $id_paciente);
            if ($stmt->execute()) {
                return true; // Éxito
            } else {
                return false; // Error al ejecutar la actualización
            }
        } else {
            return false; // Error al preparar la consulta
        }
    }
}

?>