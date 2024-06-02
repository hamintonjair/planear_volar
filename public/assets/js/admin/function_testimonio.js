// listar
document.addEventListener("DOMContentLoaded", function () {
    let base_url = "http://localhost/planear_volar/public/";
  
    $("#TableTestimonios").DataTable({
      dom: "lBfrtip",
      columnDefs: [
        { className: "text-center", targets: [5, 6] },
        { className: "text-left", targets: [0, 1, 2, 3, 4] },
      ],
      ajax: {
        url: base_url + "testimonios/listar",
        dataSrc: "",
      },
      columns: [
        { data: 'id' },
        { data: 'nombre_cliente' },
        { data: 'profesion' },
        { data: 'descripcion' },
        { data: 'foto' },
        { data: 'estado' },
        { data: 'accion' }
      ],
      responsive: true,
      bDestroy: true,
      iDisplayLength: 10,
      order: [[0, "desc"]],
    });
  });
  
// accionar el modal
function openModalTestimonios() {
    document.getElementById('idTestimonios').value = '';
    document.getElementById('frmTestimonios').reset();
    $('#titleModal').text('Nuevo Testimonio');
    $('#btnActionForm').removeClass('btn-info').addClass('btn-primary');
    $('#btnText').text('Registrar');
    $('#imgPreview').hide();
    $('#ModalTestimonios').modal('show');
}
// editar
function editarTestimonio(id) {
    $.ajax({
        url: 'testimonios/obtener/' + id,
        method: 'GET',
        success: function (response) {
            if (response.ok) {
                let data = response.data;
                $('#idTestimonios').val(data.id);
                $('#nombre_cliente').val(data.nombre_cliente);
                $('#profesion').val(data.profesion);
                $('#descripcion').val(data.descripcion);
                $('#imgPreview').attr('src', 'public/uploads/' + data.foto).show();
                $('#titleModal').text('Editar Testimonio');
                $('#btnActionForm').removeClass('btn-primary').addClass('btn-info');
                $('#btnText').text('Actualizar');
                $('#ModalTestimonios').modal('show');
            } else {
                swal("Error", response.message, "error");
            }
        }
    });
}
// registrar o actualizar
$('#frmTestimonios').submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    let url = ($('#idTestimonios').val() === '') ? 'testimonios/registrar' : 'testimonios/actualizar';
    if (!validarFormulario()) {
        return false;
      }
    $.ajax({
        url: url,
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.ok) {
                swal("Testimonios", response.message, "success");
                $('#ModalTestimonios').modal('hide');
                $('#TableTestimonios').DataTable().ajax.reload();
                document.getElementById('frmTestimonios').reset();

            } else {
                swal("Error", response.message, "error");

            }
        }
    });
    function validarFormulario() {
        let nombre = $('#nombre').val();
        let profesion = $('#profesion').val();
        let descripcion = $('#descripcion').val();
    
    
        if (nombre === "" || profesion === "" || descripcion === "") {
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
// eliminar testimonio
function eliminarTestimonio(id) {
    swal({
        title: "¿Estás seguro?",
        text: "Una vez eliminado, no podrás recuperar el testimonio",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            let base_url = "http://localhost/planear_volar/public/";
       
            $.ajax({
                url: base_url + 'testimonios/eliminar/' + id,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response.ok) {
                        $('#TableTestimonios').DataTable().ajax.reload();
                        swal("Eliminado", response.message
                        , "success");
                    } else {
                        swal("Error", response.message, "error");
                    }
                },
                error: function (xhr, status, error) {
                    swal({
                        title: "Error",
                        text: 'Error al eliminar el testimonio.',
                        icon: "error",
                        button: "OK",
                    });
                }
            });
        }
    });
    
}
