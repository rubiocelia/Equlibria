function validarFormularioInicio() {
  var usuarioInicio = document.getElementById("usuario_pacientes");
  var contrasenaInicio = document.getElementById("contrasena_pacientes");
  var errorUsuario = document.getElementById("errorUsuario");
  var errorContrasena = document.getElementById("errorContrasena");

  var usuarioInicioPattern = /^[a-zA-Z]+$/; // Expresión regular para letras
  var valid = true; // Suponemos que el formulario es válido al inicio

  // Reinicia los estados de error
  errorUsuario.style.display = "none";
  usuarioInicio.classList.remove("input-error");
  errorContrasena.style.display = "none";
  contrasenaInicio.classList.remove("input-error");

  if (usuarioInicio.value.trim() === "") {
    errorUsuario.textContent = "Rellene el campo de usuario.";
    errorUsuario.style.display = "block";
    usuarioInicio.classList.add("input-error");
    valid = false;
  } else if (!usuarioInicioPattern.test(usuarioInicio.value)) {
    errorUsuario.textContent = "Solo se permiten letras en el usuario.";
    errorUsuario.style.display = "block";
    usuarioInicio.classList.add("input-error");
    valid = false;
  }

  if (contrasenaInicio.value.trim() === "") {
    errorContrasena.textContent = "Rellene el campo de contraseña.";
    errorContrasena.style.display = "block";
    contrasenaInicio.classList.add("input-error");
    valid = false;
  } else if (contrasenaInicio.value.length > 20) {
    errorContrasena.textContent =
      "El campo de contraseña no puede superar los 20 caracteres.";
    errorContrasena.style.display = "block";
    contrasenaInicio.classList.add("input-error");
    valid = false;
  }

  if (valid) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "tu_archivo_php.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          // Maneja la respuesta del servidor aquí
          if (xhr.responseText === "success") {
            window.location.href = "index.html";
          } else {
            // Maneja el caso en que la autenticación falla
            // Puedes mostrar un mensaje de error aquí
            errorUsuario.textContent = "Credenciales incorrectas.";
            errorUsuario.style.display = "block";
            usuarioInicio.classList.add("input-error");
            errorContrasena.textContent = "Credenciales incorrectas.";
            errorContrasena.style.display = "block";
            contrasenaInicio.classList.add("input-error");
          }
        } else {
          // Maneja errores de conexión u otros problemas del servidor
          console.error("Error en la solicitud AJAX.");
        }
      }
    };
    xhr.send(
      "usuario_pacientes=" +
        encodeURIComponent(usuarioInicio.value) +
        "&contrasena_pacientes=" +
        encodeURIComponent(contrasenaInicio.value)
    );
  }

  return false; // Evita que el formulario se envíe normalmente
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

//ventana modal
const openModal = document.querySelector('.iniciarSesionModal');
const modal = document.querySelector('.modal');
const closeModal = document.querySelector('.modal__close');

openModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.add('modal--show');
});

closeModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.remove('modal--show');
});
