<?php

namespace App\Controllers;
use App\Models\ConfiguracionModel;
use App\Models\AcercaModel;

class Acerca extends BaseController
{
    public function acerca()
    {
        $configuracionModel = new ConfiguracionModel();
        $configuracion = $configuracionModel->findAll();
        $acercaModel = new AcercaModel();
        $acerca = $acercaModel->findAll();

        echo view('layout/sitio/principal/header', compact('configuracion'));
        echo view('layout/sitio/acerca/acerca', compact('acerca'));
        echo view('layout/sitio/principal/footer', compact('configuracion'));
    }
}
