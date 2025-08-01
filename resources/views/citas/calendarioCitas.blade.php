@extends('layouts.admin')

@section('titulo', 'Gestión-Citas')

<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
<!-- FullCalendar CSS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />

<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 40px;
        max-width: 800px;
        /* Controla el ancho del contenedor */
    }

    #calendar {
        background-color: white;
        padding: 15px;
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-size: 0.85rem;
        /* Reduce el tamaño de fuente */
        height: 550px;
        /* Altura máxima del calendario */
        overflow-y: auto;
        /* Scroll si se pasa de altura */
    }
</style>


@section('contenido')

<body>
    <div class="container mx-auto">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0" style="color: #6f42c1;">Agenda de Citas</h2>
            <a href="{{ route('indexCitas') }}" class="btn btn-primary">Agendamiento de Citas</a>
        </div>

        <!-- Contenedor oculto con eventos JSON -->
        <div id="data-container" data-eventos='@json($eventos)' style="display:none;"></div>

        <div id="calendar"></div>
    </div>

    <!-- Modal Detalle Cita -->
    <div class="modal fade" id="detalleCitaModal" tabindex="-1" aria-labelledby="detalleCitaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalTitulo">Detalles de la Cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Paciente:</strong> <span id="modalPaciente"></span></p>
                    <p><strong>Odontólogo:</strong> <span id="modalOdontologo"></span></p>
                    <p><strong>Fecha:</strong> <span id="modalFecha"></span></p>
                    <p><strong>Hora:</strong> <span id="modalHora"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

    <!-- Tu JS externo -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>

@endsection