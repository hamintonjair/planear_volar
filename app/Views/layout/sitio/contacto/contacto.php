<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase">Contactanos</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="<?php echo base_url(); ?>">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Contacto</p>
            </div>
        </div>
    </div>
</div>

<!-- Contact Start -->
<div class="container-fluid py-0">
    <div class="container py-5">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Contacto</h6>
            <h1>Contactanos para mayor información</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form bg-white" style="padding: 30px;">
                    <!-- Agrega un contenedor para mostrar el mensaje -->
                    <div id="mensaje" class="alert" style="display: none;"></div>
                    <form id="contactForm" action="<?php echo base_url(); ?>enviar" method="POST">
                        <div class="form-row">
                            <div class="control-group col-sm-6">
                                <input type="text" class="form-control p-4" id="nombre" name="nombre" placeholder="Tu nombre y apellidos" required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group col-sm-6">
                                <input type="email" class="form-control p-4" id="correo" name="correo" placeholder="Tu correo" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control p-4" id="asunto" name="asunto" placeholder="Asunto" required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control py-3 px-4" rows="5" id="mensaje" name="mensaje" placeholder="Mensaje" required="required" data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary btn-block py-3" type="submit">Enviar Mensaje</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#contactForm').submit(function(event) {
            event.preventDefault(); // Evita el envío del formulario por defecto

            // Realiza la solicitud AJAX para enviar el formulario
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    // Muestra el mensaje de respuesta
                    $('#mensaje').removeClass('alert-success alert-danger');
                    if (response.ok) {
                        document.querySelector('#contactForm').reset();
                        $('#mensaje').addClass('alert-success').text(response.message).show();


                    } else {
                        $('#mensaje').addClass('alert-danger').text(response.message).show();
                    }
                },
                error: function() {
                    // Maneja errores de la solicitud AJAX
                    $('#mensaje').addClass('alert-danger').text('Error al enviar el formulario.').show();
                }
            });
        });
    });
</script>