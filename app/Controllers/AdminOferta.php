<?php

namespace App\Controllers;

use App\Models\OfertaModel;
use \App\Models\DetallespermisosModel;

class AdminOferta extends BaseController
{

    protected $oferta_model, $permisos;
    public function __construct()
    {

        $this->oferta_model = new OfertaModel();
        $this->permisos = new DetallespermisosModel();
    }
    // vista
    public function oferta()
    {
        $session = session();
        $userId = $session->get('idUsuario'); // Obtener el ID del usuario desde la sesión

        $permissions = $this->permisos->where('id_usuarios', $userId)->findAll();

        $data['permissions'] = array_column($permissions, 'id_permisos');
        if (in_array(9, $data['permissions'])) {
            $oferta['ofertas'] = $this->oferta_model->findAll();
            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/oferta/oferta', $oferta);
            echo view('layout/admin/footer');
        } else {
            echo view('layout/usuario/no_permisos');
        }
    }

    // agregar
    public function addOferta()
    {
        $data = array(
            'nombre' => $this->request->getPost('nombre'),
            'descuento' => $this->request->getPost('descuento'),
            'dirigido' => $this->request->getPost('dirigido'),
            'descripcion' => $this->request->getPost('descripcion'),
        );
        $result = $this->oferta_model->insert($data);
        $message = $result ? 'Oferta registrado correctamente.' : 'Error al registrar la oferta.';
        $response = [
            'ok' => $result,
            'message' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }
    // eliminar
    public function deleteOferta($id)
    {
        $result = $this->oferta_model->delete($id);
        $message = $result ? 'Oferta eliminado correctamente.' : 'Error al eliminar la oferta.';
        $response = [
            'ok' => $result,
            'message' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }
    // actualizar oferta
    public function updateEstado()
    {
        $request = $this->request->getPost();

        // Actualizar el estado
        $result = $this->oferta_model->update($request['id'], ['estado' => $request['estado']]);

        if ($result) {
            $response = [
                'success' => true,
                'message' => 'Estado de la oferta actualizado correctamente.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Error al actualizar el estado de la oferta.'
            ];
        }
        return $this->response->setJSON($response);
    }
}
