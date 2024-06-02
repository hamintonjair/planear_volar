<?php

namespace App\Controllers;
use App\Models\TestimonioModel;
use App\Models\ConfiguracionModel;

class Testimonio extends BaseController
{
    public function testimonio()
    {
        $testimonioModel = new TestimonioModel();
        $data['testimonios'] = $testimonioModel->findAll();
        $configuracionModel = new ConfiguracionModel();
        $configuracion = $configuracionModel->findAll();
        echo view('layout/sitio/principal/header', compact('configuracion'));
        echo view('layout/sitio/testimonio/testimonio',$data);
        echo view('layout/sitio/principal/footer', compact('configuracion'));
    }
}
