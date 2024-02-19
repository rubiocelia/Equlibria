<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Proyecto_integrador/css/registro.css">
    <script src="../Proyecto_integrador/js/validacion_registrar.js"></script>
    <title>Registro - Equilibria</title>
</head>
<body class="registroFormulario">
    <div class="subrayadoFormularioRegistro">
        <h3>Crear cuenta</h3>
    </div>
                <button type="submit" class="google-signin">
                    <object data="../Proyecto_integrador/img/google.svg"></object>
                    <span>Regístrate con Google</span>
                </button>
     <div class="containerFormRegistro">
        <form class="formRegistro" method="post" action="">
        <hr>
            <div class="form-row">
                <div class="form-column">
                    <label for="nombre_pacientes">Nombre:</label>
                    <input type="text" id="nombre_pacientes" name="nombre_pacientes">
                </div>
                <div class="form-column">                      
                    <label for="apellidos_pacientes">Apellidos:</label>
                    <input type="text" id="apellidos_pacientes" name="apellidos_pacientes">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-column">
                    <label for="telefono_paciente">Número de Teléfono:</label>
                    <input type="tel" id="telefono_paciente" name="telefono_paciente">
                </div>
                <div class="form-column">
                    <label for="mail_pacientes">Correo Electrónico:</label>
                    <input type="email" id="mail_pacientes" name="mail_pacientes">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-column">
                    <label for="usuario_pacientes">Nombre de Usuario:</label>
                    <input type="text" id="usuario_pacientes" name="usuario_pacientes">
                </div>
                <div class="form-column">
                    <div class="inputArea">
                        <label for="contrasena_pacientes">Contraseña:</label>
                        <input type="password" id="contrasena_pacientes" name="contrasena_pacientes">
                    </div>
                    <div class="container">
                        <div class="strengthMeter"></div>
                    </div>    
                </div>
            </div>
            <hr>
            <p>¿Tienes una cuenta?<a href="inicio_sesion.php"> Inicia sesión en tu cuenta</a></p>
            <button type="submit">Crear cuenta</button>
        </form>
    </div>
    <script src="../Proyecto_integrador/js/registro.js"></script>
</body>
</html>