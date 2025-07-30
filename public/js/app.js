document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    const container = document.getElementById('data-container');
    const eventosJson = container.dataset.eventos;
    const eventos = JSON.parse(eventosJson);

    const calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        events: eventos,
        eventClick: function(info) {
            alert(
                info.event.title + '\n' +
                'Fecha y hora: ' + info.event.start.toLocaleString()
            );
        }
    });

    calendar.render();
});
