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
            const event = info.event;
            const props = event.extendedProps;

            document.getElementById('modalTitulo').textContent = 'Detalles de la Cita';
            document.getElementById('modalPaciente').textContent = props.paciente;
            document.getElementById('modalOdontologo').textContent = props.odontologo;
            document.getElementById('modalFecha').textContent = props.fecha;
            document.getElementById('modalHora').textContent = props.hora;

            // Muestra el modal
            const citaModal = new bootstrap.Modal(document.getElementById('detalleCitaModal'));
            citaModal.show();
        }
    });

    calendar.render();
});

