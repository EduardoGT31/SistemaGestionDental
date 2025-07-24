@extends('layouts.admin')

@section('titulo', 'Historial Clínico')

@section('contenido')
<div class="container mt-4">

    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-purple fw-bold">Historial Clínico del Paciente</h3>
        <a href="#" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Regresar
        </a>
    </div>

    <!-- Información del Paciente -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-info text-white fw-bold">
            Información del Paciente
        </div>
        <div class="card-body row">
            <div class="col-md-6">
                <p><strong>Nombre:</strong> {{ $paciente->nombre_p }} {{ $paciente->nombre_s }} {{ $paciente->apellido_p }} {{ $paciente->apellido_s }}</p>
                <p><strong>Cédula:</strong> {{ $paciente->cedula }}</p>
                <p><strong>Género:</strong> {{ $paciente->genero }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Fecha de Nacimiento:</strong> {{ $paciente->fecha_nacimiento }}</p>
                <p><strong>Teléfono:</strong> {{ $paciente->telefono }}</p>
                <p><strong>Dirección:</strong> {{ $paciente->direccion }}</p>
            </div>
        </div>
    </div>

    <!-- Sección inferior: formulario + historial -->
    <div class="row">
        <!-- Formulario crear historia -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    Nueva Historia Clínica
                </div>
                <div class="card-body">
                    <form action="{{ route('storeHistorialClinico', ['id' => $paciente->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">

                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" name="fecha" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="motivo_consulta" class="form-label">Motivo de Consulta</label>
                            <textarea name="motivo_consulta" class="form-control" rows="2"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="diagnostico" class="form-label">Diagnóstico</label>
                            <textarea name="diagnostico" class="form-control" rows="2"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="tratamiento" class="form-label">Tratamiento</label>
                            <textarea name="tratamiento" class="form-control" rows="2"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="observaciones" class="form-label">Observaciones</label>
                            <textarea name="observaciones" class="form-control" rows="2"></textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="pieza_dental" class="form-label">Pieza Dental</label>
                                <input type="text" name="pieza_dental" class="form-control">
                            </div>
                            <div class="col">
                                <label for="tipo_tratamiento" class="form-label">Tipo de Tratamiento</label>
                                <input type="text" name="tipo_tratamiento" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="odontologo_id" class="form-label">Odontólogo</label>
                            <select name="odontologo_id" class="form-select" required>
                                <option value="" disabled selected>Seleccione un odontólogo</option>
                                @foreach ($odontologos as $odontologo)
                                    <option value="{{ $odontologo->id }}">{{ $odontologo->nombre_p }} {{ $odontologo->apellido_p }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Guardar Historia Clínica</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Lista de historias -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    Historiales Anteriores
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Odontólogo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($historiales as $historia)
                            <tr>
                                <td>{{ $historia->fecha }}</td>
                                <td>{{ $historia->odontologo->nombre_p }} {{ $historia->odontologo->apellido_p }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="#" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $historia->id }}">
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">No hay historias registradas.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
