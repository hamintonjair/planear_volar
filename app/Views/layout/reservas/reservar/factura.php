<!DOCTYPE html>
<html>
|<head>
    <title>Factura</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        .invoice-box table tr td.tede {
            text-align: left
        }
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td {
            background: #333;
            color: #fff;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
        .logo {
            width: 200px;
            height: auto;
            border-radius: 10px;
        }

    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                         
                            <td>
                                Fecha: <?= date('Y-m-d'); ?><br>
                                Reserva ID: <?= $reserva['id']; ?><br>
                            </td>
                            <td class="title">
                              <img src="<?php echo base_url() . 'assets/img/logo.png'; ?>" class="logo">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="tede">
                            <strong>Datos de la empresa</strong><br>
                                <strong>Empresa:</strong> <?= $reserva['empresa'][0]['nombre_empresa']; ?><br>
                                <strong>Ciudad:</strong> <?= $reserva['empresa'][0]['ciudad']?><br>
                                <strong>Dirección:</strong> <?= $reserva['empresa'][0]['direccion']; ?><br>
                                <strong>Nit:</strong> <?= $reserva['empresa'][0]['nit']; ?><br>
                                <strong>Teléfono:</strong> <?= $reserva['empresa'][0]['telefono'];?><br>
                                <strong>Email:</strong> <?= $reserva['empresa'][0]['correo']; ?><br>
                            </td>

                            <td class="tede">
                                <strong>Datos del Cliente</strong><br>
                                <strong>Nombre:</strong> <?= $reserva['cliente']['nombre'] . ' ' . $reserva['cliente']['apellidos']; ?><br>
                                <strong>Dirección:</strong> <?= $reserva['cliente']['direccion']; ?><br>
                                <strong>Teléfono:</strong> <?= $reserva['cliente']['telefono']; ?><br>
                                <strong>Email:</strong> <?= $reserva['cliente']['correo']; ?><br><br>
                              
                                <strong>Reserva:</strong> <strong><?= strtoupper($reserva['state']) ?><br></strong>


                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Descripción</td>
                <td>Detalles</td>
            </tr>

            <tr class="item">
                <td>Paquete</td>
                <td><?= $reserva['paquete']['nombre_paquete']; ?></td>
            </tr>

            <tr class="item">
                <td>Guía</td>
                <?php if(!empty($reserva['guia'])){; ?>
                    <td><?= $reserva['guia']['nombre']; ?></td>
                <?php }else{ ?>
                    <td><?= $reserva['guia_nombre']; ?></td>
                <?php }; ?>
            </tr>

            <tr class="item last">
                <td>Fecha de Reserva</td>
                <td><?= $reserva['fecha_reserva']; ?></td>
            </tr>

            <tr class="total">
                <td>Costo del Paquete:</td>
                <td> $<?= number_format($reserva['costo'], 2); ?></td>
            </tr>
            <tr class="total">
                <td>Valor Pago:</td>
                <td> $<?= number_format($reserva['abono'], 2); ?></td>
            </tr>
            <tr class="total">
                <td></td>
                <td>Deuda: $<?= number_format($reserva['costo'] - $reserva['abono'], 2); ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
