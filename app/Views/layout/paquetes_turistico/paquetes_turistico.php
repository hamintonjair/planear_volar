<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: 100px;">
            <div class="content-container">
                <h1 style="color: white;">Paquetes Turísticos</h1>
                <h6 style="color: white;">Administración de los paquetes</h6>
            </div>
        </div>
        <div class="container-fluid px-4 mt-4">
            <div class="d-flex justify-content-start mb-3">
                <button type="button" class="btn btn-success me-2" onclick="openModalPaquetes();" data-toggle="modal">Nuevo</button>
            </div>
        </div>
        <div class="container-fluid px-4 dataTable-container">
            <table id="TablePaquetes" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nombre paquete</th>
                        <th class="text-center">Ciudad</th>
                        <th class="text-center">Tiempo de estadía</th>
                        <th class="text-center">Cant. de personas</th>
                        <th class="text-center">Descripción</th>
                        <th class="text-center">Costo</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class='modal fade' id='ModalPaquetes' tabindex='-1' role='dialog' aria-labelledby='modelTitleId' aria-hidden='true'>
            <div class='modal-dialog modal-lg' role='document'>
                <div class='modal-content'>
                    <div class='modal-header headerRegister' style="background-color: #25142d; color:white">
                        <h5 class='modal-title' id='titleModal'>Nuevo paquete</h5>
                        <button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <label for="">Todos los campos con (<font color="red">*</font>) son obligatorios.</label>
                        <form method='post' id='frmPaquetes' autocomplete="off" enctype="multipart/form-data">
                            <input type='hidden' id='idPaquetes' name='idPaquetes' value=''>
                            <div class='row'>
                            <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label for='nombre'>Nombre paquete(<font color="red">*</font>)</label>
                                        <input type='text' name='nombre_paquete' id='nombre_paquete' class='form-control' placeholder='Nombre del paquete' aria-describedby='helpId'>
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label for='ciudad'>Ciudad(<font color="red">*</font>)</label>
                                        <input type='text' name='ciudad' id='ciudad' class='form-control valid validText' placeholder='Ciudad' aria-describedby='helpId'>
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label for='tiempo_estadia'>Tiempo de estadía(<font color="red">*</font>)</label>
                                        <input type='text' name='tiempo_estadia' id='tiempo_estadia' class='form-control' placeholder='2 días' aria-describedby='helpId'>
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label for='cant_personas'>Cant. de personas(<font color="red">*</font>)</label>
                                        <input type='text' name='cant_personas' id='cant_personas' class='form-control' placeholder='2 personas' aria-describedby='helpId'>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label for='descripcion'>Descripción(<font color="red">*</font>)</label>
                                        <textarea name='descripcion' id='descripcion' class='form-control' rows='10' placeholder='Descripción'></textarea>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label for='costo'>Costo(<font color="red">*</font>)</label>
                                        <input type='number' name='costo' id='costo' class='form-control valid validNumber' placeholder='Costo' aria-describedby='helpId'>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label for='foto'>Foto(<font color="red">*</font>)</label>
                                        <input type='file' name='foto' id='foto' class='form-control-file'>
                                        <img id="imgPreview" src="" alt="Vista previa de la imagen" class="img-thumbnail mt-2" style="display: none;">
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
