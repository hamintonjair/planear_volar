<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: 100px;">
            <div class="content-container">
                <h1 style="color: white;">Acerca de Nosotros</h1>
                <h6 style="color: white;">Administrar información sobre la empresa</h6>
            </div>
        </div>
  
        <div class="container-fluid px-4 dataTable-container">
            <div class="card-body">
                <form id="frmAcercaDe">
                    <div class="row">
                    <input type="hidden" id="idacerca" name="idacerca">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea id="descripcion" name="descripcion" class="form-control" rows="5" disabled></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" id="imagen" name="imagen" class="form-control-file" disabled>
                                <img id="imgPreview" src="" alt="Vista previa de la imagen" class="img-thumbnail mt-2" style="display: none;">

                            </div>
                        </div>
                    </div>
                    <button type="button" id="btnHabilitar" class="btn btn-secondary">Habilitar Edición</button>
                    <button type="submit" class="btn btn-primary" id="btnGuardar" disabled>Guardar Información</button>
                </form>
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
