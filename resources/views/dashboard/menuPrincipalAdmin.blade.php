@extends('layouts.admin')

@section('titulo', 'Menú Principal')

@section('contenido')
<h2 class="mb-4" style="color: #6f42c1;">Menú de Administración - Clínica Dental</h2>

<div class="row g-4">
    <!-- Usuarios -->
    <div class="col-md-4">
        <div class="menu-card card">
            <div class="card-body">
                <i class="bi bi-people" style="color: #6f42c1;"></i>
                <h5 class="mt-3">Usuarios</h5>
                <p>Gestionar usuarios y roles.</p>
                <a href="{{ route('indexUsuarios') }}" class="btn w-100 text-white" style="background-color: #6f42c1;">Acceder</a>
            </div>
        </div>
    </div>

    <!-- Pacientes -->
    <div class="col-md-4">
        <div class="menu-card card">
            <div class="card-body">
                <i class="bi bi-person-lines-fill" style="color: #6f42c1;"></i>
                <h5 class="mt-3">Pacientes</h5>
                <p>Administrar datos clínicos.</p>
                <a href="{{ route('indexPaciente') }}" class="btn w-100 text-white" style="background-color: #6f42c1;">Acceder</a>
            </div>
        </div>
    </div>

    <!-- Citas -->
    <div class="col-md-4">
        <div class="menu-card card">
            <div class="card-body">
                <i class="bi bi-calendar-check" style="color: #6f42c1;"></i>
                <h5 class="mt-3">Citas</h5>
                <p>Organizar horarios y turnos.</p>
                <a href="{{ route('calendarioCitas') }}" class="btn w-100 text-white" style="background-color: #6f42c1;">Acceder</a>
            </div>
        </div>
    </div>

    <!-- Reportes -->
    <div class="col-md-4">
        <div class="menu-card card">
            <div class="card-body">
                <i class="bi bi-bar-chart-line" style="color: #6f42c1;"></i>
                <h5 class="mt-3">Reportes</h5>
                <p>Generar estadísticas y análisis.</p>
                <a href="#" class="btn w-100 text-white" style="background-color: #6f42c1;">Acceder</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection