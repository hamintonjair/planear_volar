<div id="layoutSidenav_content">
<main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Usuarios: <?= $totalUsuarios; ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?php echo base_url('usuarios') ?>">Ver Detalles</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Clientes: <?= $totalClientes; ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?php echo base_url('clientes') ?>">Ver Detalles</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Guias: <?= $totalGuias; ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?php echo base_url('guias_de_viajes') ?>">Ver Detalles</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Paquetes turisticos: <?= $totalPaquetes; ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?php echo base_url('paquetes_turisticos') ?>">Ver Detalles</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">Reservas Facturadas: <?= $totalReservas; ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?php echo base_url('reservas/hotel') ?>">Ver Detalles</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body">Mensajes por leer: <?= $totalMensajes; ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?php echo base_url('mensajes') ?>">Ver Detalles</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body">Reservas pendientes: <?= $totalReservas; ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?php echo base_url('reservas') ?>">Ver Detalles</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">Aplicados a vacantes: <?= $totalAplicacion; ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?php echo base_url('trabajos') ?>">Ver Detalles</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Reservas Facturadas por Mes
                        </div>
                        <div class="card-body"><canvas id="AreaChar" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Cantidad de Testimonios
                        </div>
                        <div class="card-body"><canvas id="BarChar" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
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
<script>
    document.addEventListener("DOMContentLoaded", function () {

    // Datos para el gráfico de área (reservas facturadas por mes)
    const areaCtx = document.getElementById('AreaChar').getContext('2d');
    const AreaChar = new Chart(areaCtx, {
        type: 'line',
        data: {
            labels: <?= json_encode($meses); ?>, // Array de meses
            datasets: [{
                label: 'Reservas Facturadas',
                data: <?= json_encode($facturasGeneradas); ?>, // Array de datos de reservas facturadas
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: true
            }]
        },
        options: {
            scales: {
                x: { 
                    beginAtZero: true 
                },
                y: { 
                    beginAtZero: true 
                }
            }
        }
    });

    // Datos para el gráfico de barras (cantidad de testimonios)
    const barCtx = document.getElementById('BarChar').getContext('2d');
    const BarChar = new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($meses); ?>, // Array de meses
            datasets: [{
                label: 'Testimonios',
                data: <?= json_encode($cantidadTestimonios); ?>, // Array de datos de testimonios
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: { 
                    beginAtZero: true 
                },
                y: { 
                    beginAtZero: true 
                }
            }
        }
    });
});
</script>