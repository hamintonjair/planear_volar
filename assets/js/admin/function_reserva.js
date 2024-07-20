
$(document).ready(function() {
    $("#tableReservas").DataTable({
        dom: "lBfrtip",
      
        responsive: true,
        bDestroy: true,
        iDisplayLength: 10,
        order: [[0, "desc"]],
      });
});
$(document).ready(function() {
  
      $("#tableAplicado").DataTable({
        dom: "lBfrtip",
      
        responsive: true,
        bDestroy: true,
        iDisplayLength: 10,
        order: [[0, "desc"]],
      });
});
$(document).ready(function() {
  
    $("#TableReservaTuristica").DataTable({
      dom: "lBfrtip",
    
      responsive: true,
      bDestroy: true,
      iDisplayLength: 10,
      order: [[0, "desc"]],
    });TableReservaTuristica
});
// actualizar estado de la reserva del cliente
    function updateEstado(id, estado) {
        let base_url = "http://localhost/planear_volar/";

        $.ajax({
            url: base_url + 'reservas/update',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                estado: estado
            },
            success: function(response) {
                if (response.success) {
           
                    let iconElement = $(`i[data-id='${id}']`);
                    if (estado === 'Contactado') {
                        iconElement.removeClass('fa-times text-danger').addClass('fa-check text-success');
                        iconElement.attr('onclick', ''); // Deshabilitar el clic
                        swal("Reserva", response.message, "success");
                        location.reload();
                    }
                } else {
                    swal("Reserva", response.message, "error");
                }
            },
            error: function() {
                swal("Error al actualizar el estado de la reserva", "error");

            }
        });
    }
