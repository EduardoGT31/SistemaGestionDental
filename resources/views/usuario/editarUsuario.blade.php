<!-- Modal Editar Usuario -->
<div class="modal fade" id="editarUsuarioModal" tabindex="-1" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('editarUsuario') }}" method="POST" class="modal-content">
            @csrf
            @method('PUT')
            <input type="hidden" id="editar_id" name="id">

            <!-- Encabezado amarillo -->
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="editarUsuarioModalLabel">Editar Usuario</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
                <!-- Cédula -->
                <div class="mb-3">
                    <label for="editar_cedula" class="form-label">Cédula</label>
                    <input type="text" class="form-control" id="editar_cedula" name="cedula" required>
                </div>

                <!-- Nombres -->
                <div class="row g-3 mb-3">
                    <div class="col">
                        <label for="editar_nombre_p" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control" id="editar_nombre_p" name="nombre_p" required>
                    </div>
                    <div class="col">
                        <label for="editar_nombre_s" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" id="editar_nombre_s" name="nombre_s">
                    </div>
                </div>

                <!-- Apellidos -->
                <div class="row g-3 mb-3">
                    <div class="col">
                        <label for="editar_apellido_p" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" id="editar_apellido_p" name="apellido_p" required>
                    </div>
                    <div class="col">
                        <label for="editar_apellido_s" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="editar_apellido_s" name="apellido_s">
                    </div>
                </div>

                <!-- Usuario -->
                <div class="mb-3">
                    <label for="editar_usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="editar_usuario" name="usuario" required>
                </div>

                <!-- Teléfono -->
                <div class="mb-3">
                    <label for="editar_telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="editar_telefono" name="telefono" required>
                </div>

                <!-- Rol -->
                <div class="mb-3">
                    <label for="editar_rol" class="form-label">Rol</label>
                    <select class="form-select" id="editar_rol" name="rol" required>
                        <option value="" disabled>Seleccione un rol</option>
                        <option value="Secretaria">Secretaria</option>
                        <option value="Odontólogo">Odontólogo</option>
                        <option value="Administrador">Administrador</option>
                    </select>
                </div>
            </div>

            <!-- Pie con botón amarillo -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-warning">Actualizar</button>
            </div>
        </form>
    </div>
</div>

<!--Llenar campos de editar-->
<script>
    function mostrarModalEditar(elemento) {

        const usuario = JSON.parse(elemento.getAttribute('data-usuario'));

        document.getElementById('editar_id').value = usuario.id;
        document.getElementById('editar_cedula').value = usuario.cedula;
        document.getElementById('editar_nombre_p').value = usuario.nombre_p;
        document.getElementById('editar_nombre_s').value = usuario.nombre_s;
        document.getElementById('editar_apellido_p').value = usuario.apellido_p;
        document.getElementById('editar_apellido_s').value = usuario.apellido_s;
        document.getElementById('editar_usuario').value = usuario.usuario;
        document.getElementById('editar_telefono').value = usuario.telefono;
        document.getElementById('editar_rol').value = usuario.rol;
    }
</script>