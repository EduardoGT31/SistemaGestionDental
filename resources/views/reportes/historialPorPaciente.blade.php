@extends('layouts.admin')

@section('titulo', 'Historial Por Pacientes')

@section('contenido')

<!-- Botón regresar -->
<div class="d-flex justify-content-end mb-3">
    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Regresar
    </a>
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

                <!-- Botón PDF de Historial -->
                <a href="{{ route('reportes.historial.pdf', $paciente->id_paciente) }}" target="_blank" class="btn btn-sm btn-primary">
                    <i class="bi bi-file-earmark-pdf me-1"></i> Historial PDF
                </a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Paginación -->
<div class="d-flex justify-content-center mt-3">
    {{ $pacientes->links() }}
</div>

<script>
    function limpiarBuscador() {
        document.getElementById('campoBuscar').value = '';
        window.location.href = "{{ route('indexPaciente') }}";
    }
</script>

@endsection
