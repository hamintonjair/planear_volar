<?php

namespace App\Controllers;

use App\Models\ReservaTuristicaModel;
use App\Models\ClientesModel;
use App\Models\PaqueteModel;
use App\Models\DetallespermisosModel;
use App\Models\GuiaModel;
use Dompdf\Dompdf;
use App\Models\ConfiguracionModel;


class AdminReservaTuristica extends BaseController
{
    protected $reservarModel, $empresa, $facturaModel, $clienteModel, $paqueteModel, $guiaModel, $permisos;

    public function __construct()
    {
        $this->reservarModel = new ReservaTuristicaModel();
        $this->clienteModel = new ClientesModel();
        $this->paqueteModel = new PaqueteModel();
        $this->guiaModel = new GuiaModel();
        $this->permisos = new DetallespermisosModel();
        $this->empresa = new ConfiguracionModel();
    }
    // vista reservar
    public function viewReservar()
    {
        // $data['reservas'] = $this->reservaModel->findAll();
        $data['reservas'] = $this->reservarModel->findAll();
        $data['clientes'] = $this->clienteModel->findAll();
        $data['paquetes'] = $this->paqueteModel->findAll();
        $data['guias'] = $this->guiaModel->findAll();

        $session = session();
        $userId = $session->get('idUsuario'); // Obtener el ID del usuario desde la sesión

        $permissions = $this->permisos->where('id_usuarios', $userId)->findAll();

        $data['permissions'] = array_column($permissions, 'id_permisos');
        if (in_array(5, $data['permissions'])) {
            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/reservas/reservar/reservar', $data);
            echo view('layout/admin/footer');
        } else {
            echo view('layout/usuario/no_permisos');
        }
    }

    // listar
    public function listar()
    {

        $reservas = $this->reservarModel->findAll();

        foreach ($reservas as &$reserva) {
            $reserva['cliente_nombre'] = $this->clienteModel->find($reserva['cliente_id'])['nombre'];
            $reserva['paquete_nombre'] = $this->paqueteModel->find($reserva['paquete_id'])['nombre_paquete'];
            if (!empty($reserva['guia_id'])) {
                $reserva['guia_nombre'] = $this->guiaModel->find($reserva['guia_id'])['nombre'];
            } else {
                $reserva['guia_nombre'] = 'Sin Guía';
            }
        }

        // return view('reservas/index', ['reservas' => $reservas]);

        $session = session();
        $userId = $session->get('idUsuario'); // Obtener el ID del usuario desde la sesión

        $permissions = $this->permisos->where('id_usuarios', $userId)->findAll();

        $data['permissions'] = array_column($permissions, 'id_permisos');
        if (in_array(5, $data['permissions'])) {
            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/reservas/reservar/listar', ['reservas' => $reservas]);
            echo view('layout/admin/footer');
        } else {
            echo view('layout/usuario/no_permisos');
        }
    }
    // reservar
    public function crear()
    {
        $data['clientes'] = $this->clienteModel->findAll();
        $data['paquetes'] = $this->paqueteModel->findAll();
        $data['guias'] = $this->guiaModel->findAll();

        echo view('reservas/listar', $data);
    }
    // ventas de las reservan
    public function store()
    {
        if ($this->request->getPost('tipo_pago') == 'contado') {
            $costo = $this->request->getPost('valor');
            $abono = $this->request->getPost('valor');
        } else {
            $abono = $this->request->getPost('abono');
            $costo = $this->request->getPost('valor');
        }
        $data = [
            'cliente_id' => $this->request->getPost('cliente_id'),
            'paquete_id' => $this->request->getPost('paquete_id'),
            'guia_id' => $this->request->getPost('guia_id'),
            'fecha_reserva' => $this->request->getPost('fecha_reserva'),
            'costo' => $costo,
            'estado' => 'Reservado',
            'abono' => $abono,
        ];

        $this->reservarModel->insert($data);

        return $this->response->setJSON(['success' => true]);
    }
    // actualizar estado concactado
    public function actualizarEstado()
    {
        $id = $this->request->getPost('id');
        $estado = $this->request->getPost('estado');

        $this->reservarModel->update($id, ['estado' => $estado]);

        return $this->response->setJSON(['success' => true, 'message' => 'Estado actualizado correctamente.']);
    }
    // anular venta
    public function anular($id)
    {
        $this->reservarModel->update($id, ['estado' => 'Anulada']);
        return redirect()->to(base_url('reservas/hotel'));
    }
    // restaurar
    public function restaurar($id)
    {
        $this->reservarModel->update($id, ['estado' => 'Reservado']);
        return redirect()->to(base_url('reservas/hotel'));
    }
    // abonar
    public function abonar()
    {
        $reserva_id = $this->request->getPost('reserva_id');
        $abono = $this->request->getPost('abono');

        // Obtener la reserva actual
        $reserva = $this->reservarModel->find($reserva_id);

        // Validar si el abono es mayor a la deuda actual
        if ($abono > ($reserva['costo'] - $reserva['abono'])) {
            // Retornar un error si el abono es mayor que la deuda
            return $this->response->setJSON(['error' => 'El abono no puede ser mayor a la deuda.']);
        }
        // Calcular el nuevo abono
        $nuevo_abono = $reserva['abono'] + $abono;

        // Actualizar la reserva en la base de datos
        $this->reservarModel->update($reserva_id, ['abono' => $nuevo_abono]);
        // Responder con éxito
        return $this->response->setJSON(['success' => 'Abono registrado correctamente.']);
    }


    // generar factura
    public function generarFactura($reservaId)
    {
        // Cargar la reserva y sus datos
        $reserva = $this->reservarModel->find($reservaId);
        $reserva['empresa'] = $this->empresa->find();
        $reserva['cliente'] = $this->clienteModel->find($reserva['cliente_id']);
        $reserva['paquete'] = $this->paqueteModel->find($reserva['paquete_id']);
        $reserva['state'] =  $reserva['estado'];

        if (!empty($reserva['guia_id'])) {
            $reserva['guia'] = $this->guiaModel->find($reserva['guia_id']);
        } else {
            $reserva['guia_nombre'] = 'Sin Guía';
        }

        // Cargar la vista para el HTML de la factura
        $html = view('layout/reservas/reservar/factura', ['reserva' => $reserva]);

        // Crear una instancia de Dompdf
        $dompdf = new Dompdf();
        // Habilitar imágenes remotas
        $options = $dompdf->getOptions();
        $options->set('isRemoteEnabled', true);
        $dompdf->setOptions($options);

        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Enviar el PDF generado al navegador
        $dompdf->stream('factura_reserva_' . $reservaId . '.pdf', array("Attachment" => 0));
    }
}
