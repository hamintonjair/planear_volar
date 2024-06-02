<?php

namespace App\Controllers;
use App\Models\DetallespermisosModel;

use \App\Models\AcercaModel;

class AdminAcerca extends BaseController
{
    protected $acercaModel,$permisos;

    public function __construct()
    {
        $this->acercaModel = new AcercaModel();
        $this->permisos = new DetallespermisosModel();

    }
    public function about()
    {
        $session = session();
        $userId = $session->get('idUsuario'); // Obtener el ID del usuario desde la sesión

        $permissions = $this->permisos->where('id_usuarios', $userId)->findAll();

        $data['permissions'] = array_column($permissions, 'id_permisos');
        if (in_array(1, $data['permissions'])) {
            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/empresa/nosotros/acerca_de');
            echo view('layout/admin/footer');
        } else {
            echo view('layout/usuario/no_permisos');
        }
    }

    public function obtener()
    {
        $acerca = $this->acercaModel->first(); // Asumiendo que solo hay una fila de información

        if ($acerca) {
            return $this->response->setJSON(['ok' => true, 'data' => $acerca]);
        } else {
            return $this->response->setJSON(['ok' => false, 'message' => 'No se pudo obtener la información']);
        }
    }
    // insertar y actualizar
    public function actualizar()
    {
        $idacerca = $this->request->getPost('idacerca');
        $nombre = $this->request->getPost('nombre');
        $descripcion = $this->request->getPost('descripcion');

        $data = [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
        ];
        
        if ($this->request->getFile('imagen')->isValid()) {
            $file = $this->request->getFile('imagen');
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'public/uploads', $newName);
            $data['imagen'] = $newName;

            // Eliminar la imagen anterior si se está actualizando
            if ($idacerca) {
                $destino = $this->acercaModel->find($idacerca);
                if ($destino['imagen'] && file_exists(FCPATH . 'public/uploads/' . $destino['imagen'])) {
                    unlink(FCPATH . 'public/uploads/' . $destino['imagen']);
                }
            }
        }
        if ($idacerca) {
            $result = $this->acercaModel->update($idacerca, $data);
            $message = $result ? 'Información actualizado correctamente.' : 'Error al actualizar la información.';

        } else {
            $result =$this->acercaModel->insert($data);
            $message = $result ? 'Información insertada correctamente.' : 'Error al insertar la información.';
        }
        $response = [
            'ok' => $result,
            'post' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);

    }
}
