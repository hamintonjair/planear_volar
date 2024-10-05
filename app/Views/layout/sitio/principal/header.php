<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PLANEAR - Volar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="<?php echo base_url(); ?>assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <!-- <link href="<?php echo base_url(); ?>assets/css/cloudflare/font_awesome.all.min.css" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url(); ?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/styleP.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid pt-3 d-none d-lg-block" style="background-color:  rgb(112, 58, 128); color: #ffffff; text-shadow: none; ">

        <div class="container">
            <div class="row">
            <?php foreach ($configuracion as $con) { ?>
                <div class="col-lg-6 text-center text-lg-left mb-0 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i><?php echo $con['correo'] ?></p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i><?php echo $con['telefono'] ?></p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-primary px-3" href="<?php echo $con['facebook'] ?>">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-primary px-3" href="<?php echo $con['twitter'] ?>">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-primary px-3" href="<?php echo $con['linkedin'] ?>">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-primary px-3" href="<?php echo $con['instagram'] ?>">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-primary pl-3" href="<?php echo $con['youtube'] ?>">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <?php }; ?>

            </div>
        </div>
    </div>
    <!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid position-relative nav-bar p-0">
    <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="<?php echo base_url(); ?>" class="navbar-brand">
                <img src="<?php base_url(); ?>assets/img/logo.png" alt="planear volar" style="max-height: 80px; border-radius: 20px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="<?php echo base_url(); ?>" class="nav-item nav-link active">Home</a>
                    <a href="<?php echo base_url(); ?>vuelos" class="nav-item nav-link">Vuelos</a>
                    <a href="<?php echo base_url(); ?>paquetes" class="nav-item nav-link">Paquetes turísticos</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Más</a>
                        <div class="dropdown-menu border-0 rounded-0 m-0" aria-labelledby="navbarDropdown">
                            <a href="<?php echo base_url(); ?>trabaja_con_nosotros" class="dropdown-item">Trabaja con nosotros</a>
                            <a href="<?php echo base_url(); ?>destino" class="dropdown-item">Destino</a>
                            <a href="<?php echo base_url(); ?>guias" class="dropdown-item">Guías de viajes</a>
                            <a href="<?php echo base_url(); ?>testimonio" class="dropdown-item">Testimonio</a>
                        </div>
                    </div>
                    <a href="<?php echo base_url(); ?>acerca_de" class="nav-item nav-link">Acerca de</a>
                    <a href="<?php echo base_url(); ?>contactanos" class="nav-item nav-link">Contactos</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

