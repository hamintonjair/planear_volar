<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: 100px;">
            <div class="content-container">
                <h1 style="color: white;">Configuración</h1>
                <h6 style="color: white;">Administrar información de la empresa</h6>
            </div>
        </div>
  
        <div class="container-fluid px-4 dataTable-container">
            <div class="card-body">
                <form id="frmConfiguracion">
                <input type="hidden" id="idempresa" name="idempresa" >

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_empresa">Nombre de la Empresa</label>
                                <input type="text" id="nombre_empresa" name="nombre_empresa" class="form-control valid validText" disabled>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="email" id="correo" name="correo" class="form-control valid validEmail" disabled>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfonos</label>
                                <input type="number" id="telefono" name="telefono" class="form-control valid validNumber" maxlength="10" disabled>
                            </div>
                            <div class="form-group">
                                <label for="ciudad">Ciudad</label>
                                <input type="text" id="ciudad" name="ciudad" class="form-control valid validText" disabled>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" id="direccion" name="direccion" class="form-control valid validText" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" id="facebook" name="facebook" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" id="instagram" name="instagram" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" id="twitter" name="twitter" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="linkedin">LinkedIn</label>
                                <input type="text" id="linkedin" name="linkedin" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label for="youtube">YouTube</label>
                                <input type="text" id="youtube" name="youtube" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="btnHabilitar" class="btn btn-secondary">Habilitar Edición</button>
                    <button type="submit" class="btn btn-success" id="btnGuardar" disabled>Actualizar</button>
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
