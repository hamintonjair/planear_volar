<?php

namespace App\Controllers;

use App\Models\TestimonioModel;
use App\Models\DetallespermisosModel;


class AdminTestimonios extends BaseController
{
    protected $testimonioModel, $permisos;

    public function __construct()
    {
        $this->testimonioModel = new TestimonioModel();
        $this->permisos = new DetallespermisosModel();
    }
    public function testimonials()
    {

        $session = session();
        $userId = $session->get('idUsuario'); // Obtener el ID del usuario desde la sesión

        $permissions = $this->permisos->where('id_usuarios', $userId)->findAll();

        $data['permissions'] = array_column($permissions, 'id_permisos');
        if (in_array(12, $data['permissions'])) {
            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/testimonio/testimonio');
            echo view('layout/admin/footer');
        } else {
            echo view('layout/usuario/no_permisos');
        }
    }

    public function listar()
    {
        $testimonios = $this->testimonioModel->where('estado', 1)->findAll();

        foreach ($testimonios as &$item) {
            // Formatear el estado
            if ($item['estado'] == 1) {
                $item['estado'] = '<span class="badge badge-success">Activo</span>';
            }

            // Agregar acciones según el rol del usuario
            $session = session();
            if ($session->get('rol') == 'Administrador') {
                $item['accion'] = '<button class="btn btn-danger btn-sm eliminar" onclick="eliminarTestimonio(' . $item['id'] . ')"><i class="fas fa-trash-alt"></i></button> ';
                $item['accion'] .= '<button class="btn btn-primary btn-sm editar" onclick="editarTestimonio(' . $item['id'] . ')"><i class="fas fa-edit"></i></button> ';
            } else {
                $item['accion'] = '<button class="btn btn-danger btn-sm eliminar" onclick="eliminarTestimonio(' . $item['id'] . ')" disabled><i class="fas fa-trash-alt"></i></button> ';
                $item['accion'] .= '<button class="btn btn-primary btn-sm editar" onclick="editarTestimonio(' . $item['id'] . ')"><i class="fas fa-edit"></i></button> ';
            }

            // Ajustar la imagen
            if ($item['foto']) {
                $item['foto'] = '<img src="' . base_url('public/uploads/' . $item['foto']) . '" class="img-thumbnail" style="width: 250px; height: 100px;">';
            }
        }

        echo json_encode($testimonios, JSON_UNESCAPED_UNICODE);
    }

    public function registrar()
    {
        $data = $this->request->getPost();
        if ($this->request->getFile('foto')->isValid()) {
            $file = $this->request->getFile('foto');
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'public/uploads', $newName);
            $data['foto'] = $newName;
        }

        $result = $this->testimonioModel->save($data);
        $message = $result ? 'Testimonio registrado correctamente.' : 'Error al registrar el testimonio.';
        $response = [
            'ok' => $result,
            'message' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }

    public function obtener($id)
    {
        $testimonio = $this->testimonioModel->find($id);
        if ($testimonio) {
            return $this->response->setJSON(['ok' => true, 'data' => $testimonio]);
        } else {
            return $this->response->setJSON(['ok' => false, 'message' => 'Testimonio no encontrado.']);
        }
    }

    public function actualizar()
    {
        $data = $this->request->getPost();
        $id = $data['idTestimonios'];

        if ($this->request->getFile('foto')->isValid()) {
            $file = $this->request->getFile('foto');
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'public/uploads', $newName);
            $data['foto'] = $newName;

            $testimonio = $this->testimonioModel->find($id);
            if ($testimonio['foto'] && file_exists(FCPATH . 'public/uploads/' . $testimonio['foto'])) {
                unlink(FCPATH . 'public/uploads/' . $testimonio['foto']);
            }
        }

        $result = $this->testimonioModel->update($id, $data);
        $message = $result ? 'Testimonio actualizado correctamente.' : 'Error al actualizar el testimonio.';
        $response = [
            'ok' => $result,
            'message' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }

    public function eliminar($id)
    {
        $testimonio = $this->testimonioModel->find($id);
        if ($testimonio['foto'] && file_exists(FCPATH . 'public/uploads/' . $testimonio['foto'])) {
            unlink(FCPATH . 'public/uploads/' . $testimonio['foto']);
        }
        $result = $this->testimonioModel->delete($id);
        $message = $result ? 'Testimonio eliminado correctamente.' : 'Error al eliminar el testimonio.';
        $response = [
            'ok' => $result,
            'message' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }
}
