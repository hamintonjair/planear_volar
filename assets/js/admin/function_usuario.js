// listar
document.addEventListener("DOMContentLoaded", function () {

    let base_url = "http://localhost/planear_volar/";


    $('#TableUsuarios').DataTable({
        dom: 'lBfrtip',
        "columnDefs": [
            { 'className': "text-center", "targets": [7, 8] }, // Acción y estado centrados
            { 'className': "text-left", "targets": [0, 1, 2, 3, 4, 5, 6] } // Demás columnas alineadas a la izquierda
        ],
        "ajax": {
            "url": base_url + "getUsuarios",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            {
                data: null,
                render: function (data, type, row) {
                    return data.nombre + ' ' + data.apellidos;
                }
            },
            { "data": 'cedula' },
            { "data": 'telefono' },
            { "data": 'direccion' },
            { "data": 'correo' },
            { "data": 'rol' },
            { "data": 'estado' },
            { "data": 'accion' }
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [
            [0, "desc"]
        ]
    });

});
// accionar el modal
function openModalUsuarios() {
    document.querySelector('#frmUsuarios').reset();
    document.querySelector('#idUsuario').value = "";
    document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector('#btnActionForm').innerHTML = "Guardar";
    $("#ModalUsuarios").modal("show");
}
// insertar y actualizar
document.addEventListener("DOMContentLoaded", function () {
    $("#frmUsuarios").on("submit", function (event) {
        event.preventDefault(); // Prevenir el envío del formulario por defecto

        let base_url = "http://localhost/planear_volar/";
        let formData = new FormData(this);
        let idUsuario = $('#idUsuario').val();
        let url = base_url + (idUsuario ? "usuarios/actualizarUsuario" : "usuarios/registrarUsuario");

        if (!validarFormulario()) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                if (response.ok) {
                    swal({
                        title: "Éxito",
                        text: response.post,
                        icon: "success",
                        button: "OK",
                    });
                    // Recargar la tabla de usuarios o redirigir al dashboard
                    $('#TableUsuarios').DataTable().ajax.reload();
                    $('#ModalUsuarios').modal('hide');
                    document.querySelector('#frmUsuarios').reset();

                } else {
                    swal({
                        title: "Error",
                        text: response.post,
                        icon: "error",
                        button: "OK",
                    });
                }
            },
        });
    });

    function validarFormulario() {
        let nombre = $('#nombre').val();
        let apellidos = $('#apellido').val();
        let telefono = $('#telefono').val();
        let correo = $('#correo').val();
        let rol = $('#rol').val();
        let clave = $('#clave').val();
        let confirmar = $('#confirmar').val();

        if (nombre === "" || apellidos === "" || telefono === "" || correo === "" || rol === "") {
            swal({
                title: "Error",
                text: "Debe llenar todos los campos",
                icon: "info",
                button: "OK",
            });
            return false;
        } else if (clave !== confirmar) {
            swal({
                title: "Error",
                text: "Las contraseñas no son iguales",
                icon: "info",
                button: "OK",
            });
            return false;
        } else if (clave === "" || confirmar === "") {
            swal({
                title: "Error",
                text: "El campo contraseñas no puede estar vacio ",
                icon: "info",
                button: "OK",
            });
            return false;
        }
        return true;
    }
});

//editar usuarios
function editarUsuario(id) {
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnActionForm').innerHTML = "Actualizar";
    document.querySelector('#titleModal').innerHTML = "Actualizar Usuario";
    document.querySelector('#frmUsuarios').reset();

    let base_url = "http://localhost/planear_volar/";
    $.ajax({
        url: base_url + 'usuarios/obtenerUsuario/' + id,
        type: "GET",
        dataType: "json",
        success: function (resp) {
            $('#idUsuario').val(resp.id);
            $('#nombre').val(resp.nombre);
            $('#apellido').val(resp.apellidos);
            $('#cedula').val(resp.cedula);
            $('#telefono').val(resp.telefono);
            $('#direccion').val(resp.direccion);
            $('#correo').val(resp.correo);
            $('#rol').val(resp.rol);
            $('#clave').val(resp.clave);
            $('#confirmar').val(resp.clave);
            $('#ModalUsuarios').modal('show');
        },
        error: function () {
            swal({
                title: "Error",
                text: "No se pudo obtener la información del usuario",
                icon: "error",
                button: "OK",
            });
        }
    });
}

