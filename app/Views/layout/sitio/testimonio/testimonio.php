    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Testimonial</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="<?php echo base_url(); ?>">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Testimonio</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    
<!-- Testimonial Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimonios</h6>
            <h1>Qué Dicen Nuestros Clientes</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <?php foreach ($testimonios as $testimonio) : ?>
                <div class="text-center pb-4">
                    <img class="img-fluid mx-auto" src="<?php echo base_url(); ?>public/uploads/<?php echo $testimonio['foto']; ?>" style="width: 100px; height: 100px;">
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <p class="mt-5"><?php echo $testimonio['descripcion']; ?></p>
                        <h5 class="text-truncate"><?php echo $testimonio['nombre_cliente']; ?></h5>
                        <span><?php echo $testimonio['profesion']; ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Testimonial End -->
