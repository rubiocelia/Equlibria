
document.addEventListener("DOMContentLoaded", function() {
  // Obtiene el formulario del documento
  var form = document.querySelector('form');
  // Agrega un evento de escucha al formulario para el evento de envío (submit)
  form.addEventListener('submit', function (event) {

    var nombrePaciente = document.getElementById("nombre_paciente");
    var apellidosPaciente = document.getElementById("apellidos_paciente");
    var mailPaciente = document.getElementById("mail_paciente");
    

    // Validación del nombre
    if (!nombrePaciente.value.trim()) {
      alert("Por favor, ingrese su nombre.");
      nombrePaciente.focus();
      event.preventDefault();
      return;
    }

    // Validación de apellidos
    if (!apellidosPaciente.value.trim()) {
      alert("Por favor, ingrese sus apellidos.");
      apellidosPaciente.focus();
      event.preventDefault();
      return;
    }

    // Validación del correo electrónico
    var patronCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!patronCorreo.test(mailPaciente.value)) {
      alert("Ingrese un correo electrónico válido.");
      mailPaciente.focus();
      event.preventDefault();
      return;
    }

    alert("Reserva finalizada exitosamente.");
    return;
  })
})

