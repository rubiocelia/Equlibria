function validarFormularioContacto() {
  var nombreContacto = document.getElementById("nombreContacto");
  var apellidosContacto = document.getElementById("apellidosContacto");
  var mailContacto = document.getElementById("mailContacto");
  var cuentanos = document.getElementById("cuentanos");

  // patron para validar texto de nombre y apellidos
  var patronNombreYApellidos = /^[a-zA-Z\s'-]+$/;
  // Validación del nombre
  if (nombreContacto.value.trim() === "") {
    alert("Por favor, ingrese su nombre.");
    nombreContacto.focus();
    return false;
  }
  // Validación del nombre solo letras
  if (!patronNombreYApellidos.test(nombreContacto.value)) {
    alert("Ingrese un nombre con solo letras.");
    nombreContacto.focus();
    return false;
  }

  // Validación de apellidos
  if (apellidosContacto.value.trim() === "") {
    alert("Por favor, ingrese sus apellidos.");
    apellidosContacto.focus();
    return false;
  }
  // Validación del nombre solo letras
  if (!patronNombreYApellidos.test(apellidosContacto.value)) {
    alert("Ingrese un nombre con solo letras.");
    nombreContacto.focus();
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
