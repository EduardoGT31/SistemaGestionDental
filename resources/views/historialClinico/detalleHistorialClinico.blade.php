<!-- Modal Detalles -->
<div class="modal fade" id="detallesHistorialModal" tabindex="-1" aria-labelledby="detallesHistorialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="detallesHistorialModalLabel">Detalles del Historial Clínico</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <p class="mb-1"><strong>Odontólogo:</strong></p>
                        <p id="detalle_odontologo" class="form-control-plaintext border rounded p-2 bg-light"></p>
                    </div>

                    <div class="col-md-6">
                        <p class="mb-1"><strong>Fecha:</strong></p>
                        <p id="detalle_fecha" class="form-control-plaintext border rounded p-2 bg-light"></p>
                    </div>

                    <div class="col-md-6">
                        <p class="mb-1"><strong>Pieza Dental:</strong></p>
                        <p id="detalle_pieza_dental" class="form-control-plaintext border rounded p-2 bg-light"></p>
                    </div>

                    <div class="col-md-6">
                        <p class="mb-1"><strong>Tipo de Tratamiento:</strong></p>
                        <p id="detalle_tipo_tratamiento" class="form-control-plaintext border rounded p-2 bg-light"></p>
                    </div>

                    <div class="col-12">
                        <p class="mb-1"><strong>Motivo de Consulta:</strong></p>
                        <p id="detalle_motivo_consulta" class="form-control-plaintext border rounded p-2 bg-light"></p>
                    </div>

                    <div class="col-12">
                        <p class="mb-1"><strong>Diagnóstico:</strong></p>
                        <p id="detalle_diagnostico" class="form-control-plaintext border rounded p-2 bg-light"></p>
                    </div>

                    <div class="col-12">
                        <p class="mb-1"><strong>Observaciones:</strong></p>
                        <p id="detalle_observaciones" class="form-control-plaintext border rounded p-2 bg-light"></p>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>


<script>
    function mostrarModalDetallesHistorial(elemento) {
        const historial = JSON.parse(elemento.getAttribute('data-historial'));

        document.getElementById('detalle_odontologo').textContent = historial.odontologo;
        document.getElementById('detalle_fecha').textContent = historial.fecha;
        document.getElementById('detalle_motivo_consulta').textContent = historial.motivo_consulta;
        document.getElementById('detalle_diagnostico').textContent = historial.diagnostico;
        document.getElementById('detalle_observaciones').textContent = historial.observaciones;
        document.getElementById('detalle_pieza_dental').textContent = historial.pieza_dental;
        document.getElementById('detalle_tipo_tratamiento').textContent = historial.tipo_tratamiento;
    }
</script>