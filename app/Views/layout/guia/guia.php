<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: auto;">
            <div class="content-container py-3">
                <h1 style="color: white;">Guías de viajes</h1>
                <h6 style="color: white;">Administración de los guías</h6>
            </div>
        </div>
        <div class="container-fluid px-4 mt-4">
            <div class="d-flex justify-content-start mb-3">
                <button type="button" class="btn btn-success me-2" onclick="openModalGuias();" data-toggle="modal">Nuevo</button>
            </div>
        </div>
        <div class="container-fluid px-4 dataTable-container">
            <table id="TableGuias" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Facebook</th>
                        <th class="text-center">Instagram</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class='modal fade' id='ModalGuias' tabindex='-1' role='dialog' aria-labelledby='modelTitleId' aria-hidden='true'>
            <div class='modal-dialog modal-lg' role='document'>
                <div class='modal-content'>
                    <div class='modal-header headerRegister' style="background-color: #25142d; color:white">
                        <h5 class='modal-title' id='titleModal'>Nuevo guía</h5>
                        <button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <label for="">Todos los campos con (<font color="red">*</font>) son obligatorios.</label>
                        <form method='post' id='frmGuias' autocomplete="off" enctype="multipart/form-data">
                            <input type='hidden' id='idGuias' name='idGuias' value=''>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label for='nombre'>Nombre(<font color="red">*</font>)</label>
                                        <input type='text' name='nombre' id='nombre' class='form-control valid validText' placeholder='Nombre' aria-describedby='helpId'>
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label for='facebook'>Facebook</label>
                                        <input type='text' name='facebook' id='facebook' class='form-control' placeholder='Facebook' aria-describedby='helpId'>
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label for='instagram'>Instagram</label>
                                        <input type='text' name='instagram' id='instagram' class='form-control' placeholder='Instagram' aria-describedby='helpId'>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label for='foto'>Foto(<font color="red">*</font>)</label>
                                        <input type='file' name='foto' id='foto' class='form-control-file'>
                                        <img id="imgPreview" src="" alt="Vista previa de la imagen" class="img-thumbnail mt-2" style="display: none;">
                                    </div>
                                </div>
                            </div>
                            <div class='modal-footer'>
                                <button id='btnActionForm' type='submit' class='btn btn-primary'><span id='btnText'>
                                        Registrar</span></button>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
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
                <div class="text-muted">Copyright &copy; Todos los derechos reservados por Planearvolar 2024</div>
                <div>
                    <a href="#" target="_blank" class="text-muted">Yarlinson C. & Yubeimar P.</a>
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