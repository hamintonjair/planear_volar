<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Planear Volar</title>
    <link href="<?php echo base_url(); ?>assets/admin/css/styles.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>assets/admin/js/all.min.js" crossorigin="anonymous"></script>
</head>
<style>
    .bg-primary {
    background-color: rgb(112, 58, 128) !important;
}

</style>
<body class="bg-primary" >
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container" >
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="Logo" width="100%" > <!-- Añade tu logo aquí -->

                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form id="loginForm">
                                        <div class="form-floating mb-3">
                                            <input class="form-control"name="correo" id="correo" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Correo</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" id="password" type="password" placeholder="Contraseña" />
                                            <label for="inputPassword">Contraseña</label>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" >Login</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
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
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/admin/function_admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/admin/function_login.js"></script>

</body>

</html>