   <!-- Header Start -->
   <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Destino</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="<?php echo base_url(); ?>">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Destino</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    
<!-- Destination Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destinos</h6>
            <h1>Explora los Mejores Destinos</h1>
        </div>
        <div class="row">
            <?php foreach ($destinos as $destino) : ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid destino-img" src="<?php echo base_url(); ?>public/uploads/<?php echo $destino['foto']; ?>" alt="">
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
