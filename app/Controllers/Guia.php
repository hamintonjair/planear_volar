<?php

namespace App\Controllers;
use App\Models\GuiaModel;
use App\Models\ConfiguracionModel;


class Guia extends BaseController
{
    public function guias()
    {
        $guiaModel = new GuiaModel();
        $data['guias'] = $guiaModel->findAll();
        $configuracionModel = new ConfiguracionModel();
        $configuracion = $configuracionModel->findAll();

        echo view('layout/sitio/principal/header', compact('configuracion'));
        echo view('layout/sitio/guias/guias',$data);
        echo view('layout/sitio/principal/footer', compact('configuracion'));
    }
}
