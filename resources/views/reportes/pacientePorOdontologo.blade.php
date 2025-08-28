@extends('layouts.admin')

@section('titulo', 'Pacientes Por Odontólogo')

@section('contenido')

<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4" style="width: 500px; border-radius: 15px;">
        <h3 class="text-center mb-4">📄 Reporte de Pacientes</h3>

        <form action="{{ route('reportes.generarPorOdontologo') }}" method="POST" target="_blank">
            @csrf
            <div class="mb-3">
                <label for="odontologo" class="form-label fw-bold">Seleccione un odontólogo:</label>
                <select name="id_odontologo" id="odontologo" class="form-select text-center" required>
                    <option value="">-- Seleccione --</option>
                    @foreach($odontologos as $od)
                        <option value="{{ $od->id_usuario }}">
                            Dr. {{ $od->nombre_p }} {{ $od->nombre_s }} {{ $od->apellido_p }} {{ $od->apellido_s }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="text-center mt-4">
                <button type="submit" id="btnGenerar" class="btn btn-danger px-4" disabled>
                    <i class="bi bi-file-earmark-pdf me-2"></i> Generar Reporte
                </button>
            </div>
        </form>

        {{-- Botón de regreso --}}
        <div class="text-center mt-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary px-4">
                <i class="bi bi-arrow-left-circle me-2"></i> Regresar
            </a>
        </div>
    </div>
</div>

{{-- Script para habilitar/deshabilitar botón --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectOdontologo = document.getElementById("odontologo");
        const btnGenerar = document.getElementById("btnGenerar");

        selectOdontologo.addEventListener("change", function() {
            btnGenerar.disabled = (this.value === "");
        });
    });
</script>

@endsection
