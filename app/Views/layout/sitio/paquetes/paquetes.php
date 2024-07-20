   <!-- Header Start -->
   <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Paquetes Turisticos</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="<?php echo base_url(); ?>">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Paquetes</p>
                </div>
            </div>
        </div>
    </div>


    
<!-- Reservation Start -->
<div class="container-fluid bg-registration " style="margin: 90px 0;">
    <div class="container ">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <?php if (!empty($ofertas)) { ?>

                    <?php foreach ($ofertas as $oferta) : ?>

                        <?php if ($oferta['estado'] == 'Aplicado') { ?>
                            <div class="mb-4">
                                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;"><?php echo $oferta['nombre']; ?></h6>
                                <h1 class="text-white"><span class="text-primary"><?php echo $oferta['descuento']; ?></span> <?php echo $oferta['dirigido']; ?></h1>
                            </div>
                            <p class="text-white" style="text-align: justify;"><?php echo $oferta['descripcion']; ?></p>

                        <?php } else { ?>
                            <h3 class="text-white" style="text-align: center;">No hay oferta en estos momentos</h3>
                    <?php }
                    endforeach; ?>
                <?php } else { ?>
                    <h3 class="text-white" style="text-align: center;">No hay oferta en estos momentos</h3>

                <?php }; ?>
            </div>

            <div class="col-lg-5">
                <div class="card border-0">
                    <div class="card-header bg-primary text-center p-4">
                        <h1 class="text-white m-0">Reserva Ahora</h1>
                    </div>
                    <div class="card-body rounded-bottom bg-white p-5">
                        <form id="reservaForm" action="<?php echo base_url(); ?>reservar" method="POST">
                            <div class="form-group">
                                <input type="text" name="nombre" class="form-control p-4" placeholder="Nombre" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="apellidos" class="form-control p-4" placeholder="Apellidos" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="telefono" class="form-control p-4" placeholder="Teléfono" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" name="correo" class="form-control p-4" placeholder="Correo Electrónico" required="required" />
                            </div>
                            <div class="form-group">
                                <select name="destino" class="custom-select px-4" style="height: 47px;" required>
                                    <option selected>Selecciona un destino</option>
                                    <?php foreach ($paquetes as $paquete) : ?>
                                        <option value="<?php echo $paquete['id']; ?>"><?php echo $paquete['nombre_paquete']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block py-3" type="submit">Reservar Ahora</button>
                            </div>
                        </form>
                        <!-- Agrega un contenedor para mostrar el mensaje -->
                        <div id="mensaje" class="alert" style="display: none;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#reservaForm').submit(function(event) {
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
                        document.querySelector('#reservaForm').reset();
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
<!-- Reservation End -->

    <?php 
use App\Models\DestinoModel;
$destinoModel = new DestinoModel();

; ?>
<!-- Packages Start -->
<div class="container-fluid">
    <div class="container pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Paquetes</h6>
            <h1>Paquetes Turísticos Perfectos</h1>
        </div>
        <div class="row">
        <?php $paquetes_mostrados = array_slice($paquetes, 0, 6); ?>
            <?php foreach ($paquetes_mostrados as $paquete) : ?>
                <?php
                 $nombre_ciudad = $destinoModel->find($paquete['ciudad_id'])['nombre'];

                // Obtener las primeras 10 palabras de la descripción
                $descripcion_completa = $paquete['descripcion'];
                $nombre_completa = $paquete['nombre_paquete'];

                // Combinar el nombre del paquete con la descripción
                $descripcion_con_nombre = $nombre_completa . ' - ' . $descripcion_completa;

                // Obtener las primeras 10 palabras de la combinación
                $primeras_palabras = implode(' ', array_slice(explode(' ', $descripcion_con_nombre), 0, 10)) . '...';
                ?>
            
            <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2" style="width: 350px; height: 500px; overflow: hidden;">
                        <div class="img-container">
                            <img class="img-fluid" src="<?php echo base_url(); ?>uploads/<?php echo $paquete['foto']; ?>" style="cursor: pointer; width: 100%; height: auto;" alt="">
                        </div>
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i><?php echo $nombre_ciudad; ?></small>
                                <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i><?php echo $paquete['tiempo_estadia']; ?></small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i><?php echo $paquete['cant_personas']; ?></small>
                            </div>
                            <a class="h5 text-decoration-none descripcion-corta" data-toggle="modal" data-target="#descripcionModal" data-id="<?php echo $paquete['id']; ?>" style="cursor: pointer;"> <?php echo $primeras_palabras ?><h6>(<font color="red">más</font>)</h6></a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h5 class="m-0">$<?php echo $paquete['costo']; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="descripcionModal" tabindex="-1" role="dialog" aria-labelledby="descripcionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-purple text-white">
                <h5 class="modal-title" id="descripcionModalLabel" style="color:#fff">Descripción Completa del paquete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Aquí se cargará la descripción completa -->
            </div>
        </div>
    </div>
