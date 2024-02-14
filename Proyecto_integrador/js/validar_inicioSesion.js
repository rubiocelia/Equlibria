document.getElementById("loginForm").addEventListener("submit", function (e) {
  e.preventDefault(); // Previene el envío del formulario de manera tradicional

  // Primero, valida el formulario
  if (!validarFormularioInicio()) {
    // Si la validación falla, detiene la ejecución aquí
    return;
  }

  // Si la validación es exitosa, procede con el envío de datos
  var formData = new FormData(this);

  fetch("inicio_sesion.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        window.location.href = "perfil.php"; // Redirige si el inicio de sesión es exitoso
      } else {
        // Muestra el mensaje de error como los otros mensajes
        document.getElementById("loginError").style.display = "block";
        document.getElementById("loginError").innerText = data.message; // Asegúrate de que este elemento exista en tu HTML
      }
    })
    .catch((error) => console.error("Error:", error));
});

// Asegúrate de que la función validarFormularioInicio está correctamente implementada como se muestra arriba.

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
