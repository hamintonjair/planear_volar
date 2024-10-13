<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: auto;">
            <div class="content-container py-3">
                <h1 style="color: white;">Reservas</h1>
                <h6 style="color: white;">Administración de las reservas</h6>
            </div>
        </div>

        <br><br>
        <div class="container-fluid px-4 dataTable-container">
            <table id="tableReservas" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Apellidos</th>
                        <th class="text-center">Teléfono</th>
                        <th class="text-center">Destino</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservas as $reserva) : ?>
                        <tr>
                            <td class="text-center"><?= esc($reserva['id']) ?></td>
                            <td><?= esc($reserva['nombre']) ?></td>
                            <td><?= esc($reserva['apellidos']) ?></td>
                            <td class="text-center"><?= esc($reserva['telefono']) ?></td>
                            <td class="text-center"><?= esc($reserva['nombre_paquete']) ?></td>
                            <td class="text-center <?= $reserva['estado'] == 'Contactar' ? 'estado-contactar' : ($reserva['estado'] == 'Contactado' ? 'estado-contactado' : '') ?>" style="cursor: pointer;">
                                <?= esc($reserva['estado']) ?>
                            </td>
                            <td class="text-center estado-icon">
                                <?php if ($reserva['estado'] == 'Contactar') : ?>
                                    <i class="fas fa-times text-danger " data-id="<?= $reserva['id'] ?>" data-estado="Contactar" onclick="updateEstado(<?= $reserva['id'] ?>, 'Contactado')" style="cursor: pointer;"></i>
                                <?php else : ?>
                                    <i class="fas fa-check text-success" data-id="<?= $reserva['id'] ?>" data-estado="Contactado" disabled></i>
                                <?php endif; ?>
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
                <div class="text-muted">Copyright &copy; Todos los derechos reservados por Planearvolar 2024</div>
                <div>
                    <a href="#" target="_blank" class="text-muted">Yarlinson C. & Yubeimar P.</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<style>
    .estado-contactar {
        background-color: yellow;
        color: black;
    }

    .estado-contactado {
        background-color: red;
        color: black;
    }
    
    .dataTable-container {
        margin-top: 20px;
    }

    @media (max-width: 768px) {
        .dataTable-container {
            overflow-x: auto;
        }
    }
</style>