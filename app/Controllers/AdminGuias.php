<?php

namespace App\Controllers;
use App\Models\GuiaModel;
use App\Models\DetallespermisosModel;

class AdminGuias extends BaseController
{
    protected $guiaModel,$permisos;

    public function __construct()
    {
        $this->guiaModel = new GuiaModel();
        $this->permisos = new DetallespermisosModel();

    }
    public function guides()
    {
        $session = session();
        $userId = $session->get('idUsuario'); // Obtener el ID del usuario desde la sesión

        $permissions = $this->permisos->where('id_usuarios', $userId)->findAll();

        $data['permissions'] = array_column($permissions, 'id_permisos');
        if (in_array(7, $data['permissions'])) {
            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/guia/guia');
            echo view('layout/admin/footer');
        } else {
            echo view('layout/usuario/no_permisos');
        }
        
    }

    public function listar()
    {
        $guias = $this->guiaModel->where('estado', 1)->findAll();
    
        foreach ($guias as &$item) {
            $item['estado'] = $item['estado'] == 1 ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>';
            $session = session();
            if ($session->get('rol') == 'Administrador') {
                $item['accion'] = '<button class="btn btn-danger btn-sm eliminar" onclick="eliminarGuia(' . $item['id'] . ')"><i class="fas fa-trash-alt"></i></button> ';
                $item['accion'] .= '<button class="btn btn-primary btn-sm editar" onclick="editarGuia(' . $item['id'] . ')"><i class="fas fa-edit"></i></button>';
            } else {
                $item['accion'] = '<button class="btn btn-danger btn-sm eliminar" onclick="eliminarGuia(' . $item['id'] . ')" disabled><i class="fas fa-trash-alt"></i></button> ';
                $item['accion'] .= '<button class="btn btn-primary btn-sm editar" onclick="editarGuia(' . $item['id'] . ')"><i class="fas fa-edit"></i></button>';
            }
            if ($item['foto']) {
                $item['foto'] = '<img src="' . base_url('uploads/' . $item['foto']) . '" class="img-thumbnail" style="width: 100px; height: 100px;">';
            }
        }
    
        echo json_encode($guias, JSON_UNESCAPED_UNICODE);
    }

    public function registrar()
    {
        $data = $this->request->getPost();
        if ($this->request->getFile('foto')->isValid()) {
            $file = $this->request->getFile('foto');
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newName);
            $data['foto'] = $newName;
        }

        $result = $this->guiaModel->save($data);
        $message = $result ? 'Guía registrado correctamente.' : 'Error al registrar el guía.';
        $response = [
            'ok' => $result,
            'message' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }

    public function obtener($id)
    {
        $guia = $this->guiaModel->find($id);
        if ($guia) {
            return $this->response->setJSON(['ok' => true, 'data' => $guia]);
        } else {
            return $this->response->setJSON(['ok' => false, 'message' => 'Guía no encontrado.']);
        }
        // $data = $this->guiaModel->find($id);
        // echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function actualizar()
    {
        $data = $this->request->getPost();
        $id = $data['idGuias'];

        if ($this->request->getFile('foto')->isValid()) {
            $file = $this->request->getFile('foto');
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newName);
            $data['foto'] = $newName;

            $guia = $this->guiaModel->find($id);
            if ($guia['foto'] && file_exists(FCPATH . 'uploads/' . $guia['foto'])) {
                unlink(FCPATH . 'uploads/' . $guia['foto']);
            }
        }

        $result = $this->guiaModel->update($id, $data);
        $message = $result ? 'Guía actualizado correctamente.' : 'Error al actualizar el guía.';
        $response = [
            'ok' => $result,
            'message' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }

    public function eliminar($id)
    {
        $guia = $this->guiaModel->find($id);
        if ($guia['foto'] && file_exists(FCPATH . 'uploads/' . $guia['foto'])) {
            unlink(FCPATH . 'uploads/' . $guia['foto']);
        }
        $result = $this->guiaModel->delete($id);
        $message = $result ? 'Guía eliminado correctamente.' : 'Error al eliminar el guía.';
        $response = [
            'ok' => $result,
            'message' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }
}
