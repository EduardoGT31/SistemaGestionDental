<!-- Modal Crear Paciente -->
<div class="modal fade" id="crearPacienteModal" tabindex="-1" aria-labelledby="crearPacienteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('crearPaciente') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="crearPacienteModalLabel">Crear Nuevo Paciente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <!-- Cédula -->
                <div class="mb-3">
                    <label for="cedula" class="form-label">Cédula</label>
                    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingrese la cédula" required>
                </div>

                <!-- Nombres lado a lado -->
                <div class="row g-3 mb-3">
                    <div class="col">
                        <label for="nombre_p" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control" id="nombre_p" name="nombre_p" placeholder="Primer Nombre" required>
                    </div>
                    <div class="col">
                        <label for="nombre_s" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" id="nombre_s" name="nombre_s" placeholder="Segundo Nombre">
                    </div>
                </div>

                <!-- Apellidos lado a lado -->
                <div class="row g-3 mb-3">
                    <div class="col">
                        <label for="apellido_p" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" id="apellido_p" name="apellido_p" placeholder="Primer Apellido" required>
                    </div>
                    <div class="col">
                        <label for="apellido_s" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="apellido_s" name="apellido_s" placeholder="Segundo Apellido">
                    </div>
                </div>

                <!-- Género y Fecha de Nacimiento -->
                <div class="row g-3 mb-3">
                    <div class="col">
                        <label for="genero" class="form-label">Género</label>
                        <select class="form-select" id="genero" name="genero" required>
                            <option value="" disabled selected>Seleccione el género</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                    </div>
                </div>

                <!-- Teléfono -->
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Número de teléfono" required>
                </div>

                <!-- Dirección -->
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección del paciente">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" style="background-color: #6f42c1; border-color: #6f42c1;">Guardar</button>
            </div>
        </form>
    </div>
</div>
