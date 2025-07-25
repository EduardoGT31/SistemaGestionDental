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
    <div class="card mb-4 shadow-sm p-3">
        <div class="d-flex justify-content-between align-items-center">
            <div class="patient-info" style="font-size: 1.1rem; line-height: 1.5; width: 85%;">
                <div class="row gx-4 gy-2">
                    <div class="col-md-3">
                        <p class="mb-1">
                            <span style="font-weight: 700; color: #000;">Cédula:</span> {{ $paciente->cedula }}
                        </p>
                    </div>
                    <div class="col-md-9">
                        <p class="mb-1" >
                            <span style="font-weight: 700; color: #000; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                Nombre: 
                            </span>
                            {{ $paciente->nombre_p }} {{ $paciente->nombre_s }} {{ $paciente->apellido_p }} {{ $paciente->apellido_s }}
                        </p>
                    </div>
                </div>
                <div class="row gx-4 gy-2">
                    <div class="col-md-3">
                        <p class="mb-1">
                            <span style="font-weight: 700; color: #000;">Género:</span> {{ $paciente->genero }}
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="mb-1">
                            <span style="font-weight: 700; color: #000;">Fecha Nac.:</span> {{ $paciente->fecha_nacimiento }}
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="mb-1">
                            <span style="font-weight: 700; color: #000;">Teléfono:</span> {{ $paciente->telefono }}
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p class="mb-1">
                            <span style="font-weight: 700; color: #000;">Dirección:</span> {{ $paciente->direccion }}
                        </p>
                    </div>
                </div>
            </div>

            <div style="width: 15%;">
                <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#crearHistoriaModal">
                    <i class="bi bi-plus-lg"></i> Crear Nueva Historia
                </button>
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
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($historiales as $historia)
                    <tr>
                        <td>{{ $historia->fecha }}</td>
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
                        <td colspan="2" class="text-center">No hay historias registradas.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection