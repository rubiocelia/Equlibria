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

//script ventana modal
const openModal = document.querySelector(".iniciarSesionModal");
const modal = document.querySelector(".modal");
const closeModal = document.querySelector(".modal__close");

openModal.addEventListener("click", (e) => {
  e.preventDefault();
  modal.classList.add("modal--show");
});

closeModal.addEventListener("click", (e) => {
  e.preventDefault();
  modal.classList.remove("modal--show");
});

// validacionPerfil.js
document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("formEditarPerfil").onsubmit = function (e) {
    // Validación del nombre
    var nombre = document.getElementById("nombre").value;
    if (nombre.length < 2) {
      alert("Por favor, ingresa un nombre válido.");
      e.preventDefault();
      return false;
    }

    // Validación de los apellidos
    var apellidos = document.getElementById("apellidos").value;
    if (apellidos.length < 2) {
      alert("Por favor, ingresa apellidos válidos.");
      e.preventDefault();
      return false;
    }

    // Validación del teléfono (simplificada para ejemplificar)
    var telefono = document.getElementById("telefono").value;
    if (!telefono.match(/^\d{9}$/)) {
      alert("Por favor, ingresa un número de teléfono válido.");
      e.preventDefault();
      return false;
    }

    // Validación del correo electrónico
    var correo = document.getElementById("correo").value;
    if (!correo.match(/^\S+@\S+\.\S+$/)) {
      alert("Por favor, ingresa un correo electrónico válido.");
      e.preventDefault();
      return false;
    }

    // Validación del nombre de usuario
    var nombreUsuario = document.getElementById("nombreUsuario").value;
    if (nombreUsuario.length < 4) {
      alert("El nombre de usuario debe tener al menos 4 caracteres.");
      e.preventDefault();
      return false;
    }

    // Validación de la contraseña
    var contrasena = document.getElementById("contrasena").value;
    if (contrasena.length < 6) {
      alert("La contraseña debe tener al menos 6 caracteres.");
      e.preventDefault();
      return false;
    }

    // Si todas las validaciones pasan, el formulario se enviará
    return true;
  };
});
