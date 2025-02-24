<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: auto;">
            <div class="content-container py-3">
                <h1 style="color: white;">Solicitudes de vuelos</h1>
                <h6 style="color: white;">Administración de las solicitudes</h6>
            </div>
        </div>
        <br><br>
        <div class="container-fluid px-4 dataTable-container">
            <table id="tableSolicitudes" class="table table-striped table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nombre y apellidos</th>
                        <th class="text-center">Cédula</th>
                        <th class="text-center">Teléfono</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($solicitudes as $s) : ?>
                    <tr>
                        <td class="text-center"><?= $s['id'] ?></td>
                        <td><?= $s['nombre'] ?> <?= $s['apellido'] ?></td>
                        <td><?= $s['cedula'] ?><?= $s['apellido'] ?></td>
                        <td class="text-center"><?= $s['telefono'] ?></td>
                        <td class="text-center"><?= $s['correo'] ?></td>

                        <td
                            class="text-center <?= $s['estado'] == 'Contactar' ? 'estado-contactar' : ($s['estado'] == 'Contactado' ? 'estado-contactado' : '') ?>">
                            <?= esc($s['estado']) ?>
                        </td>
                        <td class="text-center estado-icon">
                            <?php if ($s['estado'] == 'Contactar') : ?>
                            <button class="btn btn-primary" onclick="openDetailsModal(<?= $s['id'] ?>)"> <i
                                    class="fas fa-info-circle"></i></button>
                            <i class="fas fa-times text-danger" data-id="<?= $s['id'] ?>" data-estado="Contactar"
                                onclick="updateEstadoSolicitud(<?= $s['id'] ?>, 'Contactado')"
                                style="cursor: pointer;"></i>
                            <?php else : ?>
                            <button class="btn btn-primary" onclick="openDetailsModal(<?= $s['id'] ?>)"> <i
                                    class="fas fa-info-circle"></i></button>
                            <i class="fas fa-check text-success" data-id="<?= $s['id'] ?>" data-estado="Contactado"
                                disabled></i>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    <!-- Modal -->
    <!-- Modal para mostrar detalles -->
    <div id="detailsModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class='modal-header headerRegister' style="background-color: #25142d; color:white">
                    <h5 class='modal-title' id='titleModal'>Detalles de la Solicitud</h5>
                    <button type='button' class='close' data-bs-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;
                        </span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body-content">
                    <!-- Aquí se mostrará el contenido dinámico -->
                </div>
                <div class="modal-footer">
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                </div>
            </div>
        </div>
    </div>


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
.estado-contactar {
    background-color: yellow;
    color: black;
}

.estado-contactado {
    background-color: red;
    color: black;
}
</style>

<script>
function openDetailsModal(id) {
    let base_url = "<?= base_url() ?>";

    $.ajax({
        url: base_url + 'vuelos/getSolicitudDetails/' + id,
        type: 'get',
        dataType: 'json',
        data: {
            id: id
        },
        success: function(response) {
            if (response.error) {
                swal("Error", response.error, "error");
                return;
            }

            // Construir el contenido HTML usando los datos recibidos
            let detailsHtml = `
                <p><strong>Desde:</strong> ${response.desde}</p>
                <p><strong>Fecha de ida:</strong> ${response.fecha_ida}</p>
                <p><strong>Hacia:</strong> ${response.hacia}</p>
                <p><strong>Fecha de regreso:</strong> ${response.fecha_regreso}</p>
                <p><strong>Pasajeros:</strong> ${response.cantidad_pasajeros}</p>
                <p><strong>Estado:</strong> ${response.estado}</p>
            `;

            // Insertar el contenido HTML en el modal
            document.getElementById('modal-body-content').innerHTML = detailsHtml;

            // Mostrar el modal
            $('#detailsModal').modal('show');
        },
        error: function() {
            swal("Error al cargar los detalles", "error");
        }
    });
}


// actualizar el estado de los mensajes
function updateEstadoSolicitud(id, estado) {
    let base_url = "<?= base_url() ?>";

    $.ajax({
        url: base_url + 'vuelos/solicitud_update',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id,
            estado: estado
        },
        success: function(response) {
            if (response.success) {
                // Cambiar el icono en la vista
                let iconElement = $(`i[data-id='${id}']`);
                if (estado === 'Contactado') {
                    iconElement.removeClass('fa-times text-danger').addClass('fa-check text-success');
                    iconElement.attr('onclick', ''); // Deshabilitar el clic
                    swal("Solicitud", response.message, "success");
                    location.reload();
                }
            } else {
                swal("Solicitud", response.message, "error");
            }
        },
        error: function() {
            swal("Error al actualizar el estado de la Solicitud", "error");
        }
    });
}
</script>

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