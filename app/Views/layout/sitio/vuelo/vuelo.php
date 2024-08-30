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
                    <!-- Radio buttons -->
                    <div class="form-group mb-3">
                        <label>
                            <input type="radio" name="tipo_viaje" value="ida_regreso" checked onchange="toggleFields()"> Ida y Regreso
                        </label>
                        <label style="margin-left: 20px;">
                            <input type="radio" name="tipo_viaje" value="solo_ida" onchange="toggleFields()"> Solo Ida
                        </label>
                    </div>
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
                        <div class="col-md-2">
                            <div class="mb-3 mb-md-0">
                                <label for="fecha_ida" style="font-size: 12px;">Fecha de ida <font color="red">*</font></label>
                                <input type="text" class="form-control p-4" id="fecha_ida" placeholder="Fecha de ida" />
                            </div>
                        </div>
                        <div class="col-md-2" id="fecha_regreso_container">
                            <div class="mb-3 mb-md-0">
                                <label for="fecha_regreso" style="font-size: 12px;">Fecha de regreso <font color="red">*</font></label>
                                <input type="text" class="form-control p-4" id="fecha_regreso" placeholder="Fecha de regreso" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3 mb-md-0">
                                <label for="cantidad_pasajeros" style="font-size: 12px;">Personas <font color="red">*</font></label>
                                <input type="number" class="form-control p-4" id="cantidad_pasajeros" placeholder="Cantidad de pasajeros" min="1" oninput="validarNumero(this)" />
                                <div id="mensaje_error" style="color: red; display: none;">Por favor, ingresa un número positivo.</div>
                            </div>
                        </div>


                        <script>
                            function validarNumero(input) {
                                const mensajeError = document.getElementById('mensaje_error');
                                if (input.value < 1) {
                                    mensajeError.style.display = 'block';

                                } else {
                                    mensajeError.style.display = 'none';
                                }
                            }
                        </script>

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
<!-- Vuelos Disponibles Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="row">
            <?php if (empty($vuelo)) { ?>
                <div class="col-12 d-flex justify-content-center">
                    <h3 style="text-align: center;">No hay vuelos disponibles en estos momentos.</h3>
                </div>
            <?php } else { ?>
                <?php foreach ($vuelo as $vuel) : ?>
                    <div class="col-lg-12 col-md-6 mb-4">
                        <div class="service-item text-center mb-2 py-5 px-4">
                            <!-- Aquí asumimos que tienes una imagen asociada con cada vuelo -->
                            <img src="<?php echo base_url(); ?>uploads/<?php echo $vuel['nombre']; ?>" class="img-fluid">
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php } ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    function toggleFields() {
        const tipoViaje = document.querySelector('input[name="tipo_viaje"]:checked').value;
        const fechaRegresoContainer = document.getElementById('fecha_regreso_container');
        const fechaRegresoInput = document.getElementById('fecha_regreso');

        if (tipoViaje === "solo_ida") {
            fechaRegresoContainer.style.display = "none";
            fechaRegresoInput.removeAttribute('required');
            fechaRegresoInput.value = ""; // Limpiar el valor de regreso
        } else {
            fechaRegresoContainer.style.display = "block";
            fechaRegresoInput.setAttribute('required', 'required');
        }

        checkFields(); // Revalidar campos
    }

    function checkFields() {
        const tipoViaje = document.querySelector('input[name="tipo_viaje"]:checked').value;
        const desdeSelect = document.getElementById("desde");
        const fechaIdaInput = document.getElementById("fecha_ida");
        const fechaRegresoInput = document.getElementById("fecha_regreso");
        const cantidadPasajerosInput = document.getElementById("cantidad_pasajeros");
        const haciaSelect = document.getElementById("hacia");
        const submitBtn = document.getElementById("submit-btn");

        const todosCamposLlenos = desdeSelect.value !== "Selecciona ciudad" &&
            fechaIdaInput.value !== "" &&
            cantidadPasajerosInput.value !== "" &&
            haciaSelect.value !== "Selecciona ciudad";

        const esIdaYRegreso = tipoViaje === "ida_regreso" && fechaRegresoInput.value !== "";

        submitBtn.disabled = !(todosCamposLlenos && (tipoViaje === "solo_ida" || esIdaYRegreso));
    }

    document.addEventListener("DOMContentLoaded", function() {
        toggleFields(); // Para inicializar el estado según la selección predeterminada

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

        document.querySelectorAll('input[name="tipo_viaje"]').forEach(function(element) {
            element.addEventListener('change', toggleFields);
        });

        $('#submit-btn').click(function() {
            $('#personalDataModal').modal('show');
        });

        $('#personalDataForm').submit(function(e) {
            e.preventDefault();

            let formData = {
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
            // let base_url = 'https://maroon-echidna-102598.hostingersite.com/';

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

        // Agregar event listeners para los cambios en los campos de entrada
        document.getElementById("desde").addEventListener("change", checkFields);
        document.getElementById("fecha_ida").addEventListener("change", checkFields);
        document.getElementById("fecha_regreso").addEventListener("change", checkFields);
        document.getElementById("cantidad_pasajeros").addEventListener("input", checkFields);
        document.getElementById("hacia").addEventListener("change", checkFields);
    });
</script>



<!-- Vuelos Disponibles End -->