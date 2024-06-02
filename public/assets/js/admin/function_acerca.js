document.addEventListener("DOMContentLoaded", function () {
    // Botón para habilitar la edición
    document.getElementById("btnHabilitar").addEventListener("click", function () {
        let formElements = document.querySelectorAll("#frmAcercaDe input, #frmAcercaDe textarea");
        formElements.forEach(function (element) {
            element.disabled = false;
        });
        document.getElementById("btnGuardar").disabled = false;
    });
    document.querySelector('#frmAcercaDe').reset();

    // Manejo del formulario de "Acerca de Nosotros"
    $("#frmAcercaDe").on("submit", function (event) {
        event.preventDefault(); // Prevenir el envío del formulario por defecto
        let base_url = "http://localhost/planear_volar/public/";

        // Crear un nuevo objeto FormData con los datos del formulario
        var formData = new FormData(this);

        $.ajax({
            url: base_url + "acerca/actualizar",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.ok) {
                    swal({
                        title: "Acerca de Nosotros",
                        text: response.message,
                        icon: "success",
                        button: "OK",
                    });
                    // Deshabilitar el formulario nuevamente
                    let formElements = document.querySelectorAll("#frmAcercaDe input, #frmAcercaDe textarea");
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
                console.error('Error al actualizar información:', error);
            }
        });
    });

    // Cargar los datos de "Acerca de Nosotros" cuando la página se carga
    cargarAcercaDe();

    // Vista previa de la imagen
    document.getElementById("imagen").addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("imgPreview").src = e.target.result;
                document.getElementById("imgPreview").style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
});

function cargarAcercaDe() {
    let base_url = "http://localhost/planear_volar/public/";
    $.ajax({
        url: base_url + "acerca/obtener",
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (response.ok) {
                $('#idacerca').val(response.data.id);
                $('#nombre').val(response.data.nombre);
                $('#descripcion').val(response.data.descripcion);
                if (response.data.imagen) {
                    $('#imgPreview').attr('src', base_url +'public/uploads/' + response.data.imagen).show();

                }
            } else {
                swal({
                    title: "Error",
                    text: "No se pudieron cargar los datos de 'Acerca de Nosotros'",
                    icon: "error",
                    button: "OK",
                });
            }
        },
        error: function (xhr, status, error) {
            console.error('Error al cargar información:', error);
        }
    });
}
