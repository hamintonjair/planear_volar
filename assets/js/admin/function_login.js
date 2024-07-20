
//   inicio d esession
document.addEventListener('DOMContentLoaded', function() {
    let base_url = 'http://localhost/planear_volar/';
    $('#loginForm').on('submit', function(event) {
        event.preventDefault(); // Prevenir el envío del formulario por defecto

        // Crear un nuevo objeto FormData con los datos del formulario
        var formData = new FormData(this);

        // Enviar los datos mediante AJAX
        $.ajax({
            type: 'POST',
            url: base_url +'validar', // URL del backend para la autenticación
            data: formData,
            processData: false, // Evitar que jQuery procese los datos automáticamente
            contentType: false, // Evitar que jQuery configure el tipo de contenido automáticamente
            dataType: 'json',
            success: function(response) {
                if (response.ok == true) {
                    swal({
                        title: 'Login',
                        text: response.post,
                        icon: "success",
                        button: "OK",
                      });
                    window.location.href = 'dashboard'; // Redirigir a la página de dashboard si el login es exitoso
                } else {
                    swal({
                        title: 'Login',
                        text: response.post,
                        icon: "info",
                        button: "OK",
                      });
                }
            },
            error: function(xhr, status, error) {
                swal('Error', 'El correo no está registrado', 'error'); // Manejar errores de la petición
            }
        });
    });
});