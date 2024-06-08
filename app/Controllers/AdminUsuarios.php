<?php

namespace App\Controllers;

use \App\Models\UsuariosModel;
use App\Models\DetallespermisosModel;

class AdminUsuarios extends BaseController
{
    protected $usuario, $permisos;

    public function __construct()
    {
        $this->usuario = new UsuariosModel();
        $this->permisos = new DetallespermisosModel();
    }
    public function users()
    {

        $session = session();
        $userId = $session->get('idUsuario'); // Obtener el ID del usuario desde la sesión

        $permissions = $this->permisos->where('id_usuarios', $userId)->findAll();

        $data['permissions'] = array_column($permissions, 'id_permisos');
        if (in_array(14, $data['permissions'])) {
            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/usuario/usuario');
            echo view('layout/admin/footer');
        } else {
            echo view('layout/usuario/no_permisos');
        }
    }
    // registrr usuario
    public function getUsuarios()
    {
        $idUsuario = $this->request->getPost('idUsuario');
        $nombre = $this->request->getPost('nombre');
        $apellidos = $this->request->getPost('apellido');
        $cedula = $this->request->getPost('cedula');
        $telefono = $this->request->getPost('telefono');
        $direccion = $this->request->getPost('direccion');
        $correo = $this->request->getPost('correo');
        $rol = $this->request->getPost('rol');
        $clave =  $this->request->getPost('clave'); // Cifrado de la clave

        if (!empty($idUsuario)) {
            $usuarioExistente = $this->usuario->where('id', $idUsuario)->first();
            if ($usuarioExistente['clave'] == $clave) {
                $nuevaContraseña = $usuarioExistente['clave'];
            } else {
                $nuevaContraseña = hash('sha256', $clave);
            }
        }

        $data = [
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'cedula' => $cedula,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'correo' => $correo,
            'rol' => $rol,
            'clave' => $nuevaContraseña,
        ];

        $usuarioExistente = $this->usuario->where('cedula', $cedula)->orWhere('correo', $correo)->first();
        if ($usuarioExistente) {
            // Si ya existe un usuario con la misma cédula o correo, mostrar un mensaje de error
            $message = 'Ya existe un usuario con la misma cédula o correo.';
            $result = false;
        } else {
            if (empty($idUsuario)) {
                // Registrar nuevo usuario
                $result = $this->usuario->insert($data);
                $message = $result ? 'Usuario registrado correctamente.' : 'Error al registrar el usuario.';
            }
        }
        if (!empty($idUsuario)) {
            // Actualizar usuario existente         
            $result = $this->usuario->update($idUsuario, $data);
            $message = $result ? 'Usuario actualizado correctamente.' : 'Error al actualizar el usuario.';
        }
        $response = [
            'ok' => $result,
            'post' => $message
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
    // obtener usuaro para editar
    public function obtenerUsuario($id)
    {
        $usuario = $this->usuario->find($id);
        echo json_encode($usuario, JSON_UNESCAPED_UNICODE);
    }

    // listar usuario
    public function ListarUsuarios()
    {
        $usuarios = $this->usuario->where('estado', 1)->findAll();

        foreach ($usuarios as &$item) {
            // Agregar lógica para mostrar 'Estado activo' si el estado es igual a 1
            if ($item['estado'] == 1) {
                $item['estado'] =  '<span class="badge badge-success">Activo</span>';
            }
            $session = session();
            if ($session->get('rol') == 'Administrador') {
                if ($item['rol'] == 'Administrador') {
                    $item['accion'] = '<button class="btn btn-danger btn-sm eliminar" onclick="eliminarUsuario(' . $item['id'] . ')" disabled><i class="fas fa-trash-alt"></i></button> ';
                } else {
                    $item['accion'] = '<button class="btn btn-danger btn-sm eliminar" onclick="eliminarUsuario(' . $item['id'] . ')" ><i class="fas fa-trash-alt"></i></button> ';
                }
                $item['accion'] .= '<button class="btn btn-primary btn-sm editar" onclick="editarUsuario(' . $item['id'] . ')"><i class="fas fa-edit"></i></button> ';
                $item['accion'] .= '<button class="btn btn-warning btn-sm permisos" onclick="openModalPermisos(' . $item['id'] . ')"><i class="fas fa-user-cog"></i> </button>';
            } else if ($session->get('rol') == 'Operador') {
                $item['accion'] = '<button class="btn btn-danger btn-sm eliminar" onclick="eliminarUsuario(' . $item['id'] . ')" disabled><i class="fas fa-trash-alt"></i></button> ';
                $item['accion'] .= '<button class="btn btn-primary btn-sm editar" onclick="editarUsuario(' . $item['id'] . ')"><i class="fas fa-edit"></i></button> ';
                $item['accion'] .= '<button class="btn btn-warning btn-sm permisos" onclick="openModalPermisos(' . $item['id'] . ') disabled"><i class="fas fa-user-cog"></i> </button>';
            }
        }

        echo json_encode($usuarios, JSON_UNESCAPED_UNICODE);
    }
    // eliminar usuario
    public function deleteUser($id)
    {
        $usuario = $this->usuario->where('id', $id)->find();
        if ($usuario) {
            // Cambiar el estado a inactivo (o a otro valor que represente el estado eliminado)
            $usuario['estado'] = '0';
            // Actualizar el usuario en la base de datos
            $this->usuario->update($id, $usuario);

            $msg = array('ok' => true, 'post' => 'Usuario desactivado correctamente.');
        } else {
            $msg = array('ok' => false, 'post' => 'Usuario no encontrado.');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    }
    // usuarios eliminados
    public function VistaUsuariosEliminados()
    {
        echo view('layout/admin/head');
        echo view('layout/admin/nabvar');
        echo view('layout/admin/aside');
        echo view('layout/usuario/usuariosDesactivados');
        echo view('layout/admin/footer');
    }
    // listar eliminados
    public function ListarUsuariosEli()
    {
        $usuarios = $this->usuario->where('estado', 0)->findAll();

        foreach ($usuarios as &$item) {
            // Agregar lógica para mostrar 'Estado activo' si el estado es igual a 1
            if ($item['estado'] == 0) {
                $item['estado'] =  '<span class="badge badge-danger">Inactivo</span>';
            }
            $item['accion'] = '<button class="btn btn-success btn-sm restaurar" onclick="restaurarUsuario(' . $item['id'] . ')"><i class="fas fa-undo"></i></button> ';
        }
        echo json_encode($usuarios, JSON_UNESCAPED_UNICODE);
    }
    // restaurar usuario
    public function restaurarUser($id)
    {
        $usuario = $this->usuario->where('id', $id)->find();
        if ($usuario) {
            // Cambiar el estado a inactivo (o a otro valor que represente el estado eliminado)
            $usuario['estado'] = '1';
            // Actualizar el usuario en la base de datos
            $this->usuario->update($id, $usuario);

            $msg = array('ok' => true, 'post' => 'Usuario activado correctamente.');
        } else {
            $msg = array('ok' => false, 'post' => 'Usuario no encontrado.');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    }
    // editar usuario

    public function editarUser($id)
    {
        $usuario = $this->usuario->where('id', $id)->find();

        if ($usuario) {
            echo json_encode($usuario, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(array('ok' => false, 'post' => 'Usuario no encontrado'), JSON_UNESCAPED_UNICODE);
        }
    }
    // perfil
    public function perfil()
    {
        echo view('layout/admin/head');
        echo view('layout/admin/nabvar');
        echo view('layout/admin/aside');
        echo view('layout/usuario/perfil');
        echo view('layout/admin/footer');
    }
    // obtenemos los datos del perfil
    public function obtener()
    {
        $session = session();
        $config = $this->usuario->where('id', $session->get('idUsuario'))->first();

        if ($config) {
            return $this->response->setJSON(['ok' => true, 'data' => $config]);
        } else {
            return $this->response->setJSON(['ok' => false, 'message' => 'No se hay informacion del perfil']);
        }
    }
    //  actualizar 
    public function actualizar()
    {
        $idperfil = $this->request->getPost('idperfil');
        $data = $this->request->getPost();

        if (empty($idperfil)) {
            $this->usuario->insert($data);
            return $this->response->setJSON(['ok' => true, 'message' => 'perfil insertado correctamente']);
        } else {
            if ($this->usuario->update($idperfil, $data)) {
                return $this->response->setJSON(['ok' => true, 'message' => 'perfil actualizado correctamente']);
            } else {
                return $this->response->setJSON(['ok' => false, 'message' => 'No se pudo actualizar el perfil']);
            }
        }
    }
}
