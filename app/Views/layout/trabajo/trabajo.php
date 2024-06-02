<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: 100px;">
            <div class="content-container">
                <h1 style="color: white;">Vacantes</h1>
                <h6 style="color: white;">Administración de las vacantes</h6>
            </div>
        </div>
        <div class="container-fluid px-4 mt-4">
            <div class="d-flex justify-content-start mb-3">
                <button type="button" class="btn btn-success me-2" onclick="openModalVacantes();" data-toggle="modal">Nuevo</button>
            </div>
        </div>
        <div class="container-fluid px-4 dataTable-container">
            <table id="TableVacantes" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Ubicación</th>
                        <th class="text-center">empresa</th>
                        <th class="text-center">Descripción</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class='modal fade' id='ModalVacantes' tabindex='-1' role='dialog' aria-labelledby='modelTitleId' aria-hidden='true'>
            <div class='modal-dialog modal-lg' role='document'>
                <div class='modal-content'>
                    <div class='modal-header headerRegister' style="background-color: #25142d; color:white">
                        <h5 class='modal-title' id='titleModal'>Nuevo trabajo</h5>
                        <button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <label for="">Todos los campos con (<font color="red">*</font>) son obligatorios.</label>
                        <form method='post' id='frmVacantes' autocomplete="off" enctype="multipart/form-data">
                            <input type='hidden' id='idVacantes' name='idVacantes' value=''>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label for='nombre'>Nombre(<font color="red">*</font>)</label>
                                        <input type='text' name='nombre' id='nombre' class='form-control valid validText' placeholder='Vacante' aria-describedby='helpId'>
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label for='ubicacion'>Ubicación(<font color="red">*</font>)</label>
                                        <input type='text' name='ubicacion' id='ubicacion' class='form-control' placeholder='Ubicación' aria-describedby='helpId'>
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label for='empresa'>Empresa(<font color="red">*</font>)</label>
                                        <input type='text' name='empresa' id='empresa' class='form-control' placeholder='Empresa' aria-describedby='helpId'>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label for='descripcion'>Descripción(<font color="red">*</font>)</label>
                                        <textarea name='descripcion' id='descripcion' class='form-control' rows='10' placeholder='Descripción' aria-describedby='helpId'></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class='modal-footer'>
                                <button id='btnActionForm' type='submit' class='btn btn-primary'><span id='btnText'>Registrar</span></button>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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