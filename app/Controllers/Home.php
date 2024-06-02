<?php

namespace App\Controllers;

use App\Models\DestinoModel;
use App\Models\PaqueteModel;
use App\Models\GuiaModel;
use App\Models\TestimonioModel;
use App\Models\ReservaModel;
use App\Models\ConfiguracionModel;
use App\Models\OfertaModel;

class Home extends BaseController
{
    protected $reservar;

    public function __construct()
    {
        $this->reservar = new ReservaModel();
    }
    public function index()
    {
        // Crear instancias de los modelos
        $destinoModel = new DestinoModel();
        $paqueteModel = new PaqueteModel();
        $guiaModel = new GuiaModel();
        $testimonioModel = new TestimonioModel();
        $configuracionModel = new ConfiguracionModel();
        $oferta_model = new OfertaModel();


        // Obtener datos de la base de datos
        $data['destinos'] = $destinoModel->findAll();
        $data['paquetes'] = $paqueteModel->findAll();
        $data['ofertas'] = $oferta_model->where('estado', 'Aplicado')->findAll();
        $data['guias'] = $guiaModel->findAll();
        $data['testimonios'] = $testimonioModel->findAll();
        $configuracion = $configuracionModel->findAll();

        echo view('layout/sitio/principal/header', compact('configuracion'));
        echo view('layout/sitio/principal/carousel',$data);
        echo view('layout/sitio/principal/home', $data);
        echo view('layout/sitio/principal/footer', compact('configuracion'));
    }
    public function reservar()
    {
        $data = $this->request->getPost();

        $result = $this->reservar->insert($data);
        $message = $result ? 'Reserva registrada correctamente, un ejecutivo se contactara contigo para completar tu solicitud.' : 'Error al registrar la reserva.';
        $response = [
            'ok' => $result,
            'message' => $message
        ];
        return $this->response->setJSON($response, JSON_UNESCAPED_UNICODE);
    }
}
