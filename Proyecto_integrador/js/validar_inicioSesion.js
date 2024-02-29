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
        window.location.href = "perfil.html"; // Redirige si el inicio de sesión es exitoso
      } else {
        // Muestra el mensaje de error como los otros mensajes
        showModal("Nombre de usuario o contraseña incorrectos."); 
      }
    })
    .catch((error) => console.error(showModal("Nombre de usuario o contraseña incorrectos."))); 
});

// Asegúrate de que la función validarFormularioInicio está correctamente implementada como se muestra arriba.

function validarFormularioInicio() {
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

  if (!usuarioCrear.value.trim()) {
    showModal("Rellene el campo de usuario."); // Llamada correcta a showModal
    usuarioCrear.focus();
    event.preventDefault();
    return false;
  }

  if (!contrasenaNueva.value.trim()) {
    showModal("Rellene el campo de contraseña."); // Llamada correcta a showModal
    contrasenaNueva.focus();
    event.preventDefault();
    return false;
  }

  // Validación del nombre de usuario y contraseña
  var patronUsuario = /^[a-zA-Z0-9_]+$/; // Letras, números y guiones bajos
  var patronContrasena = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

    if (!patronUsuario.test(usuarioCrear.value)) {
      showModal("Ingrese un nombre de usuario válido (solo letras, números y guiones bajos).");
      usuarioCrear.focus();
      event.preventDefault();
      return false;
      } 

  if (!patronContrasena.test(contrasenaNueva.value)) {
    showModal("La contraseña debe tener al menos 8 caracteres, incluyendo letras y números.");
    contrasenaNueva.focus();
    event.preventDefault();
    return false;
    }

  var valid = true; // Suponemos que el formulario es válido al inicio

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
