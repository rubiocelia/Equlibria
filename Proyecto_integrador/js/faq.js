// Selecciona todas las preguntas
var faqQuestions = document.querySelectorAll(".faq-question");

faqQuestions.forEach(function (faqQuestion) {
  faqQuestion.addEventListener("click", function () {
    // Este código alternará la clase 'show' en el elemento padre .faq-item
    var faqItem = this.closest(".faq-item");
    var wasShown = faqItem.classList.contains("show");

    // Cierra todas las respuestas
    faqQuestions.forEach(function (item) {
      item.closest(".faq-item").classList.remove("show");
    });

    // Si la pregunta no estaba expandida, ábrela.
    if (!wasShown) {
      faqItem.classList.add("show");
    }
  });
});
