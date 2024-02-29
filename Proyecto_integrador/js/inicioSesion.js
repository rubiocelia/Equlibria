// document.addEventListener("DOMContentLoaded", function () {
//     var form = document.querySelector("form");
//     form.addEventListener("submit", function (event) {
//         event.preventDefault(); // Prevenir el envío del formulario

//         // Definición de variables
//         var usuarioCrear = document.getElementById("usuario_pacientes");
//         var contrasenaNueva = document.getElementById("contrasena_pacientes");

//         // Función para mostrar el modal con mensajes
//         function showModal(message) {
//             document.getElementById('modal-message').innerText = message;
//             document.getElementById('modal').style.display = 'block';
//             document.getElementById('modal-backdrop').style.display = 'block';
//         }

//         // Evento para cerrar el modal
//         document.querySelector('.modal-close').addEventListener('click', function() {
//             document.getElementById('modal').style.display = 'none';
//             document.getElementById('modal-backdrop').style.display = 'none';
//         });

//         // Validación del nombre de usuario y contraseña
//         var patronUsuario = /^[a-zA-Z0-9_]+$/; // Letras, números y guiones bajos
//         var patronContrasena = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

//         if (!patronUsuario.test(usuarioCrear.value) || !patronContrasena.test(contrasenaNueva.value)) {
//             showModal("Contraseña o usuario incorrectos.");
//             usuarioCrear.focus();
//             return;
//         }
//         });
//     });

//     document.getElementById("loginForm").addEventListener("submit", function (e) {
//         e.preventDefault(); // Previene el envío del formulario de manera tradicional
      
//         // Primero, valida el formulario
//         if (!validarFormularioInicio()) {
//           // Si la validación falla, detiene la ejecución aquí
//           return;
//         }
      
//         // Si la validación es exitosa, procede con el envío de datos
//         var formData = new FormData(this);
      
//         fetch("inicio_sesion.php", {
//           method: "POST",
//           body: formData,
//         })
//           .then((response) => response.json())
//           .then((data) => {
//             if (data.success) {
//               window.location.href = "perfil.php"; // Redirige si el inicio de sesión es exitoso
//             } else {
//               // Muestra el mensaje de error como los otros mensajes
//               document.getElementById("loginError").style.display = "block";
//               document.getElementById("loginError").innerText = data.message; // Asegúrate de que este elemento exista en tu HTML
//             }
//           })
//           .catch((error) => console.error("Error:", error));
//       });
      
//       // Asegúrate de que la función validarFormularioInicio está correctamente implementada como se muestra arriba.
      
//       function validarFormularioInicio() {
//               // Definición de variables
//               var usuarioCrear = document.getElementById("usuario_pacientes");
//               var contrasenaNueva = document.getElementById("contrasena_pacientes");
      
//               // Función para mostrar el modal con mensajes
//               function showModal(message) {
//                   document.getElementById('modal-message').innerText = message;
//                   document.getElementById('modal').style.display = 'block';
//                   document.getElementById('modal-backdrop').style.display = 'block';
//               }
      
//               // Evento para cerrar el modal
//               document.querySelector('.modal-close').addEventListener('click', function() {
//                   document.getElementById('modal').style.display = 'none';
//                   document.getElementById('modal-backdrop').style.display = 'none';
//               });
      
//               // Validación del nombre de usuario y contraseña
//               var patronUsuario = /^[a-zA-Z0-9_]+$/; // Letras, números y guiones bajos
//               var patronContrasena = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
      
//               if (!patronUsuario.test(usuarioCrear.value) || !patronContrasena.test(contrasenaNueva.value)) {
//                   showModal("Contraseña o usuario incorrectos.");
//                   usuarioCrear.focus();
//                   return;
//               }
//               if (usuarioCrear.value.trim() === "" || !patronUsuario.test(usuarioCrear.value)) {
//                 showModal("Ingrese un nombre de usuario válido (solo letras, números y guiones bajos).");
//                 usuarioCrear.focus();
//                 return;
//               }else if (!usuarioCrear.value.trim()) {
//                 showModal("Por favor, ingrese su usuario.");
//                 nombre.focus();
//                 return;
//             }
//               // Validación de la contraseña
//               // La contraseña debe tener al menos 8 caracteres, al menos una letra y un número
      
//               if (!patronContrasena.test(contrasenaNueva.value)) {
//                 showModal("La contraseña debe tener al menos 8 caracteres, incluyendo letras y números.");
//                 contrasenaNueva.focus();
//                 return;
//               }else if (!contrasenaNueva.value.trim()) {
//               showModal("Por favor, ingrese su contrseña.");
//               nombre.focus();
//               return;
//             }
//       }
