<?php

namespace App\Controllers;
use \App\Models\ClientesModel;
use \App\Models\DetallespermisosModel;


class AdminClientes extends BaseController
{
    protected $cliente,$permisos;

    public function __construct()
    {
        $this->cliente = new ClientesModel();
        $this->permisos = new DetallespermisosModel();
    }
    public function client()
    {
        $session = session();
        $userId = $session->get('idUsuario'); // Obtener el ID del usuario desde la sesión

        $permissions = $this->permisos->where('id_usuarios', $userId)->findAll();

        $data['permissions'] = array_column($permissions, 'id_permisos');
        if (in_array(4, $data['permissions'])) {
            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/cliente/cliente');
            echo view('layout/admin/footer');
        } else {
            echo view('layout/usuario/no_permisos');
        }
        
    }
    
    public function getClientes()
    {
        $idCliente = $this->request->getPost('idCliente');
        $nombre = $this->request->getPost('nombre');
        $apellidos = $this->request->getPost('apellido');
        $cedula = $this->request->getPost('cedula');
        $telefono = $this->request->getPost('telefono');
        $direccion = $this->request->getPost('direccion');
        $correo = $this->request->getPost('correo');
 
        $data = [
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'cedula' => $cedula,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'correo' => $correo,
        ];

        $clienteExistente = $this->cliente->where('cedula', $cedula)->orWhere('correo', $correo)->first();
        if ($clienteExistente) {
            // Si ya existe un cliente con la misma cédula o correo, mostrar un mensaje de error
            $message = 'Ya existe un cliente con la misma cédula o correo.';
            $result = false;
        } else {
            if (empty($idCliente)) {
                // Registrar nuevo cliente
                $result = $this->cliente->insert($data);
                $message = $result ? 'Cliente registrado correctamente.' : 'Error al registrar el cliente.';
            }
        }
        if (!empty($idCliente)) {
            // Actualizar cliente existente         
            $result = $this->cliente->update($idCliente, $data);
            $message = $result ? 'Cliente actualizado correctamente.' : 'Error al actualizar el cliente.';
        }
        $response = [
            'ok' => $result,
            'post' => $message
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
    // obtener usuaro para editar
    public function obtenerCliente($id)
    {
        $cliente = $this->cliente->find($id);
        echo json_encode($cliente, JSON_UNESCAPED_UNICODE);
    }

    // listar cliente
    public function ListarClientes()
    {
        $clientes = $this->cliente->where('estado', 1)->findAll();
        foreach ($clientes as &$item) {
            // Agregar lógica para mostrar 'Estado activo' si el estado es igual a 1
            if ($item['estado'] == 1) {
                $item['estado'] =  '<span class="badge badge-success">Activo</span>';
            }
            $session = session();
            if ($session->get('rol') == 'Administrador') {
                $item['accion'] = '<button class="btn btn-danger btn-sm eliminar" onclick="eliminarCliente(' . $item['id'] . ')"><i class="fas fa-trash-alt"></i></button> ';
                $item['accion'] .= '<button class="btn btn-primary btn-sm editar" onclick="editarCliente(' . $item['id'] . ')"><i class="fas fa-edit"></i></button> ';
            } else {
                $item['accion'] = '<button class="btn btn-danger btn-sm eliminar" onclick="eliminarCliente(' . $item['id'] . ')" disabled><i class="fas fa-trash-alt"></i></button> ';
                $item['accion'] .= '<button class="btn btn-primary btn-sm editar" onclick="editarCliente(' . $item['id'] . ')"><i class="fas fa-edit"></i></button> ';
            }
            
        }
        echo json_encode($clientes, JSON_UNESCAPED_UNICODE);
    }
    // eliminar cliente
    public function deleteUser($id)
    {
        $cliente = $this->cliente->where('id', $id)->find();
        if ($cliente) {
            $this->cliente->delete($id);

            $msg = array('ok' => true, 'post' => 'Cliente eliminado correctamente.');
        } else {
            $msg = array('ok' => false, 'post' => 'Cliente no encontrado.');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    }

    public function editarUser($id)
    {
        $cliente = $this->cliente->where('id', $id)->find();

        if ($cliente) {
            echo json_encode($cliente, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(array('ok' => false, 'post' => 'Cliente no encontrado'), JSON_UNESCAPED_UNICODE);
        }
    }
    // actualizar cliente
 
}
