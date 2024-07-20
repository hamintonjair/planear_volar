// listar guias
document.addEventListener("DOMContentLoaded", function () {
  let base_url = "http://localhost/planear_volar/";

  $("#TableGuias").DataTable({
    dom: "lBfrtip",
    columnDefs: [
      { className: "text-center", targets: [4, 5, 6] },
      { className: "text-left", targets: [0, 1, 2, 3] },
    ],
    ajax: {
      url: base_url + "guias/listar",
      dataSrc: "",
    },
    columns: [
      { data: "id" },
      { data: "nombre" },
      { data: "facebook" },
      { data: "instagram" },
      { data: "foto" },
      { data: "estado" },
      { data: "accion" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });
});
// accionar el modal
function openModalGuias() {
  document.getElementById("frmGuias").reset();
  document.getElementById("imgPreview").style.display = "none";
  document.getElementById("titleModal").innerText = "Nuevo guía";
  document.getElementById("btnText").innerText = "Registrar";
  document.querySelector('#frmGuias').reset();

  $("#ModalGuias").modal("show");
}
// editar
function editarGuia(id) {
  let base_url = "http://localhost/planear_volar/";

  $.ajax({
    url: base_url + "guias/obtener/" + id,
    type: "GET",
    dataType: "json",
    success: function (response) {
      if (response.ok) {
        let data = response.data;
        $("#idGuias").val(data.id);
        $("#nombre").val(data.nombre);
        $("#facebook").val(data.facebook);
        $("#instagram").val(data.instagram);
        $("#imgPreview")
          .attr("src", base_url + "uploads/" + data.foto)
          .show();
        $("#titleModal").text("Editar guía");
        $("#btnText").text("Actualizar");
        $("#ModalGuias").modal("show");
      }
    },
  });
}
// registar y actualizar
document.addEventListener("DOMContentLoaded", function () {
  $("#frmGuias").submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    let id = $("#idGuias").val();
    let base_url = "http://localhost/planear_volar/";

    let url = base_url + "guias/" + (id ? "actualizar" : "registrar");
    if (!validarFormulario()) {
      return false;
    }
    $.ajax({
      url: url,
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (response) {
        if (response.ok) {
          $("#TableGuias").DataTable().ajax.reload();
          $("#ModalGuias").modal("hide");
          swal("Guías turísticas", response.message, "success");
          document.querySelector('#frmGuias').reset();

        } else {
          swal("Error", response.message, "error");
        }
      },
    });
  });
  function validarFormulario() {
    let nombre = $('#nombre').val();
    let foto = $('#foto').val();

    if (nombre === "" || foto ==="") {
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
function eliminarGuia(id) {
  swal({
    title: "¿Estás seguro?",
    text: "Una vez eliminado, no podrás recuperar este guía",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      let base_url = "http://localhost/planear_volar/";

      $.ajax({
        url: base_url + "guias/eliminar/" + id,
        type: "POST",
        dataType: "json",
        success: function (response) {
          if (response.ok) {
            $("#TableGuias").DataTable().ajax.reload();
            swal("Eliminado", response.message, "success");
          } else {
            swal("Error", response.message, "error");
          }
        },
        error: function (xhr, status, error) {
          swal({
            title: "Error",
            text: "Error al eliminar el guía.",
            icon: "error",
            button: "OK",
          });
        },
      });
    }
  });
}
