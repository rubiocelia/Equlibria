document.addEventListener("DOMContentLoaded", function () {
    var form = document.querySelector("form");
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevenir el envío del formulario

        // Definición de variables
        var usuarioCrear = document.getElementById("usuario_pacientes");
        var contrasenaNueva = document.getElementById("contrasena_pacientes");

        // Función para mostrar el modal con mensajes
        function showModal(message) {
            document.getElementById('modal-message').innerText = message;
            document.getElementById('modal').style.display = 'block';
            document.getElementById('modal-backdrop').style.display = 'block';
        }

        // Evento para cerrar el modal
        document.querySelector('.modal-close').addEventListener('click', function() {
            document.getElementById('modal').style.display = 'none';
            document.getElementById('modal-backdrop').style.display = 'none';
        });

        // Validación del nombre de usuario y contraseña
        var patronUsuario = /^[a-zA-Z0-9_]+$/; // Letras, números y guiones bajos
        var patronContrasena = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

        if (!patronUsuario.test(usuarioCrear.value) || !patronContrasena.test(contrasenaNueva.value)) {
            showModal("Contraseña o usuario incorrectos.");
            usuarioCrear.focus();
            return;
        }
        });
    });
