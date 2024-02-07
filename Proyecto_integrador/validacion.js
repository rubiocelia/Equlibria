function validarFormularioInicio() {
  var usuarioInicio = document.getElementById("usuarioInicio");
  var contrasenaInicio = document.getElementById("contrasenaInicio");

  var usuarioInicioPattern = /^[a-zA-Z]+$/; // Expresión regular para letras

  if (usuarioInicio.value.trim() === "") {
    alert("Rellene el campo de usuario.");
    return false; // Evitamos el envío del formulario si hay errores
  } else if (!usuarioInicioPattern.test(usuarioInicio.value)) {
    alert("Solo se permiten letras en el usuario.");
    return false;
  }

  if (contrasenaInicio.value.trim() === "") {
    alert("Rellene el campo de contraseña.");
    return false; // Evitamos el envío del formulario si hay errores
  } else if (contrasenaInicio.length > 20) {
    alert("El campo de contraseña no puede superar los 20 caracteres.");
    return false;
  }
  alert("Usuario correcto.");
  return true; // Envíamos el formulario si no hay errores
}



function validarFormularioContacto() {
  var nombreContacto = document.getElementById("nombreContacto");
  var apellidosContacto = document.getElementById("apellidosContacto");
  var mailContacto = document.getElementById("mailContacto");
  var cuentanos = document.getElementById("cuentanos");

  // Validación del nombre
  if (nombreContacto.value.trim() === "") {
    alert("Por favor, ingrese su nombre.");
    nombreContacto.focus();
    return false;
  }

  // Validación de apellidos
  if (apellidosContacto.value.trim() === "") {
    alert("Por favor, ingrese sus apellidos.");
    apellidosContacto.focus();
    return false;
  }

  // Validación del correo electrónico
  var patronCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  if (!patronCorreo.test(mailContacto.value)) {
    alert("Ingrese un correo electrónico válido.");
    mailContacto.focus();
    return false;
  }

  // Validación del área de texto
  if (cuentanos.value.trim() === "") {
    alert("Por favor, cuéntanos tu problema.");
    cuentanos.focus();
    return false;
  }

  alert("Formulario enviado con éxito.");
  return true;
}
