<?php

namespace App\Controllers;
use App\Models\ConfiguracionModel;
use App\Models\DetallespermisosModel;

class AdminConfiguracion extends BaseController
{
    protected $configModel, $permisos; 

    public function __construct() {
        $this->configModel = new ConfiguracionModel();
        $this->permisos = new DetallespermisosModel();
    }
    //   vista
    public function config()
    {      
        $session = session();
        $userId = $session->get('idUsuario'); // Obtener el ID del usuario desde la sesión
    
        $permissions = $this->permisos->where('id_usuarios', $userId)->findAll();
    
        $data['permissions'] = array_column($permissions, 'id_permisos');
        if(in_array(3, $data['permissions'])){
            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/configuracion/configuracion');
            echo view('layout/admin/footer');
        }else{
            echo view('layout/usuario/no_permisos');

        }
       
    }

    // obtenemos los datos de la empresa
    public function obtener()
    {
        $config = $this->configModel->first(); 

        if ($config) {
            return $this->response->setJSON(['ok' => true, 'data' => $config]);
        } else {
            return $this->response->setJSON(['ok' => false, 'message' => 'No se hay informacion de la configuración']);
        }
    }

    public function actualizar()
    {
        $idempresa = $this->request->getPost('idempresa');
        $nombre_empresa = $this->request->getPost('nombre_empresa');
        $correo = $this->request->getPost('correo');
        $telefono = $this->request->getPost('telefono');
        $ciudad = $this->request->getPost('ciudad');
        $direccion = $this->request->getPost('direccion');
        $facebook = $this->request->getPost('facebook');
        $instagram = $this->request->getPost('instagram');
        $twitter = $this->request->getPost('twitter');
        $linkedin = $this->request->getPost('linkedin');
        $youtube = $this->request->getPost('youtube');

        $data = [
            'nombre_empresa' => $nombre_empresa,
            'correo' => $correo,
            'telefono' => $telefono,
            'ciudad' => $ciudad,
            'direccion' => $direccion,
            'facebook' => $facebook,
            'instagram' => $instagram,
            'twitter' => $twitter,
            'linkedin' => $linkedin,
            'youtube' => $youtube,
        ];
        
        if(empty($idempresa)){
             $this->configModel->insert($data);
             return $this->response->setJSON(['ok' => true, 'message' => 'Configuración insertada correctamente']);

        }else{
            if ($this->configModel->update($idempresa, $data)) { 
                return $this->response->setJSON(['ok' => true, 'message' => 'Configuración actualizada correctamente']);
             } else {
                return $this->response->setJSON(['ok' => false, 'message' => 'No se pudo actualizar la configuración']);
             }
        }
       
    }
}

