// listar
document.addEventListener("DOMContentLoaded", function () {
  let base_url = "http://localhost/planear_volar/";

  $(".estado").on("change", function () {
    let id = $(this).data("id");
    let estado = $(this).val();

    $.ajax({
      url: base_url + "reservas/actualizarEstado",
      type: "POST",
      data: { id: id, estado: estado },
      success: function (response) {
        swal({
          title: "Success",
          text: response.message,
          icon: "success",
          button: "OK",
        });
      },
      error: function () {
        swal({
          title: "Error",
          text: "Error al actualizar el estado.",
          icon: "error",
          button: "OK",
        });
      },
    });
  });

  // crear reservas turisticas
  $("#crearReservaForm").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      url: base_url + "reservas/store",
      type: "POST",
      data: $(this).serialize(),
      success: function (response) {
        if (response.success) {
          swal({
            title: "Success",
            text: "Reserva creada correctamente.",
            icon: "success",
            button: "OK",
          });
          window.location.href = base_url + "reservas/hotel";
        } else {
          // Aquí se maneja el mensaje de error
          swal({
            title: "Error",
            text: response.message || "Error al crear la reserva.",
            icon: "error",
            button: "OK",
          });
        }
      },
      error: function () {
        swal({
          title: "Error",
          text: "Error al procesar la solicitud.",
          icon: "error",
          button: "OK",
        });
      },
    });
  });

  // mostrar la descripcion
  $(document).ready(function () {
    $("#paquete_id").on("change", function () {
      var paqueteId = $(this).val();

      if (paqueteId) {
        $.ajax({
          url: base_url + "reservas/paquete_descripcion/" + paqueteId,
          type: "GET",
          dataType: "json",
          success: function (response) {
            if (response.success) {
              $("#descripcion").val(response.descripcion);

              // Formatear el costo con separador de miles
              const costoFormateado = parseFloat(response.costo).toLocaleString('es-CO', {
                style: 'decimal',
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
              });
              $("#costo").val(costoFormateado);
            } else {
              $("#descripcion").val("");
              $("#costo").val("");
            }
          },
          error: function () {
            $("#descripcion").val("");
            $("#costo").val("");
          },
        });
      } else {
        $("#descripcion").val("");
        $("#costo").val("");
      }
    });
  });

});
