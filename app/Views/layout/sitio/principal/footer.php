<!-- Footer Start -->
<div class="container-fluid " style="background-color:  rgb(112, 58, 128); color: #ffffff; text-shadow: none; margin-top: 90px;">
    <div class="row pt-5">
        <?php foreach ($configuracion as $con) { ?>
            <div class="col-lg-4 col-md-6 mb-5">
                <a href="<?php echo base_url(); ?>" class="navbar-brand">
                    <img src="<?php base_url(); ?>assets/img/logo.png" alt="planear volar" style="max-height: 80px; border-radius: 20px;">
                </a>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Síguenos</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-outline-primary btn-square mr-2" href="<?php echo $con['twitter'] ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="<?php echo $con['facebook'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="<?php echo $con['linkedin'] ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="<?php echo $con['instagram'] ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-primary btn-square" href="<?php echo $con['youtube'] ?>" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>

            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Nuestros Servicios</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="<?php echo base_url() ?>acerca_de"><i class="fa fa-angle-right mr-2"></i>Acerca de nosotros</a>
                    <a class="text-white-50 mb-2" href="<?php echo base_url() ?>destino"><i class="fa fa-angle-right mr-2"></i>Destinos</a>
                    <a class="text-white-50 mb-2" href="<?php echo base_url() ?>trabaja_con_nosotros"><i class="fa fa-angle-right mr-2"></i>Trabaja con nosotros</a>
                    <a class="text-white-50 mb-2" href="<?php echo base_url() ?>paquetes"><i class="fa fa-angle-right mr-2"></i>Paquetes tutisticos</a>
                    <a class="text-white-50 mb-2" href="<?php echo base_url() ?>guias"><i class="fa fa-angle-right mr-2"></i>Guias</a>
                    <a class="text-white-50 mb-2" href="<?php echo base_url() ?>testimonio"><i class="fa fa-angle-right mr-2"></i>Testimonios</a>
                    <a class="text-white-50" href="<?php echo base_url() ?>vuelos"><i class="fa fa-angle-right mr-2"></i>Vuelos</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contactanos</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i><?php echo $con['direccion'] ?> (<?php echo $con['ciudad'] ?>)</p>
                <p><i class="fa fa-phone-alt mr-2"></i><?php echo $con['telefono'] ?></p>
                <p><i class="fa fa-envelope mr-2"></i><?php echo $con['correo'] ?></p>

            </div>
        <?php }; ?>
    </div>
</div>

<div class="container-fluid text-white border-top py-4 px-sm-3 px-md-5" style="background-color: rgb(112, 58, 128) !important;">
    <div class="row">
        <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
            <p class="m-0 text-white-50">Copyright &copy; <a href="https://hammenamena.mercadoshops.com.co/">Dominio</a>.Todos los derechos reservados por Jojama 2024.</a>
            </p>
        </div>
        <div class="col-lg-6 text-center text-md-right">
            <p class="m-0 text-white-50">Desarrollado por <a href="https://hammenamena.mercadoshops.com.co/" target="_blank">Visita nuestro sitio</a>
            </p>
        </div>
    </div>
</div>
<!-- Footer End -->
<a href="https://wa.me/57<?php echo $con['telefono'] ?>" class="whatsapp-float" target="_blank">
    <i class="fab fa-whatsapp"></i>
</a>
<!-- Fin seccion whatsapp -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/easing/easing.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/tempusdominus/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>

<!-- Contact Javascript File -->
<script src="<?php echo base_url(); ?>assets/mail/jqBootstrapValidation.min.js"></script>
<script src="<?php echo base_url(); ?>assets/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/function_sitio.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/function_admin.js"></script>


</body>

</html>