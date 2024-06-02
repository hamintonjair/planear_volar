<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: 100px;">
            <div class="content-container">
                <h1 style="color: white;">Usuarios</h1>
                <h6 style="color: white;">Administración de los usuarios</h6>
            </div>
        </div>
        <div class="container-fluid px-4 mt-4">
            <div class="d-flex justify-content-start mb-3">
                <button type="button" class="btn btn-success me-2" onclick="openModalUsuarios();" data-toggle="modal">Nuevo</button>
                <button type="button" class="btn btn-danger me-2" onclick="irModalUsuariosEliminados();">Eliminados</button>
            </div>
        </div>
        <div class="container-fluid px-4 dataTable-container">
            <table id="TableUsuarios" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nombre y apellidos</th>
                        <th class="text-center">Cédula</th>
                        <th class="text-center">Teléfono</th>
                        <th class="text-center">Dirección</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Rol</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class='modal fade' id='ModalUsuarios' tabindex='-1' role='dialog' aria-labelledby='modelTitleId' aria-hidden='true'>
            <div class='modal-dialog modal-lg' role='document'>
                <div class='modal-content'>
                    <div class='modal-header headerRegister' style="background-color: #25142d; color:white">
                        <h5 class='modal-title' id='titleModal'>Nuevo usuario</h5>
                        <button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;
                            </span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <label for="">Todos los campos con (<font color="red">*</font>) son obligatorios.</label>
                        <form method='post' id='frmUsuarios' autocomplete="off">
                            <input type='hidden' id='idUsuario' name='idUsuario' value=''>
                            <div class='row'>
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label for='nombre'>Nombres(<font color="red">*</font>)</label>
                                        <input type='text' name='nombre' id='nombre' class='form-control valid validText' placeholder='Nombres' aria-describedby='helpId'>
                                    </div>
                                </div>
                                <div class='col-md-8'>
                                    <div class='form-group'>
                                        <label for='apellido'>Apellidos(<font color="red">*</font>)</label>
                                        <input type='text' name='apellido' id='apellido' class='form-control valid validText' placeholder='Apellidos' aria-describedby='helpId'>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <label for='cedula'>Cédula</label>
                                        <input type='number' name='cedula' id='cedula' class='form-control valid validNumber' placeholder='Cédula' maxlength="10" aria-describedby='helpId'>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='form-group'>
                                        <label for='telefono'>Teléfono(<font color="red">*</font>)</label>
                                        <input type='number' name='telefono' id='telefono' class='form-control valid validNumber' placeholder='Teléfono' maxlength="10" aria-describedby='helpId'>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label for='direccion'>Dirección</label>
                                        <input type='text' name='direccion' id='direccion' class='form-control' placeholder='Dirección' aria-describedby='helpId'>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-8'>
                                    <div class='form-group'>
                                        <label for='correo'>Correo(<font color="red">*</font>)</label>
                                        <input type='email' name='correo' id='correo' class='form-control valid validEmail' placeholder='Correo' aria-describedby='helpId'>
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class='form-group'>
                                        <label for='rol'>Rol(<font color="red">*</font>)</label>
                                        <select class='form-control selectpicker' name='rol' id='rol'>
                                            <option selected="selected">Seleccionar..</option>
                                            <option value="Administrador">Admin</option>
                                            <option value="Operador">Operador</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class='row' id="claves">
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label for='clave'>Contraseña(<font color="red">*</font>)</label>
                                        <input type='password' name='clave' id='clave' class='form-control' placeholder='Contraseña' aria-describedby='helpId'>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label for='confirmar'>Confirmar contraseña(<font color="red">*</font>)</label>
                                        <input type='password' name='confirmar' id='confirmar' class='form-control' placeholder='Confirmar contraseña' aria-describedby='helpId'>
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


        <!-- PERMISOS -->
        <!-- Modal para Permisos -->
        <div class="modal fade" id="ModalPermisos" tabindex="-1" aria-labelledby="ModalPermisosLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #25142d; color:white">
                        <h5 class="modal-title" id="ModalPermisosLabel">Asignar permisos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="frmPermisos">
                            <input type="hidden" id="id_usuario" name="id_usuario">
                            <div class="row" id="modulos">
                                <!-- Aquí se cargarán los módulos con checkboxes -->
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-primary" type="button" onclick="guardarPermisos(event);">
                                    <i class="fa fa-registered" aria-hidden="true"></i> Asignar permisos
                                </button>
                                <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">
                                    Volver atrás
                                </button>
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

<style>
  .color-1 {
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    padding: 10px;
    border-radius: 5px;
}

.color-2 {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    padding: 10px;
    border-radius: 5px;
}

.color-3 {
    background-color: #d1ecf1;
    border: 1px solid #bee5eb;
    padding: 10px;
    border-radius: 5px;
}

.color-4 {
    background-color: #fff3cd;
    border: 1px solid #ffeeba;
    padding: 10px;
    border-radius: 5px;
}

.color-5 {
    background-color: #fefefe;
    border: 1px solid #dee2e6;
    padding: 10px;
    border-radius: 5px;
}

.color-6 {
    background-color: #d6d8d9;
    border: 1px solid #c8cbcf;
    padding: 10px;
    border-radius: 5px;
}

.color-7 {
    background-color: #d6dbe0;
    border: 1px solid #bdc6d1;
    padding: 10px;
    border-radius: 5px;
}

.color-8 {
    background-color: #f1e6d4;
    border: 1px solid #ecd4b5;
    padding: 10px;
    border-radius: 5px;
}

.color-9 {
    background-color: #f6d6e0;
    border: 1px solid #eebed9;
    padding: 10px;
    border-radius: 5px;
}

.color-10 {
    background-color: #e9f2f9;
    border: 1px solid #c6dbea;
    padding: 10px;
    border-radius: 5px;
}

.color-11 {
    background-color: #f7f7f7;
    border: 1px solid #e5e5e5;
    padding: 10px;
    border-radius: 5px;
}

.color-12 {
    background-color: #e6e2e2;
    border: 1px solid #cac7c7;
    padding: 10px;
    border-radius: 5px;
}


/* Add more colors as needed */

</style>