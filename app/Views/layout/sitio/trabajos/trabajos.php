<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase">Trabaja con nosotros</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="<?php echo base_url(); ?>">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Trabajos</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="row pb-3">
                    <?php if (empty($vacantes)) { ?>
                        <div class="col-12 d-flex justify-content-center">
                            <h3 style="text-align: center;">No hay vacantes en estos momentos.</h3>
                        </div>
                    <?php } else { ?>
                        <?php foreach ($vacantes as $v) : ?>
                            <div class="col-md-6 mb-4 pb-2">
                                <div class="blog-item">
                                    <div class="position-relative">
                                        <div class="blog-date">
                                            <h6 class="font-weight-bold mb-n1"><?= esc($v['dia']) ?></h6>
                                            <small class="text-white text-uppercase"><?= esc($v['mes']) ?></small>
                                        </div>
                                    </div>
                                    <div class="bg-white p-4 blog-content">
                                        <div class="d-flex mb-2 text-move-right">
                                            <a class="text-primary text-uppercase text-decoration-none"><?= esc($v['nombre']) ?></a>
                                            <span class="text-primary px-2">|</span>
                                            <a class="text-primary text-uppercase text-decoration-none"><?= esc($v['empresa']) ?></a>
                                        </div>
                                        <p class="blog-text"><?= esc($v['ubicacion']) ?></p>
                                        <p class="blog-text"><?= htmlspecialchars_decode($v['descripcion']) ?></p>

                                        <button class="btn btn-primary apply-btn" data-id="<?= esc($v['id']) ?>" data-nombre="<?= esc($v['nombre']) ?>" data-empresa="<?= esc($v['empresa']) ?>" data-descripcion="<?= esc($v['descripcion']) ?>" data-bs-toggle="modal" data-bs-target="#applyModal">Aplicar</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->

<!-- Modal de Aplicación -->
<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #25142d;">
                <h5 class="modal-title" style="color:white;" id="applyModalLabel">Aplicar a la Vacante</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">Todos los campos con (<font color="red">*</font>) son obligatorios.</label>

                <form id="applyForm" enctype="multipart/form-data">
                    <input type="hidden" id="vacante_id" name="vacante_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre(<font color="red">*</font>)</label>
                                <input type="text" class="form-control valid validText" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellidos">Apellidos(<font color="red">*</font>)</label>
                                <input type="text" class="form-control valid validText" id="apellidos" name="apellidos" placeholder="Ingresa tus apellidos" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="codigo_pais">Código País(<font color="red">*</font>)</label>
                                <select class="form-control" id="codigo_pais" name="codigo_pais" required>
                                    <option value="+57">+57 Colombia</option>
                                    <option value="+1">+1 USA</option>
                                    <option value="+52">+52 México</option>
                                    <option value="+34">+34 España</option>
                                    <option value="+44">+44 Reino Unido</option>
                                    <option value="+49">+49 Alemania</option>
                                    <option value="+33">+33 Francia</option>
                                    <option value="+39">+39 Italia</option>
                                    <option value="+81">+81 Japón</option>
                                    <option value="+86">+86 China</option>
                                    <option value="+91">+91 India</option>
                                    <option value="+61">+61 Australia</option>
                                    <option value="+55">+55 Brasil</option>
                                    <option value="+7">+7 Rusia</option>
                                    <option value="+82">+82 Corea del Sur</option>
                                    <option value="+31">+31 Países Bajos</option>
                                    <option value="+46">+46 Suecia</option>
                                    <option value="+41">+41 Suiza</option>
                                    <option value="+32">+32 Bélgica</option>
                                    <option value="+47">+47 Noruega</option>
                                    <option value="+45">+45 Dinamarca</option>
                                    <option value="+358">+358 Finlandia</option>
                                    <option value="+64">+64 Nueva Zelanda</option>
                                    <option value="+48">+48 Polonia</option>
                                    <option value="+30">+30 Grecia</option>
                                    <option value="+353">+353 Irlanda</option>
                                    <option value="+27">+27 Sudáfrica</option>
                                    <option value="+90">+90 Turquía</option>
                                    <option value="+351">+351 Portugal</option>
                                    <option value="+356">+356 Malta</option>
                                    <option value="+374">+374 Armenia</option>
                                    <option value="+32">+32 Bélgica</option>
                                    <option value="+359">+359 Bulgaria</option>
                                    <option value="+385">+385 Croacia</option>
                                    <option value="+357">+357 Chipre</option>
                                    <option value="+420">+420 República Checa</option>
                                    <option value="+372">+372 Estonia</option>
                                    <option value="+354">+354 Islandia</option>
                                    <option value="+36">+36 Hungría</option>
                                    <option value="+354">+354 Islandia</option>
                                    <option value="+972">+972 Israel</option>
                                    <option value="+64">+64 Nueva Zelanda</option>
                                    <option value="+351">+351 Portugal</option>
                                    <option value="+40">+40 Rumania</option>
                                    <option value="+421">+421 Eslovaquia</option>
                                    <option value="+386">+386 Eslovenia</option>
                                    <option value="+46">+46 Suecia</option>
                                    <option value="+380">+380 Ucrania</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono">Teléfono(<font color="red">*</font>)</label>
                                <input type="tel" class="form-control valid validNumber" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" maxlength="10" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccion">Dirección(<font color="red">*</font>)</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresa tu dirección" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="correo">Correo(<font color="red">*</font>)</label>
                                <input type="email" class="form-control valid validEmail" id="correo" name="correo" placeholder="Ingresa tu correo" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estudio">Estudio(<font color="red">*</font>)</label>
                                <input type="text" class="form-control valid validText" id="estudio" name="estudio" placeholder="Ingresa tu estudio" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="profesion">Profesión(<font color="red">*</font>)</label>
                                <input type="text" class="form-control valid validText" id="profesion" name="profesion" placeholder="Ingresa tu profesión" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="anio_inicio">Año de Inicio(<font color="red">*</font>)</label>
                                <input type="date" class="form-control" id="anio_inicio" name="anio_inicio" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="anio_final">Año de Finalización(<font color="red">*</font>)</label>
                                <input type="date" class="form-control" id="anio_final" name="anio_final" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de Nacimiento(<font color="red">*</font>)</label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ciudad">Ciudad(<font color="red">*</font>)</label>
                                <input type="text" class="form-control valis validText" id="ciudad" name="ciudad" placeholder="Ingresa tu ciudad" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="otros_estudios">Otros Estudios</label>
                        <div id="otros_estudios_container">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control valid validText" name="otros_estudios[]" placeholder="Otro estudio">
                                <div class="input-group-append">
                                    <button class="btn btn-success add-more-estudio" type="button"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="idiomas">Idiomas</label>
                        <div id="idiomas_container">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control valid validText" name="idiomas[]" placeholder="Ingresa un idioma">
                                <div class="input-group-append">
                                    <button class="btn btn-success add-more-idioma" type="button"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="curriculum">Curriculum debe tener un tamaño máximo de 4M(<font color="red">*</font>)</label>
                        <input type="file" class="form-control" id="curriculum" name="curriculum" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
                <div id="descripcionOferta" class="mt-4" style="display:none;">
                    <h5>Descripción de la Oferta</h5>
                    <p id="descripcionTexto"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('.apply-btn').on('click', function() {
            $('#vacante_id').val($(this).data('id'));
            $('#applyModalLabel').text(`Aplicar a la Vacante:  ${$(this).data('nombre')} en ${$(this).data('empresa')}`);
            $('#descripcionTexto').html($(this).data('descripcion'));
            $('#descripcionOferta').show();
        });

        $('#applyForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            let base_url = "http://localhost/planear_volar/public/";

            $.ajax({
                url: base_url + 'trabajos/apply',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        swal({
                            title: "Aplicado",
                            text: response.message,
                            icon: "success",
                            button: "OK",
                        });
                        $('#applyModal').modal('hide');
                        document.querySelector('#applyForm').reset();

                    } else {
                        swal({
                            title: "Errot al aplicar",
                            text: response.message || 'Error al enviar la solicitud.',
                            icon: "info",
                            button: "OK",
                        });
                        document.querySelector('#applyForm').reset();

                    }
                },
                error: function() {
                    swal({
                        title: "Error al aplicar",
                        text: 'Error al enviar la solicitud.',
                        icon: "info",
                        button: "OK",
                    });
                }
            });
        });

        // Añadir más campos de "Otros Estudios"
        $(document).on('click', '.add-more-estudio', function() {
            var html = '<div class="input-group mb-3">' +
                '<input type="text" class="form-control" name="otros_estudios[]" placeholder="Otro estudio">' +
                '<div class="input-group-append">' +
                '<button class="btn btn-danger remove-estudio" type="button"><i class="fas fa-minus"></i></button>' +
                '</div>' +
                '</div>';
            $('#otros_estudios_container').append(html);
        });

        // Eliminar campos de "Otros Estudios"
        $(document).on('click', '.remove-estudio', function() {
            $(this).closest('.input-group').remove();
        });

        // Añadir más campos de "Idiomas"
        $(document).on('click', '.add-more-idioma', function() {
            var html = '<div class="input-group mb-3">' +
                '<input type="text" class="form-control" name="idiomas[]" placeholder="Ingresa un idioma">' +
                '<div class="input-group-append">' +
                '<button class="btn btn-danger remove-idioma" type="button"><i class="fas fa-minus"></i></button>' +
                '</div>' +
                '</div>';
            $('#idiomas_container').append(html);
        });

        // Eliminar campos de "Idiomas"
        $(document).on('click', '.remove-idioma', function() {
            $(this).closest('.input-group').remove();
        });
    });
</script>