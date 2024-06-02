// listar
document.addEventListener("DOMContentLoaded", function () {

    let base_url = "http://localhost/planear_volar/public/";


    $('#TableClientes').DataTable({
        dom: 'lBfrtip',
        "columnDefs": [
            { 'className': "text-center", "targets": [6,7] }, // Acción y estado centrados
            { 'className': "text-left", "targets": [0, 1, 2, 3, 4, 5] } // Demás columnas alineadas a la izquierda
        ],
        "ajax": {
            "url": base_url + "getClientes",
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
// accionar al modal
function openModalClientes() {
    document.querySelector('#frmClientes').reset();
    document.querySelector('#idCliente').value = "";
    document.querySelector('#titleModal').innerHTML = "Nuevo Cliente";
    document.querySelector('#btnActionForm').innerHTML = "Guardar";
    document.querySelector('#frmClientes').reset();

    $("#ModalClientes").modal("show");
}
// insertar y actualizar
document.addEventListener("DOMContentLoaded", function () {
    $("#frmClientes").on("submit", function (event) {
        event.preventDefault(); // Prevenir el envío del formulario por defecto

        let base_url = "http://localhost/planear_volar/public/";
        let formData = new FormData(this);
        let idCliente = $('#idCliente').val();
        let url = base_url + (idCliente ? "clientes/actualizarCliente" : "clientes/registrarCliente");

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
                    // Recargar la tabla de Clientes o redirigir al dashboard
                    $('#TableClientes').DataTable().ajax.reload();
                    document.querySelector('#frmClientes').reset();
                    $('#ModalClientes').modal('hide');
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
        let cedula = $('#cedula').val();
        let telefono = $('#telefono').val();
        let correo = $('#correo').val();


        if (nombre === "" || apellidos === "" || telefono === "" || correo === "" || cedula === "") {
            swal({
                title: "Error",
                text: "Debe llenar todos los campos",
                icon: "info",
                button: "OK",
            });
            return false;
        }
        return true;
    }
});

//editar Clientes
function editarCliente(id) {
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnActionForm').innerHTML = "Actualizar";
    document.querySelector('#titleModal').innerHTML = "Actualizar Cliente";
    document.querySelector('#frmClientes').reset();

    let base_url = "http://localhost/planear_volar/public/";
    $.ajax({
        url: base_url + 'clientes/obtenerCliente/' + id,
        type: "GET",
        dataType: "json",
        success: function(resp) {
            $('#idCliente').val(resp.id);
            $('#nombre').val(resp.nombre);
            $('#apellido').val(resp.apellidos);
            $('#cedula').val(resp.cedula);
            $('#telefono').val(resp.telefono);
            $('#direccion').val(resp.direccion);
            $('#correo').val(resp.correo);
            $('#ModalClientes').modal('show');
        },
        error: function() {
            swal({
                title: "Error",
                text: "No se pudo obtener la información del Cliente",
                icon: "error",
                button: "OK",
            });
        }
    });
}
// eliminar el cliente
function eliminarCliente($id) {
    swal({
        title: "¿Estás seguro?",
        text: "El Cliente será eliminado y no podrá acceder al sistema.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            let base_url = "http://localhost/planear_volar/public/";
            $.ajax({
                url: base_url + 'clientes/deleteCliente/' + $id,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.ok == true) {
                        swal({
                            title: 'Eliminar el Cliente',
                            text: response.post,
                            icon: "success",
                            button: "OK",
                          });
                        $('#TableClientes').DataTable().ajax.reload();
                    } else {
                        swal({
                            title: 'No fue posible eliminar el Cliente',
                            text: response.post,
                            icon: "error",
                            button: "OK",
                          });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error al eliminar el Cliente:', error);
                    swal("Error", "No se pudo eliminar el Cliente. Intente nuevamente.", "error");
                }
            });
        }
    });
}

