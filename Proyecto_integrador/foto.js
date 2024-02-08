document.getElementById("profilePic").addEventListener("click", function () {
  document.getElementById("profileInput").click(); // Activa el input oculto
});

document
  .getElementById("profileInput")
  .addEventListener("change", function (event) {
    if (event.target.files && event.target.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        document.getElementById("profilePic").src = e.target.result; // Actualiza la imagen
      };

      reader.readAsDataURL(event.target.files[0]); // Lee el archivo seleccionado
    }
  });
