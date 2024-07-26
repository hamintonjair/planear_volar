<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase">Vuelos</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="<?php echo base_url(); ?>">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Vuelos</p>
            </div>
        </div>
    </div>
</div>
<style>
    .container-fluid.booking {
        background-color: #f7f7f7;
        padding: 20px 0;
    }
</style>
<!-- Header End -->

<!-- Booking Start -->
<div class="container-fluid booking" style="padding-top: 20px;">
    <div class="container">
        <div class="bg-light shadow" style="padding: 30px;">
            <div class="row align-items-center" style="min-height: 60px;">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3 mb-md-0">
                                <label for="desde" style="font-size: 12px;">Desde <font color="red">*</font></label>
                                <select class="custom-select px-4" id="desde" style="height: 47px;">
                                    <option selected>Selecciona ciudad</option>
                                    <option value="armenia">Armenia</option>
                                    <option value="barranquilla">Barranquilla</option>
                                    <option value="bogota">Bogotá</option>
                                    <option value="bucaramanga">Bucaramanga</option>
                                    <option value="cali">Cali</option>
                                    <option value="cartagena">Cartagena</option>
                                    <option value="cucuta">Cúcuta</option>
                                    <option value="leticia">Leticia</option>
                                    <option value="manizales">Manizales</option>
                                    <option value="medellin">Medellín</option>
                                    <option value="monteria">Montería</option>
                                    <option value="neiva">Neiva</option>
                                    <option value="nuqui">Nuquí</option>
                                    <option value="pasto">Pasto</option>
                                    <option value="pereira">Pereira</option>
                                    <option value="quibdo">Quibdó</option>
                                    <option value="santamarta">Santa Marta</option>
                                    <option value="villavicencio">Villavicencio</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3 mb-md-0">
                                <label for="fecha_ida" style="font-size: 12px;">Fecha de ida <font color="red">*</font></label>
                                <input type="text" class="form-control p-4" id="fecha_ida" placeholder="Fecha de ida" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3 mb-md-0">
                                <label for="fecha_regreso" style="font-size: 12px;">Fecha de regreso <font color="red">*</font></label>
                                <input type="text" class="form-control p-4" id="fecha_regreso" placeholder="Fecha de regreso" />
                            </div>
                        </div>
                        <div class="col-md-2">
    <div class="mb-3 mb-md-0">
        <label for="cantidad_pasajeros" style="font-size: 12px;">Cuantos <font color="red">*</font></label>
        <input type="number" class="form-control p-4" id="cantidad_pasajeros" placeholder="Cantidad de pasajeros" min="0" oninput="validarNumero(this)"/>
        <div id="mensaje_error" style="color: red; display: none;">Por favor, ingresa un número positivo.</div>
    </div>
</div>


<script>
function validarNumero(input) {
    const mensajeError = document.getElementById('mensaje_error');
    if (input.value < 0) {
        mensajeError.style.display = 'block';
    } else {
        mensajeError.style.display = 'none';
    }
}
</script>

                        <div class="col-md-3">
                            <div class="mb-3 mb-md-0">
                                <label for="hacia" style="font-size: 12px;">Hacía <font color="red">*</font></label>
                                <select class="custom-select px-4" id="hacia" style="height: 47px;">
                                    <option selected>Selecciona ciudad</option>
                                    <option value="armenia">Armenia</option>
                                    <option value="barranquilla">Barranquilla</option>
                                    <option value="bogota">Bogotá</option>
                                    <option value="bucaramanga">Bucaramanga</option>
                                    <option value="cali">Cali</option>
                                    <option value="cartagena">Cartagena</option>
                                    <option value="cucuta">Cúcuta</option>
                                    <option value="leticia">Leticia</option>
                                    <option value="manizales">Manizales</option>
                                    <option value="medellin">Medellín</option>
                                    <option value="monteria">Montería</option>
                                    <option value="neiva">Neiva</option>
                                    <option value="nuqui">Nuquí</option>
                                    <option value="pasto">Pasto</option>
                                    <option value="pereira">Pereira</option>
                                    <option value="quibdo">Quibdó</option>
                                    <option value="santamarta">Santa Marta</option>
                                    <option value="villavicencio">Villavicencio</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-success btn-block" id="submit-btn" type="button" style="height: 47px; margin-top: -2px;" disabled>Continuar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Booking End -->



