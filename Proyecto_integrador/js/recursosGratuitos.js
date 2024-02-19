document.addEventListener("DOMContentLoaded", function () {
  let indiceActual = 0;
  const tarjetas = document.querySelectorAll(".libro_card");
  mostrarTarjeta(indiceActual); // Muestra la primera tarjeta inicialmente

  document
    .querySelector(".flecha-derecha")
    .addEventListener("click", function () {
      indiceActual = (indiceActual + 1) % tarjetas.length; // Avanza una tarjeta
      mostrarTarjeta(indiceActual);
    });

  document
    .querySelector(".flecha-izquierda")
    .addEventListener("click", function () {
      indiceActual = (indiceActual - 1 + tarjetas.length) % tarjetas.length; // Retrocede una tarjeta
      mostrarTarjeta(indiceActual);
    });

  function mostrarTarjeta(indice) {
    tarjetas.forEach((tarjeta, i) => {
      tarjeta.style.display = i === indice ? "flex" : "none"; // Muestra solo la tarjeta actual
    });
  }
});
