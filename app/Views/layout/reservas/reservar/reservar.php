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
                <a class="btn btn-primary " href="<?php echo base_url() ?>reservas/hotel" role="button">Volver</a>

            </div>
        </div>
        <br><br>
        <div class="container-fluid px-4 dataTable-container">
            <label for="">Todos los campos con (<font color="red">*</font>) son obligatorios.</label>

            <form id="crearReservaForm">
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
                    <label for="paquete_id">Paquete</label>
                    <textarea name='descripcion' id='descripcion' class='form-control' rows='10' placeholder='Descripción'></textarea>

                </div>
                <div class="form-group">
                    <label for="guia_id">Guía(<font color="red">*</font>)</label>
                    <select class="form-control" id="guia_id" name="guia_id" required>
                    <option value="0">Seleccionar..</option>
                        <?php foreach ($guias as $guia) : ?>
                            <option value="<?= $guia['id']; ?>"><?= $guia['nombre']; ?></option>
                        <?php endforeach; ?>
                        <option value="Sin Guia">Sin Guía</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha_reserva">Fecha de Reserva(<font color="red">*</font>)</label>
                    <input type="date" class="form-control" id="fecha_reserva" name="fecha_reserva" required>
                </div>
                <div class="form-group">
                    <label for="costo">costo(<font color="red">*</font>)</label>
                    <input type="text" id="costo", name="costo">
                    <!-- <input type="number" class="form-control valid validNumber" id="costo" name="costo" placeholder="Ingresa el valor del paquete" required> -->
                </div>
                <button type="submit" class="btn btn-success">Registar Reserva</button>
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

    <script>

    </script>

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