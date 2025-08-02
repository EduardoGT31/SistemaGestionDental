@extends('layouts.admin')

@section('titulo', 'Reportes del Sistema')

@section('contenido')

<div class="card p-4 shadow mx-auto" style="width: 100%; max-width: 600px;">
    <h3 class="text-center mb-4 text-purple fw-bold">📄 Generar Reportes</h3>

    <div class="d-grid gap-3">
        <button class="btn btn-primary" style="background-color: #6f42c1; border-color: #6f42c1;">
            Historial clínico por paciente
        </button>
        <button class="btn btn-primary" style="background-color: #6f42c1; border-color: #6f42c1;">
            Pacientes atendidos por odontólogo
        </button>
        <button class="btn btn-primary" style="background-color: #6f42c1; border-color: #6f42c1;">
            Citas del día
        </button>
        <button class="btn btn-primary" style="background-color: #6f42c1; border-color: #6f42c1;">
            Listado general de pacientes
        </button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver al inicio</a>
    </div>
</div>

@endsection
