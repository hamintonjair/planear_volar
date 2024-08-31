<!-- Carousel Start -->
<style>
.carousel-item img {
    max-height: 600px;
    object-fit: contain;
    width: auto;
    max-width: 100%;
    margin: 0 auto;
}
</style>
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
               <!-- Mezclar y limitar a los primeros 6 paquetes -->
            <?php 
            shuffle($paquetes);
            $paquetes_mostrados = array_slice($paquetes, 0, 5); 
            ?>
            <?php foreach ($paquetes_mostrados as $index => $paquete) : ?>
                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <img class="w-100" src="<?php echo base_url(); ?>uploads/<?php echo $paquete['foto']; ?>" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Tours y viajes</h4>
                            <h6 class="display-3 text-white mb-md-4"><?php echo $paquete['nombre_paquete']; ?></h6>
                            <a href="<?php echo base_url() ?>paquetes" class="btn btn-primary py-md-3 px-md-5 mt-2">Reservar ahora</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
    </div>

</div>

