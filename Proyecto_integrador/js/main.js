document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.querySelector(".hamburger");
  const menu = document.querySelector(".menu");

  // Toggle menu visibility when hamburger is clicked
  hamburger.addEventListener("click", function () {
    menu.classList.toggle("open");
  });

  // Close menu when clicking outside of it
  document.addEventListener("click", function (event) {
    if (!menu.contains(event.target) && !hamburger.contains(event.target)) {
      menu.classList.remove("open");
    }
  });
});
