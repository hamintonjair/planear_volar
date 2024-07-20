<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: auto;">
            <div class="content-container py-3">
                <h1 style="color: white;">Aplicados a vacantes</h1>
                <h6 style="color: white;">Administración de los aplicados</h6>
            </div>
        </div>
        <br><br>
        <div class="container-fluid px-4 dataTable-container">
            <!-- list_aplicaciones.php -->
            <table id="tableAplicado" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($aplicaciones as $aplicacion) : ?>
                        <tr>
                            <td class="text-center"><?= $aplicacion['id']; ?></td>
                            <td><?= $aplicacion['nombre']; ?></td>
                            <td><?= $aplicacion['apellidos']; ?></td>
                            <td><?= $aplicacion['correo']; ?></td>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-between align-items-center">
                                    <select class="form-control" onchange="cambiarEstado(<?= $aplicacion['id'] ?>, this.value)">
                                        <option value="Aplicado" <?= $aplicacion['estado'] == 'Aplicado' ? 'selected' : '' ?>>Aplicado</option>
                                        <option value="No continua" <?= $aplicacion['estado'] == 'No continua' ? 'selected' : '' ?>>No continua</option>
                                        <option value="En proceso" <?= $aplicacion['estado'] == 'En proceso' ? 'selected' : '' ?>>En proceso</option>
                                        <option value="Finalista" <?= $aplicacion['estado'] == 'Finalista' ? 'selected' : '' ?>>Finalista</option>
                                        <option value="Contratado" <?= $aplicacion['estado'] == 'Contratado' ? 'selected' : '' ?>>Contratado</option>
                                    </select>
                                    <a href="<?php echo base_url('vacantes/ver_mas/') ?><?= $aplicacion['id']; ?>" class="btn btn-info ml-2"><i class="fas fa-eye"></i></a>
                                    <a onclick="eliminarVacanteAplicado(<?= $aplicacion['id'] ?>)" class="btn btn-danger ml-2"><i class="fas fa-trash"></i></a>
                                </div>
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