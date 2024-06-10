<?php

namespace App\Controllers;

use App\Models\PaqueteModel;
use App\Models\DetallespermisosModel;
use App\Models\DestinoModel;


class AdminPaquetes extends BaseController
{
    protected $paqueteModel, $permisos, $destinoModel;

    public function __construct()
    {
        $this->paqueteModel = new PaqueteModel();
        $this->permisos = new DetallespermisosModel();
        $this->destinoModel = new DestinoModel();

    }
    public function packages()
    {

        $session = session();
        $userId = $session->get('idUsuario'); // Obtener el ID del usuario desde la sesión

        $permissions = $this->permisos->where('id_usuarios', $userId)->findAll();
        $data['destinos'] = $this->destinoModel->findAll();

        $data['permissions'] = array_column($permissions, 'id_permisos');
        if (in_array(10, $data['permissions'])) {
            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/paquetes_turistico/paquetes_turistico',$data);
            echo view('layout/admin/footer');
        } else {
            echo view('layout/usuario/no_permisos');
        }
    }
    // listar paquetes
    public function listar()
    {
        $paquetes = $this->paqueteModel->where('estado', 1)->findAll();

        foreach ($paquetes as &$item) {

            // mostramos en  la descripción a las primeras 30 palabras
            $item['descripcion'] = implode(' ', array_slice(explode(' ', $item['descripcion']), 0, 20)) . '...';
            $item['nombre_ciudad'] = $this->destinoModel->find($item['ciudad_id'])['nombre'];

            // Formatear el estado
            if ($item['estado'] == 1) {
                $item['estado'] = '<span class="badge badge-success">Activo</span>';
            }

            // Agregar acciones según el rol del usuario
            $session = session();
            if ($session->get('rol') == 'Administrador') {
                $item['accion'] = '<button class="btn btn-danger btn-sm eliminar" onclick="eliminarPaquete(' . $item['id'] . ')"><i class="fas fa-trash-alt"></i></button> ';
                $item['accion'] .= '<button class="btn btn-primary btn-sm editar" onclick="editarPaquete(' . $item['id'] . ')"><i class="fas fa-edit"></i></button> ';
            } else {
                $item['accion'] = '<button class="btn btn-danger btn-sm eliminar" onclick="eliminarPaquete(' . $item['id'] . ')" disabled><i class="fas fa-trash-alt"></i></button> ';
                $item['accion'] .= '<button class="btn btn-primary btn-sm editar" onclick="editarPaquete(' . $item['id'] . ')"><i class="fas fa-edit"></i></button> ';
            }

            // Ajustar la imagen
            if ($item['foto']) {
                $item['foto'] = '<img src="' . base_url('public/uploads/' . $item['foto']) . '" class="img-thumbnail" style="width: 250px; height: 100px;">';
            }
        }

        echo json_encode($paquetes, JSON_UNESCAPED_UNICODE);
    }

    // registrar paquetes
    public function registrar()
    {
        $data = $this->request->getPost();

        if ($this->request->getFile('foto')->isValid()) {
            $file = $this->request->getFile('foto');
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'public/uploads', $newName);
            $data['foto'] = $newName;
        }

        $result = $this->paqueteModel->insert($data);
        $message = $result ? 'Paquete registrado correctamente.' : 'Error al registrar el paquete.';
        $response = [
            'ok' => $result,
            'message' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }
    // obtener los paquetes
    public function obtener($id)
    {
        $paquete = $this->paqueteModel->find($id);
        if ($paquete) {
            return $this->response->setJSON(['ok' => true, 'data' => $paquete]);
        } else {
            return $this->response->setJSON(['ok' => false, 'message' => 'Paquete no encontrado.']);
        }
    }
    // actualizar
    public function actualizar()
    {
        $data = $this->request->getPost();
        $id = $data['idPaquetes'];

        if ($this->request->getFile('foto')->isValid()) {
            $file = $this->request->getFile('foto');
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'public/uploads', $newName);
            $data['foto'] = $newName;

            $paquete = $this->paqueteModel->find($id);
            if ($paquete['foto'] && file_exists(FCPATH . 'public/uploads/' . $paquete['foto'])) {
                unlink(FCPATH . 'public/uploads/' . $paquete['foto']);
            }
        }

        $result = $this->paqueteModel->update($id, $data);
        $message = $result ? 'Paquete actualizado correctamente.' : 'Error al actualizar el paquete.';
        $response = [
            'ok' => $result,
            'message' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }

    public function eliminar($id)
    {
        $paquete = $this->paqueteModel->find($id);
        if ($paquete['foto'] && file_exists(FCPATH . 'public/uploads/' . $paquete['foto'])) {
            unlink(FCPATH . 'public/uploads/' . $paquete['foto']);
        }
        $result = $this->paqueteModel->delete($id);
        $message = $result ? 'Paquete eliminado correctamente.' : 'Error al eliminar el paquete.';
        $response = [
            'ok' => $result,
            'message' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }
    public function getPaqueteDescripcion($id)
    {
        $paquete = $this->paqueteModel->find($id);

        return $this->response->setJSON([
            'success' => true,
            'descripcion' => $paquete['descripcion']
        ]);
    }
}
