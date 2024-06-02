
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Guias</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="<?php base_url(); ?>">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Guias</p>
                </div>
            </div>
        </div>
    </div>
    

<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Guías</h6>
            <h1>Nuestros Guías de Viaje</h1>
        </div>
        <div class="row">
            <?php foreach ($guias as $guia) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?php echo base_url(); ?>public/uploads/<?php echo $guia['foto']; ?>" alt="">
                            <div class="team-social">
                                <?php if (!empty($guia['facebook'])); { ?>
                                    <a class="btn btn-outline-primary btn-square" href="<?php echo $guia['facebook'] ?>"  target="_blank"><i class="fab fa-facebook-f"></i></a>

                                <?php } ?>
                                <?php if (!empty($guia['facebook'])); { ?>
                                    <a class="btn btn-outline-primary btn-square" href="<?php echo $guia['instagram'] ?>"  target="_blank"><i class="fab fa-instagram"></i></a>

                                <?php } ?>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate"><?php echo $guia['nombre']; ?></h5>
                            <p class="m-0">Designado</p>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Team End -->
