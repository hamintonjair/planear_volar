<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: auto;">
            <div class="content-container py-3">
                <h1 style="color: white;">Crear reserva turistica</h1>
                <h6 style="color: white;">Administración </h6>
            </div>
        </div>
        <div class="container-fluid px-4 mt-4">
            <div class="d-flex justify-content-start mb-3">
                <a class="btn btn-success " href="<?php echo base_url() ?>reservas/crear" role="button">Crear Reserva</a>
                <button class="btn btn-primary ml-2" onclick="abonar();" data-toggle="modal">Abonar</button>

            </div>
        </div>
        <br><br>
        <div class="container-fluid px-4 dataTable-container">
            <table class="table table-striped table-bordered" style="width:100%" id="TableReservaTuristica">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Paquete</th>
                        <th>Guía</th>
                        <th>Fecha Reserva</th>
                        <th>Costo</th>
                        <th>Pago</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservas as $reserva) : ?>
                        <tr>
                            <td><?= $reserva['id']; ?></td>
                            <td><?= $reserva['cliente_nombre']; ?></td>
                            <td><?= $reserva['paquete_nombre']; ?></td>
                            <td><?= $reserva['guia_nombre']; ?></td>
                            <td><?= $reserva['fecha_reserva']; ?></td>
                            <td><?= number_format($reserva['costo'], 0, ',', '.'); ?></td>
                            <td><?= number_format($reserva['abono'], 0, ',', '.'); ?></td>
                            <?php if (($reserva['estado'] == 'Reservado')) { ?>
                                <td><span class="badge badge-success"><?= $reserva['estado']; ?></span></td>

                            <?php } else {; ?>
                                <td><span class="badge badge-danger"><?= $reserva['estado']; ?></span></td>
                            <?php } ?>
                            <td>
                                <a href="<?= base_url('reservas/generarFactura/' . $reserva['id']); ?>" class="btn btn-danger" target="_blank"> <i class="fas fa-file-pdf"></i></a>

                                <?php
                                if ($reserva['estado'] == 'Reservado') { ?>
                                    <!-- desabilitar restaurar -->
                                    <a href="<?= base_url('reservas/anular/' . $reserva['id']); ?>" class="btn btn-warning"> <i class="fas fa-times" disabled></i></a>


                                <?php  } else {; ?>
                                    <!-- habilitar restaurar y desabilita anular -->
                                    <a href="<?= base_url('reservas/restaurar/' . $reserva['id']); ?>" class="btn btn-success">
                                        <i class="fas fa-redo"></i>
                                    </a>

                                <?php } ?>


                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </main>
    <!-- Modal para abonar -->

    <div class="modal fade" id="ModalAbono" tabindex="-1" role="dialog" aria-labelledby="modalAbonoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #25142d; color:white">
                    <h5 class="modal-title" id="modalAbonoLabel">Abonar a Deuda</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmAbono" autocomplete="off" enctype="multipart/form-data">
                        <!-- Lista de clientes con deuda -->
                        <div class="form-group">
                            <label for="clienteConDeuda">Selecciona un cliente con deuda</label>
                            <select name="clienteConDeuda" id="clienteConDeuda" class="form-control" required onchange="abonos()">
                                <!-- Iterar sobre los clientes con deuda -->
                                <option value="0">Seleccionar..</option>
                                <?php foreach ($reservas as $reserva) : ?>
                                    <?php if($reserva['estado'] == "Reservado"){?>
                                        <?php if ($reserva['costo'] > $reserva['abono']) : ?>
                                            <option value="<?= $reserva['id']; ?>" data-deuda="<?= $reserva['costo'] - $reserva['abono']; ?>">
                                                <?= $reserva['cliente_nombre']; ?> - Deuda: <?= number_format($reserva['costo'] - $reserva['abono'], 0, ',', '.'); ?>
                                            </option>
                                        <?php endif;} ?>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <!-- Campo para el valor del abono -->
                        <div class="form-group">
                            <label for="valorAbono">Valor del abono</label>
                            <input type="number" name="valorAbono" id="valorAbono" class="form-control" placeholder="Ingresa el valor del abono">
                        </div>

                        <!-- Mensaje de error -->
                        <div id="errorMensaje" class="alert alert-danger" style="display:none;">
                            El abono no puede ser mayor a la deuda.
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar Abono</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Todos los derechos reservados por Planearvolar 2024</div>
                <div>
                    <a href="#" target="_blank" class="text-muted">Yarlinson C. & Yubeimar P.</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<script>
    function abonar() {
        $("#ModalAbono").modal("show");
    }
    document.addEventListener("DOMContentLoaded", function() {
        // Captura el evento de envío del formulario
        $('#frmAbono').submit(function(e) {
            e.preventDefault(); // Evita la recarga de la página

            // Obtiene los valores del formulario
            let reservaId = $('#clienteConDeuda').val();
            let valorAbono = parseFloat($('#valorAbono').val());
            let deuda = parseFloat($('#clienteConDeuda option:selected').data('deuda'));

            // Validar que el abono no sea mayor a la deuda
            if (valorAbono > deuda) {
                $('#errorMensaje').show();
                return;
            } else {
                $('#errorMensaje').hide();
            }

            // Enviar los datos mediante AJAX
            $.ajax({
                url: '<?php echo base_url('reservas/abonar'); ?>',
                method: 'POST',
                data: {
                    reserva_id: reservaId,
                    abono: valorAbono
                },
                success: function(response) {
                    // Manejar respuesta exitosa (recarga parcial de la tabla o mensaje de éxito)
                    if (response.success) {
                        swal({
                            title: "Success",
                            text: "Abono registrado correctamente",
                            icon: "success",
                            button: "OK",
                        });
                        $('#ModalAbono').modal('hide'); // Cierra el modal
                        // Opcionalmente, recargar una tabla de datos sin recargar toda la página
                        location.reload(); // Recarga la página
                    }else{
                        // Manejar respuesta de error
                        console.log(response.error);
                        swal({
                            title: "Error",
                            text: "Ocurrió un error al registrar el abono",
                            icon: "error",
                            button: "OK",
                        });
                    }

                },
                error: function(error) {
                    // Manejar error
                    swal({
                        title: "Error",
                        text: "Ocurrió un error al registrar el abono",
                        icon: "error",
                        button: "OK",
                    });
                }
            });
        });
    });
    function abonos() {
            let deuda = parseFloat($('#clienteConDeuda option:selected').data('deuda'));
            document.getElementById('valorAbono').value = deuda;
            
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