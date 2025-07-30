<!-- Modal Eliminar Cita -->
<div class="modal fade" id="eliminarCitaModal" tabindex="-1" aria-labelledby="modalEliminarCitaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEliminarCita" method="POST" action="{{ route('destroyCitas') }}">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="modalEliminarCitaLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                
                <input type="hidden" name="id_cita" id="eliminar_id_cita">

                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar esta cita?
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function mostrarModalEliminarCita(elemento) {
        const citas = JSON.parse(elemento.getAttribute('data-cita'));
        document.getElementById('eliminar_id_cita').value = citas.id_cita;
    }
</script>
