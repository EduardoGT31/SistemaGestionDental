@extends('layouts.admin')

@section('titulo', 'Historial Clínico')

@section('contenido')
<div class="container mt-4">

    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-purple fw-bold">Historial Clínico del Paciente</h3>
        <a href="{{ route('indexPaciente') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Regresar
        </a>
    </div>

    <div class="card mb-4 shadow-sm p-3">
        <div class="d-flex justify-content-between align-items-start">
            <div class="patient-info" style="font-size: 1.1rem; line-height: 1.6; width: 85%;">
                <div class="row gx-4 gy-2">
                    <div class="col-md-3">
                        <p class="mb-1"><strong style="color: #000;">Cédula:</strong> {{ $paciente->cedula }}</p>
                    </div>
                    <div class="col-md-9">
                        <p class="mb-1"><strong style="color: #000;">Nombre:</strong>
                            {{ $paciente->nombre_p }} {{ $paciente->nombre_s }} {{ $paciente->apellido_p }} {{ $paciente->apellido_s }}
                        </p>
                    </div>
                </div>
                <div class="row gx-4 gy-2 mt-1">
                    <div class="col-md-3">
                        <p class="mb-1"><strong style="color: #000;">Género:</strong> {{ $paciente->genero }}</p>
                    </div>
                    <div class="col-md-3">
                        <p class="mb-1"><strong style="color: #000;">Fecha Nac.:</strong> {{ $paciente->fecha_nacimiento }}</p>
                    </div>
                </div>
                <div class="row gx-4 gy-2 mt-1">
                    <div class="col-md-3">
                        <p class="mb-1"><strong style="color: #000;">Teléfono:</strong> {{ $paciente->telefono }}</p>
                    </div>
                    <div class="col-md-3">
                        <p class="mb-1"><strong style="color: #000;">Dirección:</strong> {{ $paciente->direccion }}</p>
                    </div>
                </div>
            </div>

            <div style="width: 15%;">
                <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#crearHistoriaModal">
                    <i class="bi bi-plus-lg"></i> Nueva Historia
                </button>
            </div>
        </div>
    </div>

</div>

<!-- Incluir el modal crear -->
@include('historialClinico.crearHistorialClinico')


<!-- Historiales Anteriores -->
<div class="card shadow-sm mt-4">
    <div class="card-header bg-primary text-white fw-bold">
        Historiales Anteriores
    </div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Odontologo</th>
                    <th>Tratamiento</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($historiales as $historia)
                <tr>
                    <td>{{ $historia->fecha }}</td>
                    <td>Dr. {{ $historia->odontologo }}</td>
                    <td>{{ $historia->tipo_tratamiento }}</td>
                    <td>
                        <div class="d-flex flex-wrap justify-content-center gap-2">

                            <!-- Botón Detalles -->
                            <a href="#" class="btn btn-sm btn-info d-flex align-items-center text-white"
                                data-bs-toggle="modal" data-bs-target="#detallesHistorialModal"
                                data-historial='@json($historia)'
                                onclick="mostrarModalDetallesHistorial(this)">
                                <i class="bi bi-info-circle me-1"></i> Detalles
                            </a>


                            <!-- Botón Editar -->
                            <a href="#" class="btn btn-sm btn-warning d-flex align-items-center"
                                data-bs-toggle="modal"
                                data-bs-target="#editarHistorialModal"
                                data-href="{{ route('updateHistorialClinico', ['id_paciente' => $historia->id_historial_clinico]) }}"
                                data-historial='@json($historia)'
                                onclick="mostrarModalEditarHistorial(this)">
                                <i class="bi bi-pencil-square me-1"></i> Editar
                            </a>

                            <!-- Botón Eliminar -->
                            <a href="#" class="btn btn-sm btn-danger d-flex align-items-center"
                                data-bs-toggle="modal"
                                data-bs-target="#eliminarHistorialModal"
                                data-historial='@json($historia)'
                                onclick="mostrarModalEliminarHistorial(this)">
                                <i class="bi bi-trash me-1"></i> Eliminar
                            </a>

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <div class="d-flex flex-wrap justify-content-center gap-2">
                        <td colspan="4" class="text-center">No hay historias registradas.</td>
                    </div>
                </tr>
                @endforelse
            </tbody>
        </table>

        @include('historialClinico.editarHistorialClinico')
        @include('historialClinico.eliminarHistorialClinico')
        @include('historialClinico.detalleHistorialClinico')

    </div>
</div>

<!-- Paginación -->
<div class="d-flex justify-content-center mt-3">
    {{ $historiales->links() }}
</div>

</div>
@endsection