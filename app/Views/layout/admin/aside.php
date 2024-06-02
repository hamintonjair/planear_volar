<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <?php 
                    $session = session();
                    $nombre = $session->get('nombre');
                    $apellido = $session->get('apellido')
                    ; ?>
                    <div class="sb-sidenav-menu-heading"><h4><?php echo $nombre, ' ',$apellido ?></h4></div>
                    <a class="nav-link" href="<?php echo base_url(); ?>dashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="<?php echo base_url(); ?>administracion" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Administración
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo base_url(); ?>configuracion">
                                <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                                Configuración
                            </a>
                            <a class="nav-link" href="<?php echo base_url(); ?>usuarios">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Usuarios
                            </a>
                            <a class="nav-link" href="<?php echo base_url(); ?>clientes">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                                Clientes
                            </a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                        Empresa
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="<?php echo base_url(); ?>acerca">
                                <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
                                Acerca de nosotros
                            </a>
                            <a class="nav-link" href="<?php echo base_url(); ?>mensajes">
                                <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                                Mensajes
                            </a>
                            <a class="nav-link" href="<?php echo base_url(); ?>trabajos">
                                <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                                Vacantes
                            </a>
                            <a class="nav-link" href="<?= base_url() ?>vacantes/aplicados">
                                <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                                Aplicados a vacantes
                            </a>
                            <a class="nav-link" href="<?php echo base_url(); ?>ofertas">
                                <div class="sb-nav-link-icon"><i class="fas fa-tag"></i></div>
                                Oferta
                            </a>
                        </nav>
                    </div>
                    <a class="nav-link" href="<?php echo base_url(); ?>paquetes_turisticos">
                        <div class="sb-nav-link-icon"><i class="fas fa-suitcase-rolling"></i></div>
                        Paquetes turísticos
                    </a>
                    <a class="nav-link" href="<?php echo base_url(); ?>destinos">
                        <div class="sb-nav-link-icon"><i class="fas fa-map-marker-alt"></i></div>
                        Destinos
                    </a>
                    <a class="nav-link" href="<?php echo base_url(); ?>guias_de_viajes">
                        <div class="sb-nav-link-icon"><i class="fas fa-map-signs"></i></div>
                        Guías de viajes
                    </a>
                    <a class="nav-link" href="<?php echo base_url(); ?>vuelo">
                        <div class="sb-nav-link-icon"><i class="fas fa-plane"></i></div>
                        Vuelos
                    </a>

                    <a class="nav-link" href="<?= base_url() ?>reservas">
                        <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                        Reservas
                    </a>
                    <a class="nav-link" href="<?= base_url() ?>reservas/hotel">
                        <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                        Crear Reserva
                    </a>
                    <a class="nav-link" href="<?php echo base_url(); ?>testimonios">
                        <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
                        Testimonios
                    </a>
                    <a class="nav-link" href="<?php echo base_url() ?>" target="_blank">
                        <div class="sb-nav-link-icon"><i class="fas fa-external-link-alt"></i></div>
                        Ir a sitio web
                    </a>
                </div>
            </div>

        </nav>
    </div>