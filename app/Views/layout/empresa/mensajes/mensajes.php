<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: 100px;">
            <div class="content-container">
                <h1 style="color: white;">Mensajes</h1>
                <h6 style="color: white;">Administración de los Mensajes</h6>
            </div>
        </div>
        <br><br>
        <div class="container-fluid px-4 dataTable-container">
            <table id="tableMensajes" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nombre y apellidos</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Asunto</th>
                        <th class="text-center">Mensaje</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mensajes as $m) : ?>
                        <tr>
                            <td class="text-center"><?= $m['id'] ?></td>
                            <td><?= $m['nombre'] ?></td>
                            <td><?= $m['correo'] ?></td>
                            <td class="text-center"><?= $m['asunto'] ?></td>
                            <td class="text-center"><?= $m['mensaje'] ?></td>
                            <td class="text-center <?= $m['estado'] == 'Recibido' ? 'estado-recibido' : ($m['estado'] == 'Contactado' ? 'estado-contactado' : '') ?>">
                                <?= esc($m['estado']) ?>
                            </td>
                            <td class="text-center estado-icon">
                                <?php if ($m['estado'] == 'Recibido') : ?>
                                    <i class="fas fa-times text-danger" data-id="<?= $m['id'] ?>" data-estado="Recibido" onclick="updateEstadoM(<?= $m['id'] ?>, 'Contactado')" style="cursor: pointer;"></i>
                                <?php else : ?>
                                    <i class="fas fa-check text-success" data-id="<?= $m['id'] ?>" data-estado="Contactado" disabled></i>
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
                <div class="text-muted">Copyright &copy; Todos los derechos reservados por Jojama 2024</div>
                <div>
                    <a href="https://hammenamena.mercadoshops.com.co/" target="_blank" class="text-muted">Visita nuestro sitio web</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<style>
    .estado-recibido {
        background-color: yellow;
        color: black;
    }

    .estado-contactado {
        background-color: red;
        color: black;
    }
</style>