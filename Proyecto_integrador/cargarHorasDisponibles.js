document.getElementById('fecha_cita').addEventListener('change', function() {
  const fechaSeleccionada = this.value;
  const profesional_seleccionado = document.getElementById('profesional_seleccionado').value;


  fetch('getHorasDisponiblesPro.php?fecha=' + fechaSeleccionada + '&profesional_seleccionado=' + profesional_seleccionado)
      .then(response => response.json())
      .then(data => {
          const selectHora = document.getElementById('hora_cita');
          selectHora.innerHTML = ''; // Limpiar opciones previas
          selectHora.disabled = false; // Habilitar el select
          // Control de resultados 
          if (data.horasDisponibles.length === 0) {
            // No hay horas disponibles
            selectHora.hidden = true;
            document.getElementById('noDisponibles').hidden=false;
          } else {
            // Añadir nuevas opciones
            document.getElementById('noDisponibles').hidden=true;
            selectHora.hidden = false;
            data.horasDisponibles.forEach(hora => {
                const option = new Option(hora.hora_cita, hora.hora_cita);
                selectHora.appendChild(option);
            });
          }
      })
      .catch(error => console.error('Error:', error));
});

document.getElementById('profesional_seleccionado').addEventListener('change', function() {
  const fechaSeleccionada = document.getElementById('fecha_cita').value;
  const profesional_seleccionado = this.value;


  fetch('getHorasDisponiblesPro.php?fecha=' + fechaSeleccionada + '&profesional_seleccionado=' + profesional_seleccionado)
      .then(response => response.json())
      .then(data => {
          const selectHora = document.getElementById('hora_cita');
          selectHora.innerHTML = ''; // Limpiar opciones previas
          selectHora.disabled = false; // Habilitar el select
          // Control de resultados 
          if (data.horasDisponibles.length === 0) {
            // No hay horas disponibles
            selectHora.hidden = true;
            document.getElementById('noDisponibles').hidden=false;
          } else {
            // Añadir nuevas opciones
            document.getElementById('noDisponibles').hidden=true;
            selectHora.hidden = false;
            data.horasDisponibles.forEach(hora => {
                const option = new Option(hora.hora_cita, hora.hora_cita);
                selectHora.appendChild(option);
            });
          }
      })
      .catch(error => console.error('Error:', error));
});