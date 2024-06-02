$(document).ready(function() {
    $("#tableMensajes").DataTable({
        dom: "lBfrtip",
        responsive: true,
        bDestroy: true,
        iDisplayLength: 10,
        order: [[0, "desc"]],
    });
});
// actualizar el estado de los mensajes
function updateEstadoM(id, estado) {
    let base_url = "http://localhost/planear_volar/public/";

    $.ajax({
        url: base_url + 'mensajes/update',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id,
            estado: estado
        },
        success: function(response) {
            if (response.success) {
                // Cambiar el icono en la vista
                let iconElement = $(`i[data-id='${id}']`);
                if (estado === 'Contactado') {
                    iconElement.removeClass('fa-times text-danger').addClass('fa-check text-success');
                    iconElement.attr('onclick', ''); // Deshabilitar el clic
                    swal("Mensajes", response.message, "success");
                    location.reload();
                }
            } else {
                swal("Mensaje", response.message, "error");
            }
        },
        error: function() {
            swal("Error al actualizar el estado del mensaje", "error");
        }
    });
}
