<!-- Modal Editar Paciente -->
<div class="modal fade" id="editarPacienteModal" tabindex="-1" aria-labelledby="editarPacienteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEditarPaciente" method="POST" action="{{ route('editarPaciente') }}" class="modal-content">
            @csrf
            @method('PUT')
            <input type="hidden" id="editar_id" name="id_paciente"> <!-- ID oculto -->

            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="editarPacienteModalLabel">Editar Paciente</h5>
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

                <!-- Género y fecha nacimiento -->
                <div class="row g-3 mb-3">
                    <div class="col">
                        <label for="editar_genero" class="form-label">Género</label>
                        <select class="form-select" id="editar_genero" name="genero" required>
                            <option value="">Seleccione...</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="editar_fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="editar_fecha_nacimiento" name="fecha_nacimiento" required>
                    </div>
                </div>

                <!-- Teléfono -->
                <div class="mb-3">
                    <label for="editar_telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="editar_telefono" name="telefono" required>
                </div>

                <!-- Dirección -->
                <div class="mb-3">
                    <label for="editar_direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="editar_direccion" name="direccion">
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-warning">Actualizar</button>
            </div>
        </form>
    </div>
</div>


<script>

    function mostrarModalEditarPaciente(elemento) {
        const paciente = JSON.parse(elemento.getAttribute('data-paciente'));

        document.getElementById('editar_id').value = paciente.id_paciente;
        document.getElementById('editar_cedula').value = paciente.cedula;
        document.getElementById('editar_nombre_p').value = paciente.nombre_p;
        document.getElementById('editar_nombre_s').value = paciente.nombre_s;
        document.getElementById('editar_apellido_p').value = paciente.apellido_p;
        document.getElementById('editar_apellido_s').value = paciente.apellido_s;
        document.getElementById('editar_genero').value = paciente.genero;
        document.getElementById('editar_fecha_nacimiento').value = paciente.fecha_nacimiento;
        document.getElementById('editar_telefono').value = paciente.telefono;
        document.getElementById('editar_direccion').value = paciente.direccion;
    }

</script>