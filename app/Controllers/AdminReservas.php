<?php

namespace App\Controllers;

use App\Models\ReservaModel;
use App\Models\DetallespermisosModel;
use App\Models\DestinoModel;

class AdminReservas extends BaseController
{
    protected $reservaModel, $permisos, $destinoModel;

    public function __construct()
    {
        $this->reservaModel = new ReservaModel();
        $this->permisos = new DetallespermisosModel();
        $this->destinoModel = new DestinoModel();

    }
    //   reservas
   
    public function reservasView()
    {
        $session = session();
        $userId = $session->get('idUsuario'); // Obtener el ID del usuario desde la sesión

        // Obtener permisos del usuario
        $permissions = $this->permisos->where('id_usuarios', $userId)->findAll();
        $data['permissions'] = array_column($permissions, 'id_permisos');

        if (in_array(11, $data['permissions'])) {
            // Obtener las reservas con los nombres de destino
            $reservas = $this->reservaModel->getReservasWithDestino();
            $data['reservas'] = $reservas;

            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/reservas/reservas', $data);
            echo view('layout/admin/footer');
        } else {
            echo view('layout/usuario/no_permisos');
        }
    }
    
    // actualizar estado de reserva
    public function update()
    {
        $request = $this->request->getPost();

        // Aquí puedes realizar la validación de los datos si es necesario
        $result = $this->reservaModel->update($request['id'], ['estado' => $request['estado']]);

        if ($result) {
            $response = [
                'success' => true,
                'message' => 'Estado de reserva actualizado correctamente.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Error al actualizar el estado de la reserva.'
            ];
        }
        return $this->response->setJSON($response);
    }
}
