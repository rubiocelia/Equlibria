// Verifica si el usuario ha iniciado sesión basándose en un ID en la URL
function checkLoginByUrl() {
  // Obtiene la URL completa
  const url = window.location.href;
  // Construye un objeto URL
  const parsedUrl = new URL(url);
  // Intenta obtener el valor del parámetro 'userId' de la URL
  const userId = parsedUrl.searchParams.get("userId");

  // Verifica si el userId está presente y no es nulo
  if (userId) {
    // Si el userId está presente, asume que el usuario ha iniciado sesión
    // No hace nada, permitiendo que la sección de perfil sea visible
  } else {
    // Si no hay userId, oculta la sección de perfil
    const profileSection = document.getElementById("profileSection");
    if (profileSection) {
      profileSection.classList.add("hidden");
    }
  }
}

// Llama a la función al cargar la página
window.onload = checkLoginByUrl;
