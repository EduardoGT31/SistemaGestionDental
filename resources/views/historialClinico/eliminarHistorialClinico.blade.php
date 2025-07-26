<!-- Modal Eliminar Historial -->
<div class="modal fade" id="eliminarHistorialModal" tabindex="-1" aria-labelledby="eliminarHistorialModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEliminarHistorial" method="POST" action="{{ route('deleteHistorialClinico') }}">
            @csrf
            @method('DELETE')
            <input type="hidden" id="eliminar_id_historial" name="id_historial_clinico">

            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="eliminarHistorialModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar este historial clínico?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function mostrarModalEliminarHistorial(elemento) {
        const historial = JSON.parse(elemento.getAttribute('data-historial'));
        document.getElementById('eliminar_id_historial').value = historial.id_historial_clinico;
    }
</script>
