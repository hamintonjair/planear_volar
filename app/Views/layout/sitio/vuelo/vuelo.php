<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase">Vuelos</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="<?php echo base_url(); ?>">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Vuelos</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Vuelos Disponibles Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Vuelos</h6>
            <h1>Vuelos Disponibles</h1>
        </div>
        <div class="row">
            <?php if (empty($vuelo)) { ?>
                <div class="col-12 d-flex justify-content-center">
                    <h3 style="text-align: center;">No hay vuelos disponibles en estos momentos.</h3>
                </div>
            <?php } else { ?>
                <?php foreach ($vuelo as $vuel) : ?>

                    <head>
                        <style>
                            .custom-card {
                                background-color: rgb(112, 58, 128);
                                color: white;
                            }
                        </style>
                    </head>

                    <body>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="service-item custom-card text-center mb-2 py-5 px-4">
                                <p class="m-0"><strong>Origen:</strong> <?= esc($vuel['origen']) ?></p>
                                <p class="m-0"><strong>Destino:</strong> <?= esc($vuel['destino']) ?></p>
                                <p class="m-0"><strong>Fecha de Salida:</strong> <?= esc($vuel['fecha_salida']) ?></p>
                                <p class="m-0"><strong>Hora de Salida:</strong> <?= esc($vuel['hora_salida']) ?></p>
                                <p class="m-0"><strong>Duración:</strong> <?= esc($vuel['duracion']) ?></p>
                                <p class="m-0"><strong>Precio:</strong> $<?= esc($vuel['precio']) ?></p>
                            </div>
                        </div>
                    </body>

                <?php endforeach; ?>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Vuelos Disponibles End -->