</div>
<!-- Packages End -->

<!-- JavaScript para manejar el modal y la solicitud AJAX -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#descripcionModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que disparó el modal
        var paqueteId = button.data('id'); // Extraer el ID del paquete

        var modal = $(this);
        modal.find('.modal-body').html('Cargando...'); // Mensaje temporal mientras se carga la descripción

        // Realizar la solicitud AJAX
        $.ajax({
            url: '<?php echo base_url(); ?>paquetes/descripcion/' + paqueteId, // URL de la solicitud
            type: 'GET',
            dataType: 'json', // Esperamos una respuesta en formato JSON
            success: function(response) {
                if (response.ok) {
                    modal.find('.modal-body').html(response.data); // Actualizar el contenido del modal con la descripción
                } else {
                    modal.find('.modal-body').html('Error al cargar la descripción.');
                }
            },
            error: function() {
                modal.find('.modal-body').html('Ocurrió un error al cargar la descripción.');
            }
        });
    });
});
</script>

<!-- CSS para asegurar que todas las fotos sean del mismo tamaño y personalizar el modal -->
<style>
    .img-container {
        height: 200px; /* Ajusta esta altura según sea necesario */
        overflow: hidden;
        position: relative;
    }
    .img-container img {
        object-fit: cover;
        height: 100%;
        width: 100%;
        display: block;
    }
    .modal-dialog.modal-lg {
        max-width: 80%; /* Ajusta el ancho del modal */
    }
    .modal-header.bg-purple {
        background-color: rebeccapurple; /* Color morado */
    }
    .modal-header.bg-purple .close {
        color: white;
    }

</style>


  <!-- Destination Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destinos</h6>
            <h1>Explora los Mejores Destinos</h1>
        </div>
        <div class="row">
        <?php $paquetes_mostrados = array_slice($destinos, 0, 3); ?>
            <?php foreach ($paquetes_mostrados as $destino) : ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid destino-img" src="<?php echo base_url(); ?>uploads/<?php echo $destino['foto']; ?>" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href=""  data-toggle="modal" data-target="#detallesModal" data-id="<?php echo $destino['id']; ?>">
                            <h5 class="text-white"><?php echo $destino['nombre']; ?></h5>
                            <span><?php echo $destino['municipio']; ?> Ciudades</span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="detallesModal" tabindex="-1" role="dialog" aria-labelledby="descripcionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- modal-lg para un modal más ancho -->
        <div class="modal-content">
            <div class="modal-header bg-purple text-white" > <!-- Morado -->
                <h5 class="modal-title" id="descripcionModalLabel"style="color:#fff">Información completa la ciudad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Aquí se cargará la descripción completa -->
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#detallesModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que disparó el modal
        var destinoId = button.data('id'); // Extraer el ID del detalle

        var modal = $(this);
        modal.find('.modal-body').html('Cargando...'); // Mensaje temporal mientras se carga el detalle

        // Realizar la solicitud AJAX
        $.ajax({
            url: '<?php echo base_url(); ?>destinos/detalles/' + destinoId, // URL de la solicitud
            type: 'GET',
            dataType: 'json', // Esperamos una respuesta en formato JSON
            success: function(response) {
                if (response.ok) {
                    modal.find('.modal-body').html(response.data); // Actualizar el contenido del modal con el detalle
                } else {
                    modal.find('.modal-body').html('Error al cargar el detalle.');
                }
            },
            error: function() {
                modal.find('.modal-body').html('Ocurrió un error al cargar el detalle.');
            }
        });
    });
});
</script>
<!-- Destination End -->
