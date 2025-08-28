@extends('layouts.admin')

@section('titulo', 'Reportes del Sistema')

@section('contenido')

<div class="card shadow p-4 mx-auto" style="max-width: 600px;">
    <h3 class="text-center mb-4 text-purple fw-bold">📄 Generar Reportes</h3>

    <div class="d-grid gap-3">
        <a href="{{ route('reporte.HistorialPaciente') }}" class="btn btn-primary btn-lg d-flex align-items-center justify-content-center">
            <i class="bi bi-file-earmark-medical me-2"></i> Historial clínico por paciente
        </a>

        <a href="{{ route('reportes.vistaPorOdontologo') }}" class="btn btn-primary btn-lg d-flex align-items-center justify-content-center">
            <i class="bi bi-people-fill me-2"></i> Pacientes atendidos por odontólogo
        </a>

        <a href="{{ route('reportes.citas.hoy') }}" target="_blank" class="btn btn-success btn-lg d-flex align-items-center justify-content-center">
            <i class="bi bi-calendar-day me-2"></i> Citas de Hoy
        </a>

        <a href="{{ route('inicioAdmin') }}" class="btn btn-secondary btn-lg d-flex align-items-center justify-content-center">
            <i class="bi bi-arrow-left me-2"></i> Volver al inicio
        </a>
    </div>
</div>

@endsection