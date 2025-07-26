<!-- Modal -->
<div class="modal fade" id="crearHistoriaModal" tabindex="-1" aria-labelledby="crearHistoriaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="crearHistoriaModalLabel">Nueva Historia Clínica</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('storeHistorialClinico', ['id_paciente' => $paciente->id_paciente]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_paciente" value="{{ $paciente->id_paciente }}">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" name="fecha" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="odontologo" class="form-label">Odontólogo</label>
                            <select name="odontologo" class="form-select" required>
                                <option value="" disabled selected>Seleccione un odontólogo</option>
                                @foreach ($odontologos as $odontologo)
                                <option value="{{ $odontologo->nombre_p }} {{ $odontologo->nombre_s }} {{ $odontologo->apellido_p }} {{ $odontologo->apellido_s }}">
                                    Dr. {{ $odontologo->nombre_p }} {{ $odontologo->nombre_s }} {{ $odontologo->apellido_p }} {{ $odontologo->apellido_s }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="pieza_dental" class="form-label">Pieza Dental</label>
                            <input type="text" name="pieza_dental" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="tipo_tratamiento" class="form-label">Tipo de Tratamiento</label>
                            <input type="text" name="tipo_tratamiento" class="form-control">
                        </div>
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
                        <label for="observaciones" class="form-label">Observaciones</label>
                        <textarea name="observaciones" class="form-control" rows="2"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar Historia Clínica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>