<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\ConfiguracionModel;
use App\Models\VacanteModel;
use Twilio\Rest\Client;

class Trabajos extends BaseController
{
    public function trabajos()
    {

        $vacantes = new VacanteModel();
        $data['vacantes'] = $vacantes->findAll();

        $configuracionModel = new ConfiguracionModel();
        $configuracion = $configuracionModel->findAll();
        // Aplicar nl2br a la descripción y formatear la fecha
        foreach ($data['vacantes'] as &$vacante) {
            $vacante['descripcion'] = nl2br($vacante['descripcion']);
            $vacante['dia'] = date('d', strtotime($vacante['fecha_publicacion']));
            $vacante['mes'] = date('M', strtotime($vacante['fecha_publicacion']));
        }

        echo view('layout/sitio/principal/header', compact('configuracion'));
        echo view('layout/sitio/trabajos/trabajos', $data);
        echo view('layout/sitio/principal/footer', compact('configuracion'));
    }
    public function apply()
    {
        $request = \Config\Services::request();

        // Validación de los datos
        $validation = \Config\Services::validation();
        $validation->setRules([
            'vacante_id' => 'required|integer',
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'codigo_pais' => 'required|string',
            'telefono' => 'required|string',
            'direccion' => 'required|string',
            'correo' => 'required|valid_email',
            'estudio' => 'required|string',
            'profesion' => 'required|string',
            'anio_inicio' => 'required|valid_date',
            'anio_final' => 'required|valid_date',
            'fecha_nacimiento' => 'required|valid_date',
            'ciudad' => 'required|string',
            'otros_estudios' => 'permit_empty',
            'idiomas' => 'permit_empty',
            'curriculum' => 'uploaded[curriculum]|max_size[curriculum,4096]|ext_in[curriculum,pdf,doc,docx]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $validation->getErrors(),
            ]);
        }

        // Guardar los datos de la solicitud
        $aplicacionModel = new \App\Models\AplicacionModel();
        $aplicacionData = [
            'vacante_id' => $request->getPost('vacante_id'),
            'nombre' => $request->getPost('nombre'),
            'apellidos' => $request->getPost('apellidos'),
            'telefono' => $request->getPost('codigo_pais') . $request->getPost('telefono'),
            'direccion' => $request->getPost('direccion'),
            'correo' => $request->getPost('correo'),
            'estudio' => $request->getPost('estudio'),
            'profesion' => $request->getPost('profesion'),
            'anio_inicio' => $request->getPost('anio_inicio'),
            'anio_final' => $request->getPost('anio_final'),
            'fecha_nacimiento' => $request->getPost('fecha_nacimiento'),
            'ciudad' => $request->getPost('ciudad'),
            'otros_estudios' => implode(", ", $request->getPost('otros_estudios')),
            'idiomas' => implode(", ", $request->getPost('idiomas')),
        ];

        // Guardar el archivo del curriculum
        $curriculum = $this->request->getFile('curriculum');
        if ($curriculum->isValid() && !$curriculum->hasMoved()) {
            $newName = $curriculum->getRandomName();
            if ($curriculum->move(FCPATH . 'uploads', $newName)) {
                $aplicacionData['curriculum'] = $newName;
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al mover el archivo del curriculum.',
                    'error' => $curriculum->getErrorString()
                ]);
            }
        }

        // Insertar la aplicación en la base de datos
        $aplicacionModel->insert($aplicacionData);

        return $this->response->setJSON([
            $this->sendSmsNotification($request->getPost('codigo_pais') . $request->getPost('telefono'), 'Aplicado'),
            'success' => true,
            'message' => 'Solicitud enviada correctamente, por mensaje te llegara la notificacion de tu aplicacion.',
        ]);
    }
    // enviar notificacion al telefono
    private function sendSmsNotification($to, $estado)
    {

        $sid = "AC3e55e342d023cce0fc5bce80b06d4121";
        $token = "f349d9d81d6859ca8b39c2980eca768f";
        $from = "+12622289140";
        $twilio = new Client($sid, $token);

        $messageBody = "Etimado/a a tu correo o por mensaje de texto será enviado el proceso sobre tu postulacion en 
        PLANEAR VOLAR, debes estar pendiente al cambio del estado que tendrá, tu postulación altual a la vacante es $estado";

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
