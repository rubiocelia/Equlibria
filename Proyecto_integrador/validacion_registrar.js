document.addEventListener("DOMContentLoaded", function() {
  // Obtiene el formulario del documento
  var form = document.querySelector('form');
  // Agrega un evento de escucha al formulario para el evento de envío (submit)
  form.addEventListener('submit', function (event) {

    var nombre = document.getElementById("nombre_pacientes");
    var apellidos = document.getElementById("apellidos_pacientes");
    var telefono = document.getElementById("telefono_paciente");
    var correo = document.getElementById("mail_pacientes");
    var usuarioCrear = document.getElementById("usuario_pacientes");
    var contrasenaNueva = document.getElementById("contrasena_pacientes");

    // Validación del nombre
    if (!nombre.value.trim()) {
      alert("Por favor, ingrese su nombre.");
      nombre.focus();
      event.preventDefault();
      return;
    }

    // Validación de apellidos
    if (!apellidos.value.trim()) {
      alert("Por favor, ingrese sus apellidos.");
      apellidos.focus();
      event.preventDefault();
      return;
    }

    // Validación del número de teléfono
    var patronTelefono = /^[0-9]{9}$/;
    if (!patronTelefono.test(telefono.value)) {
      alert("Ingrese un número de teléfono válido (9 dígitos).");
      telefono.focus();
      event.preventDefault();
      return;
    }

    // Validación del correo electrónico
    var patronCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!patronCorreo.test(correo.value)) {
      alert("Ingrese un correo electrónico válido.");
      correo.focus();
      event.preventDefault();
      return;
    }

    // Validación del nombre de usuario
    var patronUsuario = /^[a-zA-Z0-9_]+$/; // Letras, números y guiones bajos
    if (
      usuarioCrear.value.trim() === "" ||
      !patronUsuario.test(usuarioCrear.value)
    ) {
      alert(
        "Ingrese un nombre de usuario válido (solo letras, números y guiones bajos)."
      );
      usuarioCrear.focus();
      event.preventDefault();
      return;
    }

    // Validación de la contraseña
    // La contraseña debe tener al menos 8 caracteres, al menos una letra y un número
    var patronContrasena = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    if (!patronContrasena.test(contrasenaNueva.value)) {
      alert(
        "La contraseña debe tener al menos 8 caracteres, incluyendo letras y números."
      );
      contrasenaNueva.focus();
      event.preventDefault();
      return;
    }

    //Validacion del usuario, mail y telefono para que no se repitan.
    if(telefono.value == telefono.value){
      alert ("Este telefono ya está registrado, por favor introduzca otro numero de teléfono válido.")
      event.preventDefault();
      return;
    }

    if(correo.value == correo.value){
      alert ("Este correo electrónico ya está registrado, por favor introduzca otro correo válido.")
      event.preventDefault();
      return;
    }

    if(usuarioCrear.value == usuarioCrear.value){
      alert ("Este nombre de usuario ya está registrado, por favor introduzca otro nombre de usuario.")
      event.preventDefault();
      return;
    }

    alert("Formulario enviado con éxito.");
  });
});
