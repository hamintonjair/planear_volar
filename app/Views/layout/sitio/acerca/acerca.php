    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Acerca de Nosotros</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="<?php echo base_url(); ?>">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Acerca</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    
    <!-- About Start -->
    <div class="container-fluid py-0">
        <div class="container pt-5">
            <div class="row">
            <?php foreach ($acerca as $a) { ?>

                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="<?php echo base_url(); ?>uploads/<?php echo $a['imagen']; ?>" style="object-fit: cover;border-radius:30px;">
                    </div>
                </div>

                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5"style="border-radius:30px;">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Acerda de Nosotros</h6>
                        <h1 class="mb-3"><?php echo $a['nombre']?></h1>
                        <p style="text-align: justify;"><?php  echo $a['descripcion']?></p>
                        <div class="row mb-4" >
                            <div class="col-6">
                                <img class="img-fluid" src="<?php echo base_url(); ?>uploads/<?php echo $a['imagen']; ?>" alt="">
                            </div>
                        
                        </div>
                    </div>
                </div>
                <?php }; ?>
            </div>
        </div>
    </div>
    <!-- About End -->

