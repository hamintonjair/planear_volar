<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: 100px;">
            <div class="content-container">
                <h1 style="color: white;">Oferta</h1>
                <h6 style="color: white;">Administración de la oferta</h6>
            </div>
        </div>
        <div class="container-fluid px-4 mt-4">
            <div class="d-flex justify-content-start mb-3">
                <button type="button" class="btn btn-success me-2" onclick="openModalOferta();" data-toggle="modal">Nuevo</button>
            </div>
        </div>
        <div class="container-fluid px-4 dataTable-container">
            <table id="tableOferta" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nombre oferta</th>
                        <th class="text-center">Descuento</th>
                        <th class="text-center">Aquien va dirigido</th>
                        <th class="text-center">Descripción</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ofertas as $oferta) : ?>
                        <tr>
                            <td class="text-center"><?= esc($oferta['id']) ?></td>
                            <td><?= esc($oferta['nombre']) ?></td>
                            <td><?= esc($oferta['descuento']) ?></td>
                            <td class="text-center"><?= esc($oferta['dirigido']) ?></td>
                            <td class="text-center"><?= esc($oferta['descripcion']) ?></td>
                            <td class="text-center <?= $oferta['estado'] == 'No Aplicado' ? 'estado-no-aplicado' : 'estado-aplicado' ?>">
                                <?= esc($oferta['estado']) ?>
                            </td>
                            <td class="text-center estado-icon">
                                <?php if ($oferta['estado'] == 'No Aplicado') : ?>
                                    <i class="fas fa-times text-danger mr-2" data-id="<?= $oferta['id'] ?>" data-estado="No Aplicado" onclick="updateEstadoOferta(<?= $oferta['id'] ?>, 'Aplicado')" style="cursor: pointer;"></i>
                                    <i class="fas fa-trash-alt text-danger" data-id="<?= $oferta['id'] ?>" onclick="eliminarOferta(<?= $oferta['id'] ?>)" style="cursor: pointer;"></i>
                                <?php else : ?>
                                    <i class="fas fa-check text-success mr-2" data-id="<?= $oferta['id'] ?>" data-estado="Aplicado" onclick="updateEstadoOferta(<?= $oferta['id'] ?>, 'No Aplicado')" style="cursor: pointer;"></i>
                                    <i class="fas fa-trash-alt text-danger" data-id="<?= $oferta['id'] ?>" onclick="eliminarOferta(<?= $oferta['id'] ?>)"  style="cursor: pointer;"></i>
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

<!-- Modal para agregar oferta -->
<div class="modal fade" id="modalOferta" tabindex="-1" role="dialog" aria-labelledby="modalOfertaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #25142d; color:white">
                <h5 class="modal-title" id="modalOfertaLabel">Nueva Oferta</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <label for="">Todos los campos con (<font color="red">*</font>) son obligatorios.</label>

            <form id="formOferta" autocomplete="off" enctype="multipart/form-data">
                <input type='hidden' id='idOferta' value=''>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre oferta(<font color="red">*</font>)</label>
                        <input type="text" class="form-control valid validText" id="nombre" name="nombre" placeholder="Mega Oferta" required>
                    </div>
                    <div class="form-group">
                        <label for="descuento">Descuento(<font color="red">*</font>)</label>
                        <input type="text" class="form-control" id="descuento" name="descuento" placeholder="30% OFF" required>
                    </div>
                    <div class="form-group">
                        <label for="dirigido">A quién va dirigido(<font color="red">*</font>)</label>
                        <input type="text" class="form-control valid validText" id="dirigido" name="dirigido" placeholder=" Para Luna de Miel" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción(<font color="red">*</font>)</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Breve descricpión" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .estado-no-aplicado {
        background-color: red;
        color: black;
    }

    .estado-aplicado {
        background-color: green;
        color: black;
    }
</style>