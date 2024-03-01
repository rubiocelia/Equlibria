
document.addEventListener("DOMContentLoaded", function() {
  // Obtiene el formulario del documento
  var form = document.querySelector('form');
  // Agrega un evento de escucha al formulario para el evento de envío (submit)
  form.addEventListener('submit', function (event) {

    var nombrePaciente = document.getElementById("nombre_paciente");
    var apellidosPaciente = document.getElementById("apellidos_paciente");
    var mailPaciente = document.getElementById("mail_paciente");
    var tipoAsistencia = document.getElementById("tipoAsistencia");
    var id_Asistente = document.getElementById("id_Asistente");
    var fecha_cita = document.getElementById("fecha_cita");
    

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

    // Validación del tipo asistencia
    if (tipoAsistencia.value === '') {
      alert("Por favor, seleccione un tipo de asistencia.");
      profesional.focus();
      event.preventDefault();
      return;
    }

    // Validación del asistente
    if (id_Asistente.value === '') {
      alert("Por favor, seleccione un profesional.");
      fechaCita.focus();
      event.preventDefault();
      return;
    }
    // Validación fecha cita
    if (fecha_cita.value === '') {
      alert("Por favor, seleccione una fecha para la cita.");
      horaCita.focus();
      event.preventDefault();
      return;
    } else {
      // Obtenemos la fecha actual
      var fechaActual = new Date();
      fechaActual.setHours(0, 0, 0, 0);
      // Pasamos la fecha_cita a formato fecha
      var fechaCita = new Date(fecha_cita.value);
      fechaCita.setHours(0, 0, 0, 0);
      // Validacion Fecha pasada
      if (fechaCita < fechaActual) {
        alert("Por favor, seleccione una fecha igual o superior a hoy.");
        horaCita.focus();
        event.preventDefault();
        return;
      }
    }
    return;
  })
})

