<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: 100px;">
            <div class="content-container">
                <h1 style="color: white;">Crear reserva turistica</h1>
                <h6 style="color: white;">Administración </h6>
            </div>
        </div>
        <div class="container-fluid px-4 mt-4">
            <div class="d-flex justify-content-start mb-3">
                <a class="btn btn-success " href="<?php echo base_url() ?>reservas/crear" role="button">Crear Reserva</a>

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
                            <td><?= $reserva['costo']; ?></td>
                            <td><span class="badge badge-success"><?= $reserva['estado']; ?></span></td>
                            <td>
                            <a href="<?= base_url('reservas/generarFactura/' . $reserva['id']); ?>" class="btn btn-danger" target="_blank"> <i class="fas fa-file-pdf"></i></a>
                             <a href="<?= base_url('reservas/anular/' . $reserva['id']); ?>" class="btn btn-warning"> <i class="fas fa-times"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </main>

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
</div>