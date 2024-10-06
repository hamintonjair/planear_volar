<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: auto;">
            <div class="content-container py-3">
                <h1 style="color: white;">Mas detalles</h1>
                <h6 style="color: white;">Administración del aplicado</h6>
            </div>
        </div>
        <br><br>
        <!-- view_aplicacion.php -->
        <div class="container">
            <h3 style="text-align: center;">Información del aplicado <?= $aplicacion['nombre']; ?> <?= $aplicacion['apellidos']; ?></h3>
            <br>
            <div class="row">
                <div class="col-6">
                    <p><strong>Nombre:</strong> <?= $aplicacion['nombre']; ?></p>
                    <p><strong>Teléfono:</strong> <?= $aplicacion['telefono']; ?></p>
                    <p><strong>Estudio:</strong> <?= $aplicacion['estudio']; ?></p>
                    <p><strong>Año de Inicio:</strong> <?= $aplicacion['anio_inicio']; ?></p>
                    <p><strong>Ciudad:</strong> <?= $aplicacion['ciudad']; ?></p>
                    <p><strong>Curriculum:</strong> <a href="<?php echo base_url() ?>/uploads/<?= $aplicacion['curriculum']; ?> " target="_blank">Descargar</a></p>
                </div>
                <div class="col-6">
                    <p><strong>Apellidos:</strong> <?= $aplicacion['apellidos']; ?></p>
                    <p><strong>Dirección:</strong> <?= $aplicacion['direccion']; ?></p>
                    <p><strong>Profesión:</strong> <?= $aplicacion['profesion']; ?></p>
                    <p><strong>Año de Finalización:</strong> <?= $aplicacion['anio_final']; ?></p>
                    <p><strong>Fecha de Nacimiento:</strong> <?= $aplicacion['fecha_nacimiento']; ?></p>
                    <p><strong>Idiomas:</strong> <?= $aplicacion['idiomas']; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p><strong>Correo:</strong> <?= $aplicacion['correo']; ?></p>
                </div>
                <div class="col-6">
                    <p><strong>Otros Estudios:</strong> <?= $aplicacion['otros_estudios']; ?></p>
                </div>
            </div>
           <hr>
           <div class="row">
                   <h4>Información de la vacante</h4>
                   <br>
                <div class="col-12">
                    <p><strong>Nombre de la empresa:</strong> <?= $aplicacion['nombre_empresa']; ?></p>
                    <p><strong>Ubicación:</strong> <?= $aplicacion['nombre_ubicacion']; ?></p>
                    <p><strong>Vacante:</strong> <?= $aplicacion['nombre_vacante']; ?></p>
                    <p style="text-align: justify;"><strong>Descripción de la oferta:</strong> <?= $aplicacion['nombre_descripcion'] ?></p>
         
                </div>
            </div>
            <a class="btn btn-primary " href="<?php echo base_url() ?>vacantes/aplicados" role="button">Volver</a>
            <br><br><br>
    </main>

    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Todos los derechos reservados por Planearvolar 2024</div>
                <div>
                    <a href="#" target="_blank" class="text-muted">Yarlinson C. & Yubeimar P.</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<style>
    
    .dataTable-container {
        margin-top: 20px;
    }

    @media (max-width: 768px) {
        .dataTable-container {
            overflow-x: auto;
        }
    }
</style>