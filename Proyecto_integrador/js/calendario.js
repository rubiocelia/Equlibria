document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: "es",
    firstDay: 1,
    initialView: "dayGridMonth",
    events: "eventosCalendario.php",
    eventColor: "#bd9567",
    displayEventTime: false, // Esto ocultará la hora del evento
    eventTimeFormat: {
      // define cómo se muestra la hora del evento
      hour: "2-digit",
      minute: "2-digit",
      meridiem: false,
    },
  });
  calendar.render();
});
