@extends('layouts.admin')

@section('titulo', 'Gestión-Pacientes')

@section('contenido')

<!-- Título y botón Crear -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-purple fw-bold" style="color: #6f42c1;">Gestión de Pacientes</h3>
    <button type="button" class="btn btn-primary" style="background-color: #6f42c1; border-color: #6f42c1;" data-bs-toggle="modal" data-bs-target="#crearPacienteModal">
        Crear Paciente
    </button>
</div>

<!-- Incluir el modal crear -->
@include('paciente.crearPaciente')

<!-- Buscador -->
<form method="GET" action="{{ route('indexPaciente') }}">
    <div class="input-group mb-3">
        <input type="text" name="buscar" id="campoBuscar" class="form-control" placeholder="Buscar por cédula o nombres" value="{{ request('buscar') }}">
        <button class="btn btn-primary" type="submit">Buscar</button>
        <button class="btn btn-secondary" type="button" onclick="limpiarBuscador()">Limpiar</button>
    </div>
</form>

<!-- Tabla -->
<table class="table table-hover table-bordered shadow-sm" style="background-color: #f8f1ff;">
    <thead style="background-color: #e5d4ff;">
        <tr>
            <th>Cédula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Género</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pacientes as $paciente)
        <tr>
            <td>{{ $paciente->cedula }}</td>
            <td>{{ $paciente->nombre_p }} {{ $paciente->nombre_s }}</td>
            <td>{{ $paciente->apellido_p }} {{ $paciente->apellido_s }}</td>
            <td>{{ $paciente->genero }}</td>
            <td>{{ $paciente->telefono }}</td>
            <td class="d-flex justify-content-center align-items-center gap-2">

                <!-- Botón Editar -->
                <a href="{{ route('editarPaciente') }}" class="btn btn-sm btn-warning d-flex align-items-center"
                   data-bs-toggle="modal" data-bs-target="#editarPacienteModal"
                   data-paciente='@json($paciente)' onclick="mostrarModalEditarPaciente(this)">
                   <i class="bi bi-pencil-square me-1"></i> Editar
                </a>

                <!-- Botón Eliminar -->
                <a href="{{ route('eliminarPaciente') }}" class="btn btn-sm btn-danger d-flex align-items-center"
                   data-bs-toggle="modal" data-bs-target="#eliminarPacienteModal"
                   data-paciente='@json($paciente)' onclick="mostrarModalEliminarPaciente(this)">
                   <i class="bi bi-trash me-1"></i> Eliminar
                </a>

                <!-- Botón Historial Clínico -->
                <a href="{{ route('indexHistorialClinico', $paciente->id) }}" class="btn btn-sm btn-info d-flex align-items-center">
                   <i class="bi bi-file-medical me-1"></i> H. Clínica
                </a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Incluir el modales paciente -->
@include('paciente.editarPaciente')
@include('paciente.eliminarPaciente')

<!-- Paginación -->
<div class="d-flex justify-content-center mt-3">
    {{ $pacientes->links() }}
</div>

<!-- Modales -->

<script>

    function limpiarBuscador() {
        document.getElementById('campoBuscar').value = '';
        window.location.href = "{{ route('indexPaciente') }}";
    }

</script>

@endsection
