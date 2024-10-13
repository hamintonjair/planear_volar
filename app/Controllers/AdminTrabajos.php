<?php

namespace App\Controllers;
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\VacanteModel;
use App\Models\AplicacionModel;
use App\Models\DetallespermisosModel;
use Twilio\Rest\Client;


class AdminTrabajos extends BaseController
{
    protected $vacanteModel, $aplicacionModel, $permisos;

    public function __construct()
    {
        $this->vacanteModel = new VacanteModel();
        $this->aplicacionModel = new AplicacionModel();
        $this->permisos = new DetallespermisosModel();
    }
    public function jobs()
    {
        $session = session();
        $userId = $session->get('idUsuario'); // Obtener el ID del usuario desde la sesión

        $permissions = $this->permisos->where('id_usuarios', $userId)->findAll();

        $data['permissions'] = array_column($permissions, 'id_permisos');
        if (in_array(15, $data['permissions'])) {
            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/trabajo/trabajo');
            echo view('layout/admin/footer');
        } else {
            echo view('layout/usuario/no_permisos');
        }
    }
    // Listar vacantes
    public function listar()
    {
        $vacantes = $this->vacanteModel->where('estado', 1)->findAll();

        foreach ($vacantes as &$item) {

            // mostramos en la descripción a las primeras 30 palabras

            $item['descripcion'] = implode(' ', array_slice(explode(' ', $item['descripcion']), 0, 30)) . '...';

            if ($item['estado'] == 1) {
                $item['estado'] = '<span class="badge badge-success">Activo</span>';
            }

            $session = session();
            if ($session->get('rol') == 'Administrador') {
                $item['accion'] = '<button class="btn btn-danger btn-sm eliminar" onclick="eliminarVacante(' . $item['id'] . ')"><i class="fas fa-trash-alt"></i></button> ';
                $item['accion'] .= '<button class="btn btn-primary btn-sm editar" onclick="editarVacante(' . $item['id'] . ')"><i class="fas fa-edit"></i></button> ';
            } else {
                $item['accion'] = '<button class="btn btn-danger btn-sm eliminar" onclick="eliminarVacante(' . $item['id'] . ')" disabled><i class="fas fa-trash-alt"></i></button> ';
                $item['accion'] .= '<button class="btn btn-primary btn-sm editar" onclick="editarVacante(' . $item['id'] . ')"><i class="fas fa-edit"></i></button> ';
            }
        }

        echo json_encode($vacantes, JSON_UNESCAPED_UNICODE);
    }

    // Registrar vacantes
    public function registrar()
    {
        $data = $this->request->getPost();

        $result = $this->vacanteModel->insert($data);
        $message = $result ? 'Vacante registrada correctamente.' : 'Error al registrar la vacante.';
        $response = [
            'ok' => $result,
            'message' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }

    // Obtener vacante por ID
    public function obtener($id)
    {
        $vacante = $this->vacanteModel->find($id);
        if ($vacante) {
            return $this->response->setJSON(['ok' => true, 'data' => $vacante]);
        } else {
            return $this->response->setJSON(['ok' => false, 'message' => 'Vacante no encontrada.']);
        }
    }

    // Actualizar vacante
    public function actualizar()
    {
        $data = $this->request->getPost();
        $id = $data['idVacantes'];
        $result = $this->vacanteModel->update($id, $data);
        $message = $result ? 'Vacante actualizada correctamente.' : 'Error al actualizar la vacante.';
        $response = [
            'ok' => $result,
            'message' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }

    // Eliminar vacante
    public function eliminar($id)
    {
        // Primero, obtén la vacante que deseas eliminar
        $vacante = $this->vacanteModel->find($id);
        
        // Verifica si la vacante existe
        if (!$vacante) {
            return $this->response->setJSON([
                'ok' => false,
                'message' => 'Vacante no encontrada.'
            ], JSON_UNESCAPED_UNICODE);
        }
    
        // Elimina el archivo del currículo si existe
        if (isset($vacante['curriculum']) && $vacante['curriculum']) {
            $filePath = FCPATH . 'uploads/' . $vacante['curriculum'];
            if (file_exists($filePath)) {
                if (!unlink($filePath)) {
                    return $this->response->setJSON([
                        'ok' => false,
                        'message' => 'Error al eliminar el archivo del curriculum.'
                    ], JSON_UNESCAPED_UNICODE);
                }
            }
        }
    
        // Ahora elimina la vacante
        $result = $this->vacanteModel->delete($id);
        $message = $result ? 'Vacante eliminada correctamente.' : 'Error al eliminar la vacante.';
        $response = [
            'ok' => $result,
            'message' => $message
        ];
        
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }
    
    // APLICADO A VACANTES

    public function aplicado()
    {
        $data['aplicaciones'] = $this->aplicacionModel->findAll();

        echo view('layout/admin/head');
        echo view('layout/admin/nabvar');
        echo view('layout/admin/aside');
        echo view('layout/vacante_aplicada/aplicado', $data);
        echo view('layout/admin/footer');
    }
    //  eliminar aplicado a vacante
    public function delete($id)
    {
        // Obtener la solicitud de aplicación
        $aplicacion = $this->aplicacionModel->find($id);

        if (!$aplicacion) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Solicitud de aplicación no encontrada.',
            ]);
        }
        // Eliminar el curriculum asociado
        $curriculumPath = FCPATH . 'uploads/' . $aplicacion['curriculum'];
        if (file_exists($curriculumPath)) {
            unlink($curriculumPath);
        }
        // Eliminar la solicitud de aplicación de la base de datos
        $result = $this->aplicacionModel->delete($id);

