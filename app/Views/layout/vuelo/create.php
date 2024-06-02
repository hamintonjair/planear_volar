<!-- Header Start -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: 100px;">
            <div class="content-container">
                <h1 style="color: white;">Vuelos</h1>
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
            <label for="">Todos los campos con (<font color="red">*</font>) son obligatorios.</label>
                <form action="<?= base_url('vuelos/store') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="origen">Origen(<font color="red">*</font>)</label>
                            <input type="text" class="form-control" id="origen" name="origen" placeholder="Origen" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="destino">Destino(<font color="red">*</font>)</label>
                            <input type="text" class="form-control valid validText" id="destino" name="destino" placeholder="Destino" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fecha_salida">Fecha de Salida(<font color="red">*</font>)</label>
                            <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="hora_salida">Hora de Salida(<font color="red">*</font>)</label>
                            <input type="time" class="form-control" id="hora_salida" name="hora_salida" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="duracion">Duración(<font color="red">*</font>)</label>
                            <input type="number" class="form-control" id="duracion" name="duracion" placeholder="45 minutos" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="precio">Precio(<font color="red">*</font>)</label>
                            <input type="number" class="form-control valid validNumber" id="precio" name="precio" placeholder="costo" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
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