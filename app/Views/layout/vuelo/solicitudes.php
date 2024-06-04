<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="background-color: #25142d; height: 100px;">
            <div class="content-container">
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
                        <th class="text-center">Desde</th>
                        <th class="text-center">Fecha de ida</th>
                        <th class="text-center">Hacia</th>
                        <th class="text-center">Fecha de regreso</th>
                        <th class="text-center">Pasajeros</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($solicitudes as $s) : ?>
                        <tr>
                            <td class="text-center"><?= $s['id'] ?></td>
                            <td><?= $s['nombre'] ?> <?= $s['apellido'] ?></td>
                            <td><?= $s['cedula'] ?></td>
                            <td class="text-center"><?= $s['telefono'] ?></td>
                            <td class="text-center"><?= $s['correo'] ?></td>
                            <td class="text-center"><?= $s['desde'] ?></td>
                            <td class="text-center"><?= $s['fecha_ida'] ?></td>
                            <td class="text-center"><?= $s['hacia'] ?></td>
                            <td class="text-center"><?= $s['fecha_regreso'] ?></td>
                            <td class="text-center"><?= $s['cantidad_pasajeros'] ?></td>
                            <td class="text-center <?= $s['estado'] == 'Contactar' ? 'estado-contactar' : ($s['estado'] == 'Contactado' ? 'estado-contactado' : '') ?>">
                                <?= esc($s['estado']) ?>
                            </td>
                            <td class="text-center estado-icon">
                                <?php if ($s['estado'] == 'Contactar') : ?>
                                    <i class="fas fa-times text-danger" data-id="<?= $s['id'] ?>" data-estado="Contactar" onclick="updateEstadoSolicitud(<?= $s['id'] ?>, 'Contactado')" style="cursor: pointer;"></i>
                                <?php else : ?>
                                    <i class="fas fa-check text-success" data-id="<?= $s['id'] ?>" data-estado="Contactado" disabled></i>
                                <?php endif; ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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
    $(document).ready(function() {
    $("#tableSolicitud").DataTable({
        dom: "lBfrtip",
        responsive: true,
        bDestroy: true,
        iDisplayLength: 10,
        order: [[0, "desc"]],
    });
});
// actualizar el estado de los mensajes
function updateEstadoSolicitud(id, estado) {
    let base_url = "http://localhost/planear_volar/public/";

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


