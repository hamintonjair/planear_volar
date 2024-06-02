<?php
namespace App\Controllers;

use App\Models\MensajeModel;
use \App\Models\DetallespermisosModel;

class AdminMensajes extends BaseController
{
    protected $mensajeModel,$permisos;

    public function __construct()
    {
        $this->mensajeModel = new MensajeModel();
        $this->permisos = new DetallespermisosModel();

    }

    public function messages()
    {
   

        $session = session();
        $userId = $session->get('idUsuario'); // Obtener el ID del usuario desde la sesión

        $permissions = $this->permisos->where('id_usuarios', $userId)->findAll();

        $data['permissions'] = array_column($permissions, 'id_permisos');

        if (in_array(8, $data['permissions'])) {
            $data['mensajes'] = $this->mensajeModel->findAll();

            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/empresa/mensajes/mensajes',$data);
            echo view('layout/admin/footer');
        } else {
            echo view('layout/usuario/no_permisos');
        }
    }
    public function updateEstado()
    {
        $request = $this->request->getPost();

         // Actualizar el estado
         $result = $this->mensajeModel->update($request['id'], ['estado' => $request['estado']]);

        if ($result) {
            $response = [
                'success' => true,
                'message' => 'Estado de mensaje actualizado correctamente.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Error al actualizar el estado del mensaje.'
            ];
        }
        return $this->response->setJSON($response);
    }
}