<!-- Modal Formulario Datos Personales -->
<div class="modal fade" id="personalDataModal" tabindex="-1" role="dialog" aria-labelledby="personalDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #25142d; color:white">
                <h5 class="modal-title" id="personalDataModalLabel">Datos Personales</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">Todos los campos con (<font color="red">*</font>) son obligatorios.</label>

                <form id="personalDataForm">
                    <div class="form-group">
                        <label for="nombre">Nombre(<font color="red">*</font>)</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido(<font color="red">*</font>)</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="cedula">Cédula(<font color="red">*</font>)</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo(<font color="red">*</font>)</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono(<font color="red">*</font>)</label>
                        <input type="number" class="form-control valid validNumber" id="telefono" name="telefono" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#fecha_ida", {
            minDate: "today",
            dateFormat: "Y-m-d",
            onChange: function(selectedDates, dateStr, instance) {
                flatpickr("#fecha_regreso", {
                    minDate: dateStr,
                    dateFormat: "Y-m-d"
                });
            }
        });

        flatpickr("#fecha_regreso", {
            minDate: "today",
            dateFormat: "Y-m-d"
        });

        $('#submit-btn').click(function() {
            $('#personalDataModal').modal('show');
        });

      
        $('#personalDataForm').submit(function(e) {
            e.preventDefault();

            var formData = {
                desde: $('#desde').val(),
                fecha_ida: $('#fecha_ida').val(),
                fecha_regreso: $('#fecha_regreso').val(),
                cantidad_pasajeros: $('#cantidad_pasajeros').val(),
                hacia: $('#hacia').val(),
                nombre: $('#nombre').val(),
                apellido: $('#apellido').val(),
                cedula: $('#cedula').val(),
                correo: $('#correo').val(),
                telefono: $('#telefono').val()
            };
            let base_url = 'http://localhost/planear_volar/';

            $.ajax({
                url: base_url + 'vuelos/reservar',
                type: 'POST',
                data: formData,
                success: function(response) {
                    swal({
                        title: "Success",
                        text: "Datos enviados correctamente",
                        icon: "success",
                        button: "OK",
                    });
                    document.querySelector('#personalDataForm').reset();
                    $('#personalDataModal').modal('hide');
                    location.reload();

                },
                error: function(error) {
                    swal({
                        title: "Error",
                        text: "Error al enviar los datos",
                        icon: "error",
                        button: "OK",
                    });
                }
            });
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener referencias a los campos de entrada y al botón
        var desdeSelect = document.getElementById("desde");
        var fechaIdaInput = document.getElementById("fecha_ida");
        var fechaRegresoInput = document.getElementById("fecha_regreso");
        var cantidadPasajerosInput = document.getElementById("cantidad_pasajeros");
        var haciaSelect = document.getElementById("hacia");
        var submitBtn = document.getElementById("submit-btn");

        // Función para verificar si todos los campos tienen un valor seleccionado
        function checkFields() {
            if (desdeSelect.value !== "Selecciona ciudad" &&
                fechaIdaInput.value !== "" &&
                fechaRegresoInput.value !== "" &&
                cantidadPasajerosInput.value !== "" &&
                haciaSelect.value !== "Selecciona ciudad") {
                submitBtn.disabled = false; // Habilitar el botón
            } else {
                submitBtn.disabled = true; // Deshabilitar el botón
            }
        }

        // Agregar event listeners para los cambios en los campos de entrada
        desdeSelect.addEventListener("change", checkFields);
        fechaIdaInput.addEventListener("change", checkFields);
        fechaRegresoInput.addEventListener("change", checkFields);
        cantidadPasajerosInput.addEventListener("input", checkFields);
        haciaSelect.addEventListener("change", checkFields);
    });

</script>
</body>

<!-- Vuelos Disponibles Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Vuelos</h6>
            <h1>Vuelos Disponibles</h1>
        </div>
        <div class="row">
            <?php if (empty($vuelo)) { ?>
                <div class="col-12 d-flex justify-content-center">
                    <h3 style="text-align: center;">No hay vuelos disponibles en estos momentos.</h3>
                </div>
            <?php } else { ?>
                <?php foreach ($vuelo as $vuel) : ?>

                    <head>
                        <style>
                            .custom-card {
                                background-color: rgb(112, 58, 128);
                                color: white;
                            }
                        </style>
                    </head>

                    <body>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="service-item custom-card text-center mb-2 py-5 px-4">
                                <p class="m-0"><strong>Origen:</strong> <?= esc($vuel['origen']) ?></p>
                                <p class="m-0"><strong>Destino:</strong> <?= esc($vuel['destino']) ?></p>
                                <p class="m-0"><strong>Fecha de Salida:</strong> <?= esc($vuel['fecha_salida']) ?></p>
                                <p class="m-0"><strong>Hora de Salida:</strong> <?= esc($vuel['hora_salida']) ?></p>
                                <p class="m-0"><strong>Duración:</strong> <?= esc($vuel['duracion']) ?></p>
                                <p class="m-0"><strong>Precio:</strong> $<?= esc($vuel['precio']) ?></p>
                            </div>
                        </div>
                    </body>

                <?php endforeach; ?>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Vuelos Disponibles End -->