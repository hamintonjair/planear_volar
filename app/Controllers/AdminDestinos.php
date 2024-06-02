<?php

namespace App\Controllers;
use App\Models\DestinoModel;
use \App\Models\DetallespermisosModel;

class AdminDestinos extends BaseController
{
    protected $destinoModel,$permisos;
    public function __construct()
    {
        $this->destinoModel = new DestinoModel();
        $this->permisos = new DetallespermisosModel();

    }
    public function destinations()
    {
        $session = session();
        $userId = $session->get('idUsuario'); // Obtener el ID del usuario desde la sesión

        $permissions = $this->permisos->where('id_usuarios', $userId)->findAll();

        $data['permissions'] = array_column($permissions, 'id_permisos');
        if (in_array(6, $data['permissions'])) {
            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/destino/destino');
            echo view('layout/admin/footer');
        } else {
            echo view('layout/usuario/no_permisos');
        }
    }
// listar todos los destinos
    public function listar()
    {
        $destinos = $this->destinoModel->where('estado', 1)->findAll();
    
        foreach ($destinos as &$item) {
            // Agregar lógica para mostrar 'Estado activo' si el estado es igual a 1
            if ($item['estado'] == 1) {
                $item['estado'] = '<span class="badge badge-success">Activo</span>';
            }
            $item['detalles'] = implode(' ', array_slice(explode(' ', $item['detalles']), 0, 20)) . '...';

            // Añadir la ruta completa de la imagen
            $item['foto'] = base_url('public/uploads/' . $item['foto']);
            
            $session = session();
            if ($session->get('rol') == 'Administrador') {
                $item['accion'] = '<button class="btn btn-danger btn-sm eliminar" onclick="eliminarDestino(' . $item['id'] . ')"><i class="fas fa-trash-alt"></i></button> ';
                $item['accion'] .= '<button class="btn btn-primary btn-sm editar" onclick="editarDestino(' . $item['id'] . ')"><i class="fas fa-edit"></i></button> ';
            } else {
                $item['accion'] = '<button class="btn btn-danger btn-sm eliminar" onclick="eliminarDestino(' . $item['id'] . ')" disabled><i class="fas fa-trash-alt"></i></button> ';
                $item['accion'] .= '<button class="btn btn-primary btn-sm editar" onclick="editarDestino(' . $item['id'] . ')"><i class="fas fa-edit"></i></button> ';
            }
        }
    
        echo json_encode($destinos, JSON_UNESCAPED_UNICODE);
    }
    
// obtener informacion de destino
    public function obtener($id)
    {
        $data = $this->destinoModel->find($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
// Guardar destino
    public function guardar()
    {
        $id = $this->request->getPost('idDestino');
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'municipio' => $this->request->getPost('municipio'),
            'detalles' => $this->request->getPost('detalles')

        ];

        if ($this->request->getFile('foto')->isValid()) {
            $file = $this->request->getFile('foto');
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'public/uploads', $newName);
            $data['foto'] = $newName;

            // Eliminar la imagen anterior si se está actualizando
            if ($id) {
                $destino = $this->destinoModel->find($id);
                if ($destino['foto'] && file_exists(FCPATH . 'public/uploads/' . $destino['foto'])) {
                    unlink(FCPATH . 'public/uploads/' . $destino['foto']);
                }
            }
        }
        if ($id) {
            $result = $this->destinoModel->update($id, $data);
            $message = $result ? 'Destino actualizado correctamente.' : 'Error al actualizar el destino.';

        } else {
            $result = $this->destinoModel->insert($data);
            $message = $result ? 'Destino insertado correctamente.' : 'Error al insertar el destino.';
        }
        $response = [
            'ok' => $result,
            'post' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }
// eliminas destinos
    public function eliminar($id)
    {
        $destino = $this->destinoModel->find($id);
        if ($destino['foto'] && file_exists(FCPATH . 'public/uploads/' . $destino['foto'])) {
            unlink(FCPATH . 'public/uploads/' . $destino['foto']);
        }
        $result = $this->destinoModel->delete($id);
        $message = $result ? 'Destino eliminado correctamente.' : 'Error al eliminar el destino.';
    
        $response = [
            'ok' => $result,
            'message' => $message 
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }
    
}


