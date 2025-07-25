<!-- Modal Eliminar Usuario -->
<div class="modal fade" id="eliminarUsuarioModal" tabindex="-1" aria-labelledby="eliminarUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('eliminarUsuario') }}" method="POST" >
            @csrf
            @method('DELETE')
            <input type="hidden" id="eliminar_id" name="id_usuario"> 

            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="eliminarUsuarioModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar al usuario <strong id="nombreEliminar"></strong>?
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
    function mostrarModalEliminar(elemento) {
        const usuario = JSON.parse(elemento.getAttribute('data-usuario'));

        document.getElementById('eliminar_id').value = usuario.id_usuario;
        document.getElementById('nombreEliminar').textContent = usuario.nombre_p + ' ' + usuario.apellido_p;
    }
</script>

