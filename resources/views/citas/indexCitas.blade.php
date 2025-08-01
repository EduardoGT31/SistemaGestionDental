@extends('layouts.admin')

@section('titulo', 'Gestión-Citas')

@section('contenido')

<!-- Título -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <!-- Título a la izquierda -->
    <h3 class="fw-bold mb-0" style="color: #6f42c1;">Gestión de Citas</h3>

    <!-- Botones a la derecha -->
    <div class="d-flex align-items-center">
        <a href="{{ route('calendarioCitas') }}" class="btn btn-secondary me-2">
            Calendario
        </a>
        <button type="button" class="btn btn-primary" style="background-color: #6f42c1; border-color: #6f42c1;" data-bs-toggle="modal" data-bs-target="#crearCitaModal">
            Agendar Cita
        </button>
    </div>
</div>

<!-- Incluir el modal crear -->
@include('citas.crearCitas')

<!-- Buscador centrado -->
<div class="d-flex justify-content-center mb-4">
    <form method="GET" action="{{ route('indexCitas') }}" class="row g-2 w-100" style="max-width: 900px;">
        <div class="col-md-5">
            <input type="text" name="cedula" class="form-control" placeholder="Buscar por cédula del paciente" value="{{ request('cedula') }}">
        </div>
        <div class="col-md-4">
            <input type="date" name="fecha" class="form-control" value="{{ request('fecha') }}">
        </div>
        <div class="col-md-3 d-flex gap-2">
            <button class="btn btn-primary w-100" type="submit">Buscar</button>
            <a href="{{ route('indexCitas') }}" class="btn btn-secondary w-100">Limpiar</a>
        </div>
    </form>
</div>



<!-- Tabla -->
<table class="table table-hover table-bordered shadow-sm" style="background-color: #f8f1ff;">
    <thead style="background-color: #e5d4ff;">
        <tr>
            <th>Paciente</th>
            <th>Usuario</th>
            <th>Odontólogo</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($citas as $cita)
        <tr>
            <td>{{ optional($cita->paciente)->nombre_p }} {{ optional($cita->paciente)->nombre_s }} {{ optional($cita->paciente)->apellido_p }} {{ optional($cita->paciente)->apellido_s }}</td>
            <td>{{ optional($cita->usuario)->usuario }}</td>
            <td>{{ $cita->odontologo }}</td>
            <td>{{ $cita->fecha }}</td>
            <td>{{ $cita->hora }}</td>
            <td>
                <span class="badge 
                    @if($cita->estado == 'Pendiente') bg-warning
                    @elseif($cita->estado == 'Confirmada') bg-success
                    @elseif($cita->estado == 'Cancelada') bg-danger
                    @else bg-secondary @endif">
                    {{ $cita->estado }}
                </span>
            </td>
            <td class="d-flex justify-content-center align-items-center gap-2">

                <!-- Botón Cambiar Estado -->
                <a href="#" class="btn btn-sm btn-info d-flex align-items-center"
                    data-bs-toggle="modal" data-bs-target="#cambiarEstadoModal"
                    data-cita='@json($cita)' onclick="mostrarModalEstadoCita(this)">
                    <i class="bi bi-arrow-repeat me-1"></i> Estado
                </a>

                <!-- Botón Editar -->
                <a href="#" class="btn btn-sm btn-warning d-flex align-items-center"
                    data-bs-toggle="modal" data-bs-target="#editarCitaModal"
                    data-cita='@json($cita)' onclick="mostrarModalEditarCita(this)">
                    <i class="bi bi-pencil-square me-1"></i> Editar
                </a>

                <!-- Botón Eliminar -->
                <a href="#" class="btn btn-sm btn-danger d-flex align-items-center"
                    data-bs-toggle="modal" data-bs-target="#eliminarCitaModal"
                    data-cita='@json($cita)' onclick="mostrarModalEliminarCita(this)">
                    <i class="bi bi-trash me-1"></i> Eliminar
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">No hay citas registradas.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@include('citas.editarCitas')
@include('citas.eliminarCitas')
@include('citas.estadoCitas')

<!-- Paginación -->
<div class="d-flex justify-content-center">
    {{ $citas->links() }}
</div>

@endsection