//eliminado
function eliminarUsuario($id) {
    swal({
        title: "¿Estás seguro?",
        text: "El usuario será desactivado y no podrá acceder al sistema.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            let base_url = "http://localhost/planear_volar/";
            $.ajax({
                url: base_url + 'usuarios/deleteUsuario/' + $id,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.ok == true) {
                        swal({
                            title: 'Desactivar el usuario',
                            text: response.post,
                            icon: "success",
                            button: "OK",
                        });
                        $('#TableUsuarios').DataTable().ajax.reload();
                    } else {
                        swal({
                            title: 'No fue posible desactivar el usuario',
                            text: response.post,
                            icon: "error",
                            button: "OK",
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error al desactivar el usuario:', error);
                    swal("Error", "No se pudo desactivar el usuario. Intente nuevamente.", "error");
                }
            });
        }
    });
}
function volverModalUsuarios() {
    let base_url = "http://localhost/planear_volar/";
    window.location = base_url + "usuarios";
}
function irModalUsuariosEliminados() {
    let base_url = "http://localhost/planear_volar/";
    window.location = base_url + "usuarios/usuarios_eliminados";
}
// listar usuarios eliminados
document.addEventListener("DOMContentLoaded", function () {

    let base_url = "http://localhost/planear_volar/";

    $('#TableUsuariosEliminados').DataTable({
        dom: 'lBfrtip',
        "columnDefs": [
            { 'className': "text-center", "targets": [7, 8] }, // Acción y estado centrados
            { 'className': "text-left", "targets": [0, 1, 2, 3, 4, 5, 6] } // Demás columnas alineadas a la izquierda
        ],
        "ajax": {
            "url": " " + base_url + "usuarios/getUsuariosEliminados",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            {
                data: null,
                render: function (data, type, row) {
                    return data.nombre + ' ' + data.apellidos;
                }
            },
            { "data": 'cedula' },
            { "data": 'telefono' },
            { "data": 'direccion' },
            { "data": 'correo' },
            { "data": 'rol' },
            { "data": 'estado' },
            { "data": 'accion' },

        ],
        buttons: [{
            "extend": "copyHtml5",
            "text": "<i class='far fa-copy'></i> Copiar",
            "titleAttr": "Copiar",
            "className": "btn btn-secondary",
            "exportOptions": {
                "columns": [0, 1, 2, 3, 4, 5, 6]
            }
        }, {
            "extend": "excelHtml5",
            "text": "<i class='fas fa-file-excel'></i> Excel",
            "titleAttr": "Expotar a Excel",
            "className": "btn btn-success",
            "exportOptions": {
                "columns": [0, 1, 2, 3, 4, 5, 6]
            }
        }, {
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr": "Exportar a PDF",
            "className": "btn btn-danger",
            "exportOptions": {
                "columns": [0, 1, 2, 3, 4, 5, 6]
            }
        }, {
            "extend": "csvHtml5",
            "text": "<i class='faa fa-file-csv'></i> CSV",
            "titleAttr": "Eportar",
            "className": "btn btn-secondary",
            "exportOptions": {
                "columns": [0, 1, 2, 3, 4, 5, 6]
            }
        },

        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [
            [0, "desc"]
        ]
    });


})
// restaurar usuario
function restaurarUsuario($id) {
    swal({
        title: "¿Estás seguro?",
        text: "El usuario será restaurado.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            let base_url = "http://localhost/planear_volar/";
            $.ajax({
                url: base_url + 'usuarios/restaurarUsuario/' + $id,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.ok == true) {
                        swal({
                            title: 'Activado el usuario',
                            text: response.post,
                            icon: "success",
                            button: "OK",
                        });
                        $('#TableUsuariosEliminados').DataTable().ajax.reload();
                    } else {
                        swal({
                            title: 'No fue posible activar el usuario',
                            text: response.post,
                            icon: "error",
                            button: "OK",
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error al desactivar el usuario:', error);
                    swal("Error", "No se pudo desactivar el usuario. Intente nuevamente.", "error");
                }
            });
        }
    });
}
// permisos para usuarios
function gestionarPermisos(id) {
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-warning");
    document.querySelector('#btnActionForm').innerHTML = "Actualizar Permisos";
    document.querySelector('#titleModal').innerHTML = "Gestionar Permisos";
    document.querySelector('#frmUsuarios').reset();

    let base_url = "http://localhost/planear_volar/";
    $.ajax({
        url: base_url + 'usuarios/obtenerUsuario/' + id,
        type: "GET",
        dataType: "json",
        success: function (resp) {
            $('#idUsuario').val(resp.id);
            // Lógica adicional para mostrar los permisos del usuario en el modal
            // Aquí puedes agregar inputs o checkboxes para los permisos

            $('#ModalUsuarios').modal('show');
        }
    });
}

// PERMISOS
function openModalPermisos($usuarioId) {
    cargarModulos($usuarioId);
    $("#id_usuario").val($usuarioId);
    $("#ModalPermisos").modal("show");
}
// mostrar los modulos
function cargarModulos($usuarioId) {
    let base_url = "http://localhost/planear_volar/";

    $.ajax({
        url: base_url + 'usuarios/obtenerPermisos/' + $usuarioId,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            let modulosDiv = $('#modulos');
            modulosDiv.empty();

            const colorClasses = ['color-1', 'color-2', 'color-3', 'color-4', 'color-5'];

            // Verificar si colorClasses está definido y tiene elementos
            if (colorClasses.length === 0) {
                console.error("El array colorClasses está vacío.");
                return;
            }

            response.modulos.forEach((modulo, index) => {
                let checked = response.asignados.includes(modulo.id) ? 'checked' : '';

                // Verificar si index es un número válido
                if (typeof index !== 'number' || isNaN(index)) {
                    console.error("El índice no es un número válido:", index);
                    return;
                }

                // Asignar la clase de color basada en el índice
                let colorClass = colorClasses[index % colorClasses.length];

                modulosDiv.append(
                    `<div class="col-md-4 text-center text-capitalize p-2 ${colorClass}">
                        <label for="modulo_${modulo.id}">${modulo.permiso}</label><br>
                        <input type="checkbox" id="modulo_${modulo.id}" name="permisos[]" value="${modulo.id}" ${checked}>
                    </div>`
                );
            });
        },
        error: function (xhr, status, error) {
            console.error("Error fetching permissions:", error);
        }
    });
}


// guardar los permisos asignados
function guardarPermisos(event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById("frmPermisos"));
    let base_url = "http://localhost/planear_volar/";

    $.ajax({
        url: base_url + 'usuarios/guardarPermisos',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (response) {
            if (response.ok) {
                swal({
                    title: "Permisos",
                    text: response.post,
                    icon: "success",
                    button: "OK",
                });
                $("#ModalPermisos").modal("hide");
            } else {
                swal({
                    title: "Permisos",
                    text: response.post,
                    icon: "error",
                    button: "OK",
                });
            }
        }
    });
}
// perfil
document.addEventListener("DOMContentLoaded", function () {
    // Botón para habilitar la edición
    document.getElementById("btnHabilitar").addEventListener("click", function () {
        let formElements = document.querySelectorAll("#frmPerfil input, #frmPerfil select");
        formElements.forEach(function (element) {
            element.disabled = false;
        });
        document.getElementById("btnGuardar").disabled = false;
    });

    $("#frmPerfil").on("submit", function (event) {
        event.preventDefault();
        let base_url = "http://localhost/planear_volar/";
        var formData = new FormData(this);

        $.ajax({
            type: "post",
            url: base_url + "usuario/perfil/actualizar",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                if (response.ok) {
                    swal({
                        title: "Perfil",
                        text: response.message,
                        icon: "success",
                        button: "OK",
                    });
                    // Deshabilitar el formulario nuevamente
                    let formElements = document.querySelectorAll("#frmPerfil input, #frmPerfil select");
                    formElements.forEach(function (element) {
                        element.disabled = true;
                    });
                    document.getElementById("btnGuardar").disabled = true;
                } else {
                    swal({
                        title: "Error",
                        text: response.message,
                        icon: "error",
                        button: "OK",
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error('Error al actualizar perfil:', error);
            }
        });
    });

    // Cargar los datos de configuración cuando la página se carga
    cargarPerfil();
});
// cargar informacion del perfil
function cargarPerfil() {
    let base_url = "http://localhost/planear_volar/";
    $.ajax({
        url: base_url + "usuario/perfil/obtener",
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (response.ok) {
                $('#idperfil').val(response.data.id);
                $('#nombre').val(response.data.nombre);
                $('#apellidos').val(response.data.apellidos);
                $('#cedula').val(response.data.cedula);
                $('#telefono').val(response.data.telefono);
                $('#correo').val(response.data.correo);
            } else {
                swal({
                    title: "Error",
                    text: "No se hay informacion del perfil",
                    icon: "error",
                    button: "OK",
                });
            }
        },
        error: function (xhr, status, error) {
            console.error('Error al cargar perfil:', error);
        }
    });
}

