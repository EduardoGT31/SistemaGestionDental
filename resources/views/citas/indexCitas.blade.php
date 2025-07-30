@extends('layouts.admin')

@section('titulo', 'Gestión-Citas')

@section('contenido')

<!-- Título y botón Crear -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-purple fw-bold" style="color: #6f42c1;">Gestión de Citas</h3>
    <button type="button" class="btn btn-primary" style="background-color: #6f42c1; border-color: #6f42c1;" data-bs-toggle="modal" data-bs-target="#crearCitaModal">
        Agendar Cita
    </button>
</div>

<!-- Incluir el modal crear -->
@include('citas.crearCitas')

<!-- Buscador -->
<form method="GET" action="#">
    <div class="input-group mb-3">
        <input type="text" name="buscar" id="campoBuscar" class="form-control" placeholder="Buscar por paciente u odontólogo" value="#">
        <button class="btn btn-primary" type="submit">Buscar</button>
        <button class="btn btn-secondary" type="button" onclick="limpiarBuscador()">Limpiar</button>
    </div>
</form>

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
            <td>{{ $cita->paciente->nombre_p }} {{ $cita->paciente->apellido_p }}</td>
            <td>{{ $cita->usuario->nombre_p }} {{ $cita->usuario->apellido_p }}</td>
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

<!-- Paginación -->
<div class="d-flex justify-content-center">
    {{ $citas->links() }}
</div>

@endsection
