<?php

namespace App\Controllers;
use App\Models\DestinoModel;
use App\Models\ConfiguracionModel;

class Destino extends BaseController
{
    protected $destinoModel;

    public function __construct()
    {
        $this->destinoModel = new DestinoModel();
    }
    public function destino()
    {
        $configuracionModel = new ConfiguracionModel();
        $configuracion = $configuracionModel->findAll();
        $data['destinos'] = $this->destinoModel->findAll();

        echo view('layout/sitio/principal/header', compact('configuracion'));
        echo view('layout/sitio/destino/destino',$data);
        echo view('layout/sitio/principal/footer', compact('configuracion'));
    }
    
    public function detalles($id)
    {
        $destino = $this->destinoModel->find($id);

        if ($destino) {
            $dest = nl2br($destino['detalles']);

            return $this->response->setJSON(['ok' => true, 'data' => $dest]);
        } else {
            return $this->response->setJSON(['ok' => false, 'message' => 'Destino no encontrado']);
        }
    }
}
