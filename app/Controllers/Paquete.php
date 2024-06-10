<?php

namespace App\Controllers;

use App\Models\PaqueteModel;
use App\Models\DestinoModel;
use App\Models\ConfiguracionModel;
use App\Models\OfertaModel;

class Paquete extends BaseController
{
    protected $paqueteModel;

    public function __construct()
    {
        $this->paqueteModel = new PaqueteModel();
    }
    public function paquete()
    {
        // Crear instancias de los modelos
        $destinoModel = new DestinoModel();
        $configuracionModel = new ConfiguracionModel();
        $oferta_model = new OfertaModel();

        // Obtener datos de la base de datos
        $data['destinos'] = $destinoModel->findAll();
        $data['paquetes'] = $this->paqueteModel->findAll();
        $data['ofertas'] = $oferta_model->where('estado', 'Aplicado')->findAll();

        $configuracion = $configuracionModel->findAll();

        echo view('layout/sitio/principal/header', compact('configuracion'));
        echo view('layout/sitio/paquetes/paquetes', $data);
        echo view('layout/sitio/principal/footer', compact('configuracion'));
    }
    public function descripcion($id)
    {
        $paquete = $this->paqueteModel->find($id);

        if ($paquete) {
            $paqu = nl2br($paquete['descripcion']);

            return $this->response->setJSON(['ok' => true, 'data' => $paqu]);
        } else {
            return $this->response->setJSON(['ok' => false, 'error' => 'Paquete no encontrado']);
        }
    }
}
