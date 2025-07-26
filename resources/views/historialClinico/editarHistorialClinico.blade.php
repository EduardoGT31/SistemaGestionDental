<!-- Modal Editar Historial -->
<div class="modal fade" id="editarHistorialModal" tabindex="-1" aria-labelledby="editarHistorialModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="editarHistorialModalLabel">Editar Historial Clínico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <form id="formEditarHistorial" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="id" id="editar_id">
                    <input type="hidden" name="id_paciente" id="id_paciente">
                    <input type="hidden" name="id_historial_clinico" id="id_historial_clinico">

                    <div class="mb-3">
                        <label for="editar_pieza_dental" class="form-label">Pieza Dental</label>
                        <input type="text" name="pieza_dental" class="form-control" id="editar_pieza_dental">
                    </div>

                    <div class="mb-3">
                        <label for="editar_tipo_tratamiento" class="form-label">Tipo de Tratamiento</label>
                        <input type="text" name="tipo_tratamiento" class="form-control" id="editar_tipo_tratamiento">
                    </div>

                    <div class="mb-3">
                        <label for="editar_motivo_consulta" class="form-label">Motivo de Consulta</label>
                        <input type="text" name="motivo_consulta" class="form-control" id="editar_motivo_consulta">
                    </div>

                    <div class="mb-3">
                        <label for="editar_observaciones" class="form-label">Observaciones</label>
                        <textarea name="observaciones" class="form-control" rows="3" id="editar_observaciones"></textarea>
                    </div>
                </div>

                <!-- Botones -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn bg-warning text-dark">Guardar Historial</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function mostrarModalEditarHistorial(button) {
        const historial = JSON.parse(button.getAttribute('data-historial'));
        const url = button.getAttribute('data-href');
        
        document.getElementById('id_historial_clinico').value = historial.id_historial_clinico;
        document.getElementById('editar_pieza_dental').value = historial.pieza_dental;
        document.getElementById('editar_tipo_tratamiento').value = historial.tipo_tratamiento;
        document.getElementById('editar_motivo_consulta').value = historial.motivo_consulta;
        document.getElementById('editar_observaciones').value = historial.observaciones;

        //Establecer la URL en el formulario
        document.getElementById('formEditarHistorial').action = url;

    }
</script>