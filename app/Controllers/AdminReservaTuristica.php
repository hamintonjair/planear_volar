<?php

namespace App\Controllers;

use App\Models\ReservaTuristicaModel;
use App\Models\ClientesModel;
use App\Models\PaqueteModel;
use App\Models\DetallespermisosModel;
use App\Models\GuiaModel;
use Dompdf\Dompdf;

class AdminReservaTuristica extends BaseController
{
    protected $reservarModel, $facturaModel, $clienteModel, $paqueteModel, $guiaModel, $permisos;

    public function __construct()
    {
        $this->reservarModel = new ReservaTuristicaModel();
        $this->clienteModel = new ClientesModel();
        $this->paqueteModel = new PaqueteModel();
        $this->guiaModel = new GuiaModel();
        $this->permisos = new DetallespermisosModel();
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
        $data = [
            'cliente_id' => $this->request->getPost('cliente_id'),
            'paquete_id' => $this->request->getPost('paquete_id'),
            'guia_id' => $this->request->getPost('guia_id'),
            'fecha_reserva' => $this->request->getPost('fecha_reserva'),
            'costo' => $this->request->getPost('costo'),
            'estado' => 'Reservado'
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
    // generar factura
    public function generarFactura($reservaId)
    {

        $reserva = $this->reservarModel->find($reservaId);
        $reserva['cliente'] = $this->clienteModel->find($reserva['cliente_id']);
        $reserva['paquete'] = $this->paqueteModel->find($reserva['paquete_id']);
        if (!empty($reserva['guia_id'])) {
            $reserva['guia'] = $this->guiaModel->find($reserva['guia_id']);
        } else {
            $reserva['guia_nombre'] = 'Sin Guía';
        }

        $html = view('layout/reservas/reservar/factura', ['reserva' => $reserva]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream('factura_reserva_' . $reservaId . '.pdf', array("Attachment" => 0));
    }
}
