// listar
document.addEventListener("DOMContentLoaded", function () {

    let base_url = "http://localhost/planear_volar/";

    $('#TablePaquetes').DataTable({
        dom: 'lBfrtip',
        "columnDefs": [
            { 'className': "text-center", "targets": [8, 9] },
            { 'className': "text-left", "targets": [0, 1, 2, 3, 4, 5, 6,7] }
        ],
        "ajax": {
            "url": base_url + "paquetes/listar",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            { "data": "nombre_paquete" },
            { "data": "nombre_ciudad" },
            { "data": "tiempo_estadia" },
            { "data": "cant_personas" },
            { "data": "descripcion" },
            { "data": "costo" },
            { "data": "foto" },
            { "data": "estado" },
            { "data": "accion" }
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
});
// accionar el modal
function openModalPaquetes() {
        document.getElementById('frmPaquetes').reset();
        document.getElementById('imgPreview').style.display = 'none';
        document.getElementById('titleModal').innerText = 'Nuevo paquete';
        document.getElementById('btnText').innerText = 'Registrar';
        document.querySelector('#frmPaquetes').reset();

        $('#ModalPaquetes').modal('show');
    }
// editar
function editarPaquete(id){
        let base_url = "http://localhost/planear_volar/";

        $.ajax({
            url: base_url + 'paquetes/obtener/' + id,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.ok) {
                    let data = response.data;
                    $('#idPaquetes').val(data.id);
                    $('#nombre_paquete').val(data.nombre_paquete);
                    $('#ciudad').val(data.ciudad);
                    $('#tiempo_estadia').val(data.tiempo_estadia);
                    $('#cant_personas').val(data.cant_personas);
                    $('#descripcion').val(data.descripcion);
                    $('#costo').val(data.costo);
                    $('#imgPreview').attr('src', base_url + 'uploads/' + data.foto).show();
                    $('#titleModal').text('Editar paquete');
                    $('#btnText').text('Actualizar');
                    $('#ModalPaquetes').modal('show');
                }
            }
        });
    };
// actualizar y registrar

document.addEventListener("DOMContentLoaded", function () {
$('#frmPaquetes').submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        let id = $('#idPaquetes').val();
        let base_url = "http://localhost/planear_volar/";

        let url = base_url + 'paquetes/' + (id ? 'actualizar' : 'registrar');
        if (!validarFormulario()) {
            return false;
          }
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                if (response.ok) {
                    $('#TablePaquetes').DataTable().ajax.reload();
                    $('#ModalPaquetes').modal('hide');
                    swal("Paquetes turisticos", response.message, "success");
                    document.querySelector('#frmPaquetes').reset();

                } else {
                    swal("Error", response.message, "error");
                }
            }
        });
    });
    function validarFormulario() {
        let nombre = $('#nombre_paquete').val();
        let ciudad = $('#ciudad').val();
        let tiempo_estadia = $('#tiempo_estadia').val();
        let cant_personas = $('#cant_personas').val();
        let descripcion = $('#descripcion').val();
        let costo = $('#costo').val();
        let foto = $('#foto').val();
    
   
        if (nombre === "" ||ciudad === "" || tiempo_estadia === "" || cant_personas === "" || descripcion === ""  ||costo === "" || foto ==="" ) {
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
// eliminar
    function eliminarPaquete(id){
        swal({
            title: "¿Estás seguro?",
            text: "Una vez eliminado, no podrás recuperar este paquete",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                let base_url = "http://localhost/planear_volar/";

                $.ajax({
                    url: base_url + 'paquetes/eliminar/' + id,
                    type: 'POST',
                    dataType: 'json',
                    success: function (response) {
                        if (response.ok) {
                            $('#TablePaquetes').DataTable().ajax.reload();
                            swal({
                                title: "Success",
                                text: response.message,
                                icon: "success",
                                button: "OK",
                            });
                        } else {
                            swal("Error", response.message, "error");
                        }
                    },
                    error: function (xhr, status, error) {
                        swal({
                            title: "Error",
                            text: 'Error al eliminar paquete:',
                            icon: error,
                            button: "OK",
                        });
                    }
                });
            }
        });
    };

