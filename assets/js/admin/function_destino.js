// registrar
document.addEventListener("DOMContentLoaded", function () {
  let base_url = "http://localhost/planear_volar/";

  $("#frmDestino").submit(function (event) {
    event.preventDefault();
    let formData = new FormData(this);
    if (!validarFormulario()) {
      return false;
    }
    $.ajax({
      url: base_url + "destinos/guardar",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (resp) {
        if (resp.ok) {
          swal({
            title: "Destino",
            text: resp.post,
            icon: "success",
            button: "OK",
          });
          $("#TableDestinos").DataTable().ajax.reload();
          $("#ModalDestino").modal("hide");
        } else {
          swal({
            title: "Error",
            text: resp.post,
            icon: "error",
            button: "OK",
          });
        }
      },
      error: function (xhr, status, error) {
        console.error("Error al guardar destino:", error);
      },
    });
  });

  $("#foto").change(function () {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        $("#imgPreview").attr("src", e.target.result).show();
      };
      reader.readAsDataURL(file);
    }
  });

  function validarFormulario() {
    let nombre = $("#nombre").val();
    let municipio = $("#municipio").val();
    let detalles = $("#detalles").val();

    if (nombre === "" || municipio === "" || detalles === "") {
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
function openModalDestino() {
  document.querySelector("#frmDestino").reset();
  document.querySelector("#idDestino").value = "";
  document.querySelector("#imgPreview").value = "";

  document.querySelector("#titleModal").innerHTML = "Nuevo Destino";
  document.querySelector("#btnActionForm").innerHTML = "Guardar";
  document.querySelector("#frmDestino").reset();

  $("#ModalDestino").modal("show");
}

//    listar /
document.addEventListener("DOMContentLoaded", function () {
  let base_url = "http://localhost/planear_volar/";

  $("#TableDestinos").DataTable({
    dom: "lBfrtip",
    columnDefs: [
      { className: "text-center", targets: [4, 5] }, // Acción y estado centrados
      { className: "text-left", targets: [0, 1, 2, 3] }, // Demás columnas alineadas a la izquierda
    ],
    ajax: {
      url: base_url + "destinos/listar",
      dataSrc: "",
    },
    columns: [
      { data: "id" },
      { data: "nombre" },
      { data: "municipio" },
      { data: "detalles" },

      {
        data: "foto",
        render: function (data, type, row) {
          return (
            '<img src="' +
            data +
            '" alt="' +
            row.foto +
            '" class="img-thumbnail" style="width: 100px;">'
          );
        },
      },
      { data: "estado" },
      { data: "accion" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });
});
// editar
function editarDestino(id) {
  let base_url = "http://localhost/planear_volar/";
  document.querySelector("#frmDestino").reset();

  $.ajax({
    url: base_url + "destinos/obtener/" + id,
    type: "GET",
    dataType: "json",
    success: function (resp) {
      $("#idDestino").val(resp.id);
      $("#nombre").val(resp.nombre);
      $("#municipio").val(resp.municipio);
      $("#detalles").val(resp.detalles);

      if (resp.foto) {
        $("#imgPreview")
          .attr("src", base_url + "uploads/" + resp.foto)
          .show();
      } else {
        $("#imgPreview").hide();
      }
      $("#btnText").text("Actualizar");
      $("#ModalDestino").modal("show");
    },
    error: function () {
      swal({
        title: "Error",
        text: "No se pudo obtener la información del usuario",
        icon: "error",
        button: "OK",
      });
    },
  });
}
// eliminar
function eliminarDestino(id) {
  let base_url = "http://localhost/planear_volar/";

  swal({
    title: "¿Estás seguro?",
    text: "Una vez eliminado, no podrás recuperar este destino",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        url: base_url + "destinos/eliminar/" + id,
        type: "POST",
        dataType: "json",
        success: function (response) {
          if (response.ok) {
            swal({
              title: "Success",
              text: response.message, // Asegúrate de usar 'message' aquí
              icon: "success",
              button: "OK",
            }).then(() => {
              $("#TableDestinos").DataTable().ajax.reload(); // Recarga la tabla
            });
          } else {
            swal({
              title: "Error",
              text: response.message, // Asegúrate de usar 'message' aquí
              icon: "error",
              button: "OK",
            });
          }
        },
        error: function (xhr, status, error) {
          console.error("Error al eliminar destino:", error);
        },
      });
    }
  });
}
