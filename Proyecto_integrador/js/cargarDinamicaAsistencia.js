function agregarPlaceholderASelect(idSelect, textoPlaceholder) {
    var select = document.getElementById(idSelect); // Encuentra el select por ID
    var optionPlaceholder = document.createElement('option'); // Crea el nuevo elemento option

    // Configura el option como un placeholder
    optionPlaceholder.textContent = textoPlaceholder; // Establece el texto a mostrar
    optionPlaceholder.value = ""; // Opcional: valor vacío para el placeholder
    optionPlaceholder.disabled = true; // Hace que el placeholder no sea seleccionable
    optionPlaceholder.selected = true; // Selecciona el placeholder por defecto

    // Agrega el option al principio del select
    select.prepend(optionPlaceholder); // Para navegadores modernos
}
// Control sobre el elemento "tipoAsistencia"
document.getElementById('tipoAsistencia').addEventListener('change', function() {
  const tipoAsistencia = this.value;
  fetch('getProfesionalesAsistencia.php?tipoAsistencia=' + tipoAsistencia)
      .then(response => response.json())
      .then(data => {
          const selectAsistente = document.getElementById('id_Asistente');
          selectAsistente.innerHTML = ''; // Limpiar opciones previas
          selectAsistente.disabled = false; // Habilitar el select
          // Control de resultados 
          if (data.profesionales.length === 0) {
            // No hay horas disponibles
            selectAsistente.hidden = true;
            document.getElementById('noDisponibles_asistentes').hidden=false;
            // Limpiamos el campo fecha
            document.getElementById('fecha_cita').value = '';
            document.getElementById('fecha_cita').disabled=true;
          } else {
            // Limpiamos el campo fecha
            document.getElementById('fecha_cita').value = '';
            document.getElementById('fecha_cita').disabled=true;
            // Añadimos un placeholder al select
            agregarPlaceholderASelect('id_Asistente', '');
            // Añadimos las opciones con los profesionales recuperados
            data.profesionales.forEach(profesional => {
                const option = new Option(`${profesional.nombre_profesionales} ${profesional.apellidos_profesionales}`, profesional.id_profesionales);
                selectAsistente.appendChild(option);
            });
          }
      })
      .catch(error => console.error('Error:', error));
});

// Control sobre el elemento "asistente"
document.getElementById('id_Asistente').addEventListener('change', function() {
  const idAsistente = this.value;
  // Limpiamos el campo fecha y lo habilitamos
  if (idAsistente==''){
    document.getElementById('fecha_cita').value = '';
    document.getElementById('fecha_cita').disabled=true;
  } else {
    document.getElementById('fecha_cita').value = '';
    document.getElementById('fecha_cita').disabled=false;
  }
  
});

// Control sobre el elemento "fecha_cita"
document.getElementById('fecha_cita').addEventListener('change', function() {
  const fechaCita = this.value;
  const idAsistente = document.getElementById('id_Asistente').value;

  fetch('getFechaDisponibleAsistencia.php?fechaCita=' + fechaCita + '&idAsistente=' + idAsistente)
      .then(response => response.json())
      .then(data => {
        if (data.citas.length !== 0) {
          document.getElementById('btn_Enviar').style.display = 'none';
          document.getElementById('noDisponibles_fechaCita').hidden=false;
        } else {
          document.getElementById('noDisponibles_fechaCita').hidden=true;
          document.getElementById('btn_Enviar').style.display = '';
        }
      })
      .catch(error => console.error('Error:', error));
});