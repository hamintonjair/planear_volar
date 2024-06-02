<?php

namespace App\Controllers;
use App\Models\ConfiguracionModel;
use App\Models\VuelosModel;

class Vuelo extends BaseController
{
    public function vuelo()
    {
        $configuracionModel = new ConfiguracionModel();
        $configuracion = $configuracionModel->findAll();
        $vueloModel = new VuelosModel();
        $vuelo = $vueloModel->findAll();
        echo view('layout/sitio/principal/header', compact('configuracion'));
        echo view('layout/sitio/vuelo/vuelo', compact('vuelo'));
        echo view('layout/sitio/principal/footer', compact('configuracion'));
    }
}
