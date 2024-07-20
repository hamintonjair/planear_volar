<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: auto;">
            <div class="content-container py-3">
                <h1 style="color: white;">Vuelos</h1>
                <h6 style="color: white;">Administración de los Vuelos</h6>
            </div>
        </div>
        <div class="container-fluid px-4 mt-4">
            <div class="d-flex justify-content-start mb-3">
                <a href="<?= base_url('vuelos/create') ?>" class="btn btn-success mb-3">Agregar Vuelo</a>
            </div>
        </div>
        <div class="container-fluid px-4 dataTable-container">
            <table id="tableReservas" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Fecha de Salida</th>
                        <th>Hora de Salida</th>
                        <th>Duración</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vuelos as $vuelo) : ?>
                        <tr>
                            <td><?= $vuelo['id']; ?></td>
                            <td><?= $vuelo['origen']; ?></td>
                            <td><?= $vuelo['destino']; ?></td>
                            <td><?= $vuelo['fecha_salida']; ?></td>
                            <td><?= $vuelo['hora_salida']; ?></td>
                            <td><?= $vuelo['duracion']; ?></td>
                            <td><?= $vuelo['precio']; ?></td>
                            <td>
                                <a href="<?= base_url('vuelos/edit/' . $vuelo['id']); ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('vuelos/delete/' . $vuelo['id']); ?>" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href="<?= base_url('vuelos/show/' . $vuelo['id']); ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
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