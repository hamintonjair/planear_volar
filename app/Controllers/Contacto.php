<?php

namespace App\Controllers;
use App\Models\ConfiguracionModel;
use App\Models\MensajeModel;

class Contacto extends BaseController
{
    public function contacto()
    {
        $configuracionModel = new ConfiguracionModel();
        $configuracion = $configuracionModel->findAll();
        echo view('layout/sitio/principal/header',compact('configuracion'));
        echo view('layout/sitio/contacto/contacto');
        echo view('layout/sitio/principal/footer',compact('configuracion'));
    }
    public function mensaje()
    {
        $mensajeModel = new MensajeModel();

        $data = $this->request->getPost();

        $result = $mensajeModel->insert($data);
        $message = $result ? 'Mensaje enviado con exito, A tu correo se enviará la respuesta a tu información solicitada.' : 'Error al enviar el mensaje.';
        $response = [
            'ok' => $result,
            'message' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }
}
