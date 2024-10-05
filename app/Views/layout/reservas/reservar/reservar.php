<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: auto;">
            <div class="content-container py-3">
                <h1 style="color: white;">Reservar paquete</h1>
                <h6 style="color: white;">Administración de reservación</h6>
            </div>
        </div>
        <div class="container-fluid px-4 mt-4">
            <div class="d-flex justify-content-start mb-3">
                <a class="btn btn-primary" href="<?php echo base_url() ?>reservas/hotel" role="button">Volver</a>
            </div>
        </div>
        <br><br>
        <div class="container-fluid px-4 dataTable-container">
            <label for="">Todos los campos con (<font color="red">*</font>) son obligatorios.</label>

            <form id="crearReservaForm">
                <input type="hidden" id="valor" name="valor">
                <div class="form-group">
                    <label for="cliente_id">Cliente(<font color="red">*</font>)</label>
                    <select class="form-control" id="cliente_id" name="cliente_id" required>
                        <option value="0">Seleccionar..</option>
                        <?php foreach ($clientes as $cliente) : ?>
                            <option value="<?= $cliente['id']; ?>"><?= $cliente['nombre']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="paquete_id">Nombre de paquete(<font color="red">*</font>)</label>
                    <select class="form-control" id="paquete_id" name="paquete_id" required>
                        <option value="0">Seleccionar..</option>
                        <?php foreach ($paquetes as $paquete) : ?>
                            <option value="<?= $paquete['id']; ?>"><?= $paquete['nombre_paquete']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción del paquete</label>
                    <textarea name='descripcion' id='descripcion' class='form-control' rows='3' placeholder='Descripción'></textarea>
                </div>
                <div class="form-group">
                    <label for="guia_id">Guía(<font color="red">*</font>)</label>
                    <select class="form-control" id="guia_id" name="guia_id" required>
                        <option value="0">Seleccionar..</option>
                        <option value="Sin Guia">Sin Guía</option>
                        <?php foreach ($guias as $guia) : ?>
                            <option value="<?= $guia['id']; ?>"><?= $guia['nombre']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha_reserva">Fecha de Reserva(<font color="red">*</font>)</label>
                    <input type="date" class="form-control" id="fecha_reserva" name="fecha_reserva" required>
                </div>

                <div class="form-group">
                    <label for="costo">Costo(<font color="red">*</font>)</label>
                    <input type="text" class="form-control" id="costo" name="costo" disabled>
                </div>

                <div class="form-group">
                    <label for="tipo_pago">Tipo de pago(<font color="red">*</font>)</label>
                    <select class="form-control" id="tipo_pago" name="tipo_pago" required onchange="handlePaymentType()">
                        <option value="0">Seleccionar..</option>
                        <option value="contado">Contado</option>
                        <option value="abono">Abono</option>
                    </select>
                </div>

                <!-- Input para el abono que estará oculto inicialmente -->
                <div class="form-group" id="abono_container" style="display: none;">
                    <label for="abono">Abono(<font color="red">*</font>)</label>
                    <input type="number" class="form-control" id="abono" name="abono" placeholder="Ingrese el valor del abono">
                </div>

                <button type="submit" class="btn btn-success">Registrar Reserva</button>
            </form>
        </div>
    </main>


    <!-- Modal para ver factura -->
    <div class="modal fade" id="facturaModal" tabindex="-1" aria-labelledby="facturaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="facturaModalLabel">Factura</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="facturaContent">
                    <!-- Los detalles de la factura se cargarán aquí mediante AJAX -->
                </div>
            </div>
        </div>
    </div>



    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Todos los derechos reservados por Jojama 2024</div>
                <div>
                    <a href="https://hammenamena.mercadoshops.com.co/" target="_blank" class="text-muted">Visita nuestro sitio web</a>
                </div>
            </div>
        </div>
    </footer>


    <script>
        function handlePaymentType() {
            const tipoPago = document.getElementById('tipo_pago').value;
            const abonoContainer = document.getElementById('abono_container');

            if (tipoPago === 'abono') {
                // Mostrar el campo para el abono
                abonoContainer.style.display = 'block';
                realizarConsultaContado('abono');
            } else if (tipoPago === 'contado') {
                // Ocultar el campo de abono y realizar la consulta
                abonoContainer.style.display = 'none';
                realizarConsultaContado('contado');
            } else {
                // Si no se ha seleccionado ninguna opción o "Seleccionar"
                abonoContainer.style.display = 'none';
            }
        }

        function realizarConsultaContado(tipo) {
            const paqueteId = document.getElementById('paquete_id').value;

            // Verificar que se haya seleccionado un paquete antes de hacer la consulta
            if (paqueteId !== "0") {
                // Aquí puedes hacer la llamada AJAX o una consulta según lo que necesites
                // para obtener los datos relacionados con el paquete al pagar de contado.
                // Por ejemplo:
                fetch(`<?php echo base_url() ?>reservas/paquete_descripcion/${paqueteId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Asigna el costo al input de costo
                        document.getElementById('costo').value = data.costo;
                        document.getElementById('valor').value = data.costo;
                    })
                    .catch(error => {
                        swal({
                            title: "Error",
                            text: "Error al obtener los datos del paquete.",
                            icon: "error",
                            button: "OK",
                        });
                    });
            } else {
                swal({
                    title: "Error",
                    text: "Por favor selecciona un paquete antes de continuar.",
                    icon: "error",
                    button: "OK",
                });
            }
        }
    </script>
    <style>
        .dataTable-container {
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .dataTable-container {
                overflow-x: auto;
            }
        }
    </style>