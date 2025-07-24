<!-- Modal Eliminar Paciente -->
<div class="modal fade" id="eliminarPacienteModal" tabindex="-1" aria-labelledby="eliminarPacienteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEliminarPaciente" method="POST" action="{{ route('eliminarPaciente') }}">
            @csrf
            @method('DELETE')
            <input type="hidden" id="eliminar_id" name="id">

            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="eliminarPacienteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar a <strong id="nombreEliminarPaciente"></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Script para llenar el modal -->
<script>
    function mostrarModalEliminarPaciente(elemento) {
        const paciente = JSON.parse(elemento.getAttribute('data-paciente'));
        document.getElementById('eliminar_id').value = paciente.id;
        document.getElementById('nombreEliminarPaciente').textContent = paciente.nombre_p + ' ' + paciente.apellido_p;
    }
</script>
