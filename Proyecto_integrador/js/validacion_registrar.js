document.addEventListener("DOMContentLoaded", function () {
  var form = document.querySelector("form");
  form.addEventListener("submit", async function (event) {
    event.preventDefault(); // Evitar el envío hasta confirmar la validación

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
    } else if (/[^a-zA-Z áéíóúÁÉÍÓÚñÑ]/.test(nombre.value)) {
      // Añadiendo la comprobación de que no contenga números
      alert("El nombre no debe contener números.");
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
    } else if (/[^a-zA-Z áéíóúÁÉÍÓÚñÑ]/.test(apellidos.value)) {
      // Añadiendo la comprobación de que no contenga números
      alert("Los apellidos no deben contener números.");
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
    // Verificación con la base de datos
    //Creamos la instancia "FormData" para complilar los valores y enviarlos mediante fetch.

    var datos = new FormData();

    //Añadimos al objeto "Formdata" los valores que no queremos que se repitan en la base de datos

    datos.append("telefono", telefono.value);
    datos.append("correo", correo.value);
    datos.append("usuario", usuarioCrear.value);

    //Utilizamos fetch para enviar la solicitud post al formulario y el archivo validar_duplicados.php
    //será el que manejará la solicitud

    fetch("validar_duplicados.php", {
      method: "POST",
      body: datos, // Usando FormData

      //Manejamos la respuesta del servidor una vez la solicitud este enviada, para que cuando
      //el servidor responda la respuesta sea recibida como un objeto response que a su vez es procesado
      //para convertirlo a formato json.
    })
      .then((response) => response.json())

      //Aqui verificamos que ninguno de los campos de telefono_paciente, mail_pacientes y usuario_pacientes
      //se pueda repetir y que en caso de que ya este en la base de datos salte un error mediante un alert

      .then((data) => {
        var error = false;
        if (data.telefono) {
          alert(
            "Este teléfono ya está registrado, por favor introduzca otro número de teléfono válido."
          );
          error = true;
        }
        if (data.correo) {
          alert(
            "Este correo electrónico ya está registrado, por favor introduzca otro correo válido."
          );
          error = true;
        }
        if (data.usuario) {
          alert(
            "Este nombre de usuario ya está registrado, por favor introduzca otro nombre de usuario."
          );
          error = true;
        }

        if (!error) {
          form.submit(); // Envía el formulario si no hay errores
        }
        //En que caso de que la consulta fetch falle saldra un error mediante un alert
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("Error al verificar los datos.");
      });
  });
});
