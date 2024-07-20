document.addEventListener("DOMContentLoaded", function () {
    // Botón para habilitar la edición
    document.getElementById("btnHabilitar").addEventListener("click", function () {
        let formElements = document.querySelectorAll("#frmConfiguracion input, #frmConfiguracion select");
        formElements.forEach(function (element) {
            element.disabled = false;
        });
        document.getElementById("btnGuardar").disabled = false;
    });
// actualizar
    $("#frmConfiguracion").on("submit", function (event) {
        event.preventDefault();
        let base_url = "http://localhost/planear_volar/";
        
        var formData = new FormData(this);
        
        $.ajax({
            type: "post",
            url: base_url + "configuracion/actualizar",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (response) {
                if (response.ok) {
                    swal({
                        title: "Configuración",
                        text: response.message,
                        icon: "success",
                        button: "OK",
                    });
                    // Deshabilitar el formulario nuevamente
                    let formElements = document.querySelectorAll("#frmConfiguracion input, #frmConfiguracion select");
                    formElements.forEach(function (element) {
                        element.disabled = true;
                    });
                    document.getElementById("btnGuardar").disabled = true;
                } else {
                    swal({
                        title: "Error",
                        text: response.message,
                        icon: "error",
                        button: "OK",
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error('Error al actualizar configuración:', error);
            }
        });
    });

    // Cargar los datos de configuración cuando la página se carga
    cargarConfiguracion();
});
// cargar los datos de la empresa
function cargarConfiguracion() {
    let base_url = "http://localhost/planear_volar/";
    $.ajax({
        url: base_url + "configuracion/obtener",
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (response.ok) {
                $('#idempresa').val(response.data.id);
                $('#nombre_empresa').val(response.data.nombre_empresa);
                $('#correo').val(response.data.correo);
                $('#telefono').val(response.data.telefono);
                $('#ciudad').val(response.data.ciudad);
                $('#direccion').val(response.data.direccion);
                $('#facebook').val(response.data.facebook);
                $('#instagram').val(response.data.instagram);
                $('#twitter').val(response.data.twitter);
                $('#linkedin').val(response.data.linkedin);
                $('#youtube').val(response.data.youtube);
            } else {
                swal({
                    title: "Error",
                    text: "No se hay informacion de la configuración",
                    icon: "error",
                    button: "OK",
                });
            }
        },
        error: function (xhr, status, error) {
            console.error('Error al cargar configuración:', error);
        }
    });
}
