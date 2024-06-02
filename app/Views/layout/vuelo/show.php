<!-- Header Start -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: 100px;">
            <div class="content-container">
                <h1 style="color: white;">Listar vuelos</h1>
                <h6 style="color: white;">Administración de los Vuelos</h6>
            </div>
        </div>
        <div class="container-fluid px-4 mt-4">
            <div class="d-flex justify-content-start mb-3">
                <a href="<?= base_url('vuelo') ?>" class="btn btn-success mb-3">Volver</a>
            </div>
        </div>
        <div class="container-fluid py-2">
            <div class="container pt-0 pb-3">
                <h2>Detalles del Vuelo</h2>
                <p>ID: <?= $vuelo['id']; ?></p>
                <p>Origen: <?= $vuelo['origen']; ?></p>
                <p>Destino: <?= $vuelo['destino']; ?></p>
                <p>Fecha de Salida: <?= $vuelo['fecha_salida']; ?></p>
                <p>Hora de Salida: <?= $vuelo['hora_salida']; ?></p>
                <p>Duración: <?= $vuelo['duracion']; ?></p>
                <p>Precio: <?= $vuelo['precio']; ?></p>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Todos los derechos reservados por Jojama 2024</div>
                <div>
                    <a href="https://hammenamena.mercadoshops.com.co/" target="_blank" class="text-muted">Visita nuestro sitio web</a>
                </div>
            </div>
        </div>
    </footer>
</div>