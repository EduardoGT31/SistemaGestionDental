<!-- Modal Cambiar Estado -->
<div class="modal fade" id="cambiarEstadoModal" tabindex="-1" aria-labelledby="cambiarEstadoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('cambiarEstadoCita') }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id_cita" id="estado_id_cita">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cambiar Estado de la Cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <select class="form-select" name="estado" id="estado_nuevo" required>
                        <option value="">Seleccione un estado</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Confirmada">Confirmada</option>
                        <option value="Cancelada">Cancelada</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function mostrarModalEstadoCita(btn) {
        const cita = JSON.parse(btn.getAttribute('data-cita'));
        document.getElementById('estado_id_cita').value = cita.id_cita;
        document.getElementById('estado_nuevo').value = cita.estado;
    }
</script>