        $message = $result ? 'Solicitud de aplicacion eliminada correctamente.' : 'Error al eliminar la solicitud.';
        $response = [
            'ok' => $result,
            'message' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }

    //   mas informacion de la aplicacion a la vacante
    public function ver_mas($id)
    {
        // Obtener los datos de la aplicación por ID
        $aplicacion = $this->aplicacionModel->find($id);

        if ($aplicacion) {
            // Obtener el nombre de la vacante usando el ID de la vacante en la aplicación
            $vacante = $this->vacanteModel->find($aplicacion['vacante_id']);

            if ($vacante) {
                $aplicacion['nombre_vacante'] = $vacante['nombre'];
                $aplicacion['nombre_ubicacion'] = $vacante['ubicacion'];
                $aplicacion['nombre_empresa'] = $vacante['empresa'];
                $aplicacion['nombre_descripcion'] = $vacante['descripcion'];

                $data['aplicacion'] = $aplicacion; // Asignar el nombre de la vacante a la aplicación
            } else {
                $aplicacion['nombre_vacante'] = 'Vacante no encontrada';
            }
            // var_dump($data['aplicacion']);exit;
            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/vacante_aplicada/ver', $data);
            echo view('layout/admin/footer');
            // Pasar los datos a la vista
        } else {
            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/vacante_aplicada/aplicado');
            echo view('layout/admin/footer');
        }
    }
    // actualizar estado de la aplicacion a la vacante
    public function cambiarEstados()
    {

        $id = $this->request->getPost('id');
        $estado = $this->request->getPost('estado');

        if ($this->aplicacionModel->update($id, ['estado' => $estado])) {
            return $this->response->setJSON(['success' => true]);
        } else {
                 print_r('entramos');
            return $this->response->setJSON(['success' => false]);
       
        }
    }

    // enviar la notificacion al telefono por mensaje
    public function cambiarEstado()
    {
        $request = \Config\Services::request();
        
        $id = $request->getPost('id');
        $estado = $request->getPost('estado');
        
        $aplicacionModel = new AplicacionModel();
        $aplicacion = $aplicacionModel->find($id);
        
        if ($aplicacionModel->update($id, ['estado' => $estado])) {
            // Enviar notificación por SMS
           $this->sendSmsNotification($aplicacion['telefono'], $estado);
           return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }
// enviar mensaje al celular d ela notificacion
    private function sendSmsNotification($to, $estado)
    {

        $sid = "AC3e55e342d023cce0fc5bce80b06d4121";
        $token = "f349d9d81d6859ca8b39c2980eca768f";
        $from = "+12622289140";
        $twilio = new Client($sid, $token);

        $messageBody = "Etimado/a el estado de su aplicación en PLANEAR VOLAR ha cambiado a $estado";

        try {
            $message = $twilio->messages->create(
                $to,
                [
                    'from' => $from,
                    'body' => $messageBody
                ]
            );

            log_message('info', 'Mensaje enviado: ' . $message->sid);
        } catch (\Exception $e) {
            // Manejar el error si ocurre
            log_message('error', 'Error al enviar el mensaje: ' . $e->getMessage());
        }
    }

}
