<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: 100px;">
            <div class="content-container">
                <h1 style="color: white;">Mi perfil</h1>
                <h6 style="color: white;">Administrar información del perfil</h6>
            </div>
        </div>

        <div class="container-fluid px-4 dataTable-container">
            <div class="card-body">
                <form id="frmPerfil" autocomplete="off">
                    <input type="hidden" id="idperfil" name="idperfil" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombres </label>
                                <input type="text" name="nombre" id="nombre" class="form-control valid validText" placeholder="Nombres" aria-describedby="helpId" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido">Apellidos </label>
                                <input type="text" name="apellidos" id="apellidos" class="form-control valid validText" placeholder="Apellidos" aria-describedby="helpId" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cedula">Cédula</label>
                                <input type="number" name="cedula" id="cedula" class="form-control valid validNumber" placeholder="Cédula" maxlength="10" aria-describedby="helpId" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono">Teléfono </label>
                                <input type="number" name="telefono" id="telefono" class="form-control valid validNumber" placeholder="Teléfono" maxlength="10" aria-describedby="helpId" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion" id="direccion" class="form-control " placeholder="Dirección" aria-describedby="helpId" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="email" name="correo" id="correo" class="form-control valid validEmail" placeholder="Correo" aria-describedby="helpId" disabled>
                            </div>
                        </div>
                    </div>

                    <button id="btnHabilitar" type="button" class="btn btn-secondary">Habilitar Edición</button>
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