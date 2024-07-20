// listar
document.addEventListener("DOMContentLoaded", function () {
  let base_url = "http://localhost/planear_volar/";

  $("#TableVacantes").DataTable({
    dom: "lBfrtip",
    columnDefs: [
      { className: "text-center", targets: [5, 6] },
      { className: "text-left", targets: [0, 1, 2, 3, 4] },
    ],
    ajax: {
      url: base_url + "vacantes/listar",
      dataSrc: "",
    },
    columns: [
      { data: "id" },
      { data: "nombre" },
      { data: "ubicacion" },
      { data: "empresa" },
      { data: "descripcion" },
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
function openModalVacantes() {
  document.getElementById("frmVacantes").reset();
  document.getElementById("titleModal").innerText = "Nueva vacante";
  document.getElementById("btnText").innerText = "Registrar";
  document.querySelector("#frmVacantes").reset();

  $("#ModalVacantes").modal("show");
}
// editar
function editarVacante(id) {
  let base_url = "http://localhost/planear_volar/";

  $.ajax({
    url: base_url + "vacantes/obtener/" + id,
    type: "GET",
    dataType: "json",
    success: function (response) {
      if (response.ok) {
        let data = response.data;
        $("#idVacantes").val(data.id);
        $("#nombre").val(data.nombre);
        $("#ubicacion").val(data.ubicacion);
        $("#empresa").val(data.empresa);
        $("#descripcion").val(data.descripcion);
        $("#titleModal").text("Editar vacante");
        $("#btnText").text("Actualizar");
        $("#ModalVacantes").modal("show");
      }
    },
  });
}
// insertar y acualizar
document.addEventListener("DOMContentLoaded", function () {
  $("#frmVacantes").submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    let id = $("#idVacantes").val();
    let base_url = "http://localhost/planear_volar/";

    let url = base_url + "vacantes/" + (id ? "actualizar" : "registrar");
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
          $("#TableVacantes").DataTable().ajax.reload();
          $("#ModalVacantes").modal("hide");
          swal("Vacantes", response.message, "success");
          document.querySelector("#frmVacantes").reset();
        } else {
          swal("Error", response.message, "error");
        }
      },
    });
  });
  function validarFormulario() {
    let nombre = $("#nombre").val();
    let ubicacion = $("#ubicacion").val();
    let empresa = $("#empresa").val();
    let descripcion = $("#descripcion").val();

    if (
      nombre === "" ||
      ubicacion === "" ||
      empresa === "" ||
      descripcion === ""
    ) {
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
// eliminar vacantes
function eliminarVacante(id) {
  swal({
    title: "¿Estás seguro?",
    text: "Una vez eliminado, no podrás recuperar esta vacante",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      let base_url = "http://localhost/planear_volar/";

      $.ajax({
        url: base_url + "vacantes/eliminar/" + id,
        type: "POST",
        dataType: "json",
        success: function (response) {
          if (response.ok) {
            $("#TableVacantes").DataTable().ajax.reload();
            swal("Success", response.message, "success");
          } else {
            swal("Error", response.message, "error");
          }
        },
        error: function (xhr, status, error) {
          swal("Error", "Error al eliminar vacante: " + error, "error");
        },
      });
    }
  });
}

// eliminar aplicados a vacantes
function eliminarVacanteAplicado(id) {
  swal({
    title: "¿Estás seguro?",
    text: "Una vez eliminado, no podrás recuperar ",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      let base_url = "http://localhost/planear_volar/";

      $.ajax({
        url: base_url + "vacantes/delete/" + id,
        type: "POST",
        dataType: "json",
        success: function (response) {
          if (response.ok) {
            swal("Success", response.message, "success");
            location.reload();
          } else {
            swal("Error", response.message, "error");
          }
        },
        error: function (xhr, status, error) {
          swal("Error", "Error al eliminar vacante: " + error, "error");
        },
      });
    }
  });
}
// cambiar estado aplicacion a vacante

function cambiarEstado(id, estado) {
  let base_url = "http://localhost/planear_volar/";

  $.ajax({
      url:  base_url+'aplicaciones/cambiarEstado',
      type: 'POST',
      data: {
          id: id,
          estado: estado
      },
      success: function(response) {
          // Mostrar un mensaje de éxito si se cambia el estado correctamente
          if (response.success) {
              swal("Estado", 'Estado actualizado correctamente', "success");
              location.reload();

          } else {
              swal("Estado", 'Error al actualizar el estado', "error"); 
          }
      },
      error: function(xhr, status, error) {
          swal("Estado", 'Error al actualizar el estado', error); 

      }
  });
}
