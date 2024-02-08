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

  // Verificación inicial del formulario
  if (usuarioInicio.value.trim() === "") {
    errorUsuario.textContent = "El campo de usuario es obligatorio.";
    errorUsuario.style.display = "block";
    usuarioInicio.classList.add("input-error");
    return false; // Detiene la ejecución aquí si el usuario no rellenó este campo
  }

  if (contrasenaInicio.value.trim() === "") {
    errorContrasena.textContent = "El campo de contraseña es obligatorio.";
    errorContrasena.style.display = "block";
    contrasenaInicio.classList.add("input-error");
    return false; // Detiene la ejecución aquí si la contraseña no se rellenó
  }

  return false; // Evita que el formulario se envíe normalmente
}
