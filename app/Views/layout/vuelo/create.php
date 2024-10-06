<!-- Header Start -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: auto;">
            <div class="content-container py-3">
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
                <form action="<?= base_url('vuelos/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="imagen">Subir Imagen(<font color="red">*</font>)</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" required>
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