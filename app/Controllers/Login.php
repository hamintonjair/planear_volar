<?php
namespace App\Controllers;
use App\Models\UsuariosModel;

class Login extends BaseController
{

    protected $usuario; 

    public function __construct() {
        $this->usuario = new UsuariosModel();
    }
      // login
    public function login(){
        echo view('layout/login/login');
    }
    // validar
    public function validar()
    {
        $correo = $this->request->getPost('correo');
        $clave = $this->request->getPost('password');

        $data = $this->usuario->where('correo', $correo)->first();

        if(hash('sha256', $clave) === $data['clave']){
            $dato = [
                'idUsuario' => $data['id'],
                'nombre' => $data['nombre'],
                'apellido' => $data['apellidos'],
                'rol' => $data['rol'],
                'activo' => true,
            ];
            $session = session();
            $session->set($dato);
            $msg = array('ok' => true, 'post' => 'Logueado.');
        }else{
            $msg = array('ok' => false, 'post' => 'Usuario o contraseña incorrecta');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to( base_url( 'login' ) );
    }
}
