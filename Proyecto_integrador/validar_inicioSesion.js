function validarFormularioInicio() {
  var usuarioInicio = document.getElementById("usuario_pacientes");
  var contrasenaInicio = document.getElementById("contrasena_pacientes");
  var errorUsuario = document.getElementById("errorUsuario");
  var errorContrasena = document.getElementById("errorContrasena");

  // Reinicia los estados de error
  errorUsuario.style.display = "none";
  usuarioInicio.classList.remove("input-error");
  errorContrasena.style.display = "none";
  contrasenaInicio.classList.remove("input-error");

  var valid = true; // Suponemos que el formulario es válido al inicio

  // Verifica si el campo de usuario está vacío
  if (usuarioInicio.value.trim() === "") {
    errorUsuario.textContent = "Rellene el campo de usuario.";
    errorUsuario.style.display = "block";
    usuarioInicio.classList.add("input-error");
    valid = false;
  }

  // Verifica si el campo de contraseña está vacío
  if (contrasenaInicio.value.trim() === "") {
    errorContrasena.textContent = "Rellene el campo de contraseña.";
    errorContrasena.style.display = "block";
    contrasenaInicio.classList.add("input-error");
    valid = false;
  }

  // Si alguno de los campos está vacío, evita que el formulario se envíe
  return valid ? true : false; // Retorna true para permitir el envío si todo es válido
}

function togglePasswordVisibility() {
  var passwordInput = document.getElementById("contrasena_pacientes");
  var eyeIcon = document.querySelector(".eye-icon");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    eyeIcon.textContent = "🙈"; // Cambia al ícono de ojo cerrado
  } else {
    passwordInput.type = "password";
    eyeIcon.textContent = "🙉"; // Cambia al ícono de ojo abierto
  }
}

