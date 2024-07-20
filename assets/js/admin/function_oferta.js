document.addEventListener('DOMContentLoaded', function() {

    $(document).ready(function() {
  
        $("#tableOferta").DataTable({
          dom: "lBfrtip",
        
          responsive: true,
          bDestroy: true,
          iDisplayLength: 10,
          order: [[0, "desc"]],
        });
  });

//   crear ofertas
    $('#formOferta').on('submit', function(e) {
        e.preventDefault();
        let base_url = 'http://localhost/planear_volar/';

        $.ajax({
            url: base_url + 'ofertas/addOferta',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.ok) {
               
                    $('#modalOferta').modal('hide');
                    location.reload();
                    swal("Oferta", response.message, "success");
                } else {
                    swal("Error", response.message, "error");
                }
          }
        });
    });
});
// accionar el modal
function openModalOferta() {
    document.querySelector('#formOferta').reset();
    document.querySelector('#idOferta').value = "";
    $("#modalOferta").modal("show");
}
// eliminar
function eliminarOferta(id){
    swal({
        title: "¿Estás seguro?",
        text: "Una vez eliminado, no podrás recuperar esta oferta",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            let base_url = "http://localhost/planear_volar/";

            $.ajax({
                url: base_url + 'ofertas/deleteOferta/' + id,
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                                        if (response.ok) {
                        swal({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                            button: "OK",
                        });
                        location.reload();

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
function updateEstadoOferta(id, estado) {
    let base_url = "http://localhost/planear_volar/";
    $.ajax({
        url: base_url + 'oferta/update',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id,
            estado: estado
        },
        success: function(response) {
          
            if (response.success) {
       
                let iconElement = $(`i[data-id='${id}']`);
                if (estado === 'Aplicado') {
                    iconElement.removeClass('fa-times text-danger').addClass('fa-check text-success');
                    iconElement.attr('onclick', ''); // Deshabilitar el clic
                    swal("Oferta", response.message, "success");
                    document.querySelector('#formOferta').reset();
                    location.reload();
                }else {
                    iconElement.removeClass('fa-times text-danger').addClass('fa-check text-success');
                    iconElement.attr('onclick', ''); // Deshabilitar el clic
                    swal("Oferta", response.message, "success");
                    location.reload();
                }
            } else {
                swal("Oferta", response.message, "error");
            }
        },
        error: function() {
            swal("Error al actualizar el estado de la oferta", "error");

        }
    });
}
