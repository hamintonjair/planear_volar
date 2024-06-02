// listar
document.addEventListener("DOMContentLoaded", function () {
  let base_url = "http://localhost/planear_volar/public/";

  $(".estado").on("change", function () {
    let id = $(this).data("id");
    let estado = $(this).val();

    $.ajax({
      url: base_url + "reservas/actualizarEstado",
      type: "POST",
      data: { id: id, estado: estado },
      success: function (response) {
        alert(response.message);
      },
      error: function () {
        alert("Error al actualizar el estado.");
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
          alert("Reserva creada correctamente.");
          window.location.href = base_url + "reservas/hotel";
        } else {
          alert("Error al crear la reserva.");
        }
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
            } else {
              $("#descripcion").val("");
            }
          },
          error: function () {
            $("#descripcion").val("");
          },
        });
      } else {
        $("#descripcion").val("");
      }
    });
  });
});
