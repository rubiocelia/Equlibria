
document.addEventListener("DOMContentLoaded", function() {
  // Obtiene el formulario del documento
  var form = document.querySelector('form');
  // Agrega un evento de escucha al formulario para el evento de envío (submit)
  form.addEventListener('submit', function (event) {

    var nombrePaciente = document.getElementById("nombre_paciente");
    var apellidosPaciente = document.getElementById("apellidos_paciente");
    var mailPaciente = document.getElementById("mail_paciente");
    var profesional = document.getElementById("profesional_seleccionado");
    var fechaCita = document.getElementById("fecha_cita");
    var horaCita = document.getElementById("hora_cita");
    

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

    // Validación del profesional
    if (!profesional.value.trim()) {
      alert("Por favor, seleccione un psicolog@.");
      profesional.focus();
      event.preventDefault();
      return;
    }

    // Validación del fecha cita
    if (!fechaCita.value.trim()) {
      alert("Por favor, seleccione una fecha.");
      fechaCita.focus();
      event.preventDefault();
      return;
    }
    // Validación de la hora
    if (!horaCita.value.trim()) {
      alert("Por favor, seleccione una hora.");
      horaCita.focus();
      event.preventDefault();
      return;
    }

    alert("Cita finalizada exitosamente.");
    return;
  })
})

