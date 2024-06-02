<?php


namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\ReservaTuristicaModel;
use App\Models\TestimonioModel;
use App\Models\ClientesModel;
use App\Models\GuiaModel;
use App\Models\PaqueteModel;
use App\Models\MensajeModel;
use App\Models\ReservaModel;
use App\Models\AplicacionModel;

class AdminDashboard extends BaseController
{

    protected $usuario, $reservaTuristicaModel, $testimonioModel, $clienteModel,$guiasModel, $paqueteModel,
    $mensajeModel, $reservaModel, $aplicacionModel;

    public function __construct()
    {

        $this->usuario = new UsuariosModel();
        $this->reservaTuristicaModel = new ReservaTuristicaModel();
        $this->testimonioModel = new TestimonioModel();
        $this->clienteModel = new ClientesModel();
        $this->guiasModel = new GuiaModel();
        $this->paqueteModel = new PaqueteModel();
        $this->mensajeModel = new MensajeModel();
        $this->reservaModel = new ReservaModel();
        $this->aplicacionModel = new AplicacionModel();
    }
    // vista dasboard
    public function panel()
    {  
        
        $session = session();

        if ($session->get('activo') == true) {

            // Datos para el gráfico de área (facturas generadas por mes)
            $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            $facturasGeneradas = array_fill(0, 12, 0); // Inicializa el array con ceros
            $cantidadTestimonios = array_fill(0, 12, 0); // Inicializa el array con ceros

            for ($i = 1; $i <= 12; $i++) {
                $fechaInicio = date('Y') . '-' . str_pad($i, 2, '0', STR_PAD_LEFT) . '-01';
                $fechaFin = date('Y-m-t', strtotime($fechaInicio));

                // Facturas generadas por mes
                $facturasGeneradas[$i - 1] = $this->reservaTuristicaModel
                    ->where('fecha_reserva >=', $fechaInicio)
                    ->where('fecha_reserva <=', $fechaFin)
                    ->countAllResults();

                // Testimonios recibidos por mes
                $cantidadTestimonios[$i - 1] = $this->testimonioModel
                    ->where('fecha >=', $fechaInicio)
                    ->where('fecha <=', $fechaFin)
                    ->countAllResults();
            }
            // Cantidades para las tarjetas
            $totalReservas = $this->reservaTuristicaModel->countAllResults();
            $totalFacturas = $this->reservaTuristicaModel->where('estado', 'Reservado')->countAllResults();
            $totalMensajes = $this->mensajeModel->where('estado', 'Recibido')->countAllResults();
            $totalReservas = $this->reservaModel->where('estado', 'Contactar')->countAllResults();

            $totalUsuarios = $this->usuario->where('estado', 1)->countAllResults();
            $totalClientes = $this->clienteModel->where('estado', 1)->countAllResults();
            $totalGuias = $this->guiasModel->where('estado', 1)->countAllResults();
            $totalPaquetes = $this->paqueteModel->where('estado', 1)->countAllResults();
            $totalAplicacion = $this->aplicacionModel->countAllResults();
            $totalTestimonios = $this->testimonioModel->countAllResults();

            $data = [
                'meses' => $meses,
                'facturasGeneradas' => $facturasGeneradas,
                'cantidadTestimonios' => $cantidadTestimonios,
                'totalReservas' => $totalReservas,
                'totalFacturas' => $totalFacturas,
                'totalTestimonios' => $totalTestimonios,
                'totalUsuarios' => $totalUsuarios,
                'totalClientes' => $totalClientes,
                'totalGuias' =>$totalGuias,
                'totalPaquetes' =>$totalPaquetes,
                'totalMensajes' =>$totalMensajes,
                'totalReservas' =>$totalReservas,
                'totalAplicacion' => $totalAplicacion
            ];

            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/admin/body', $data);
            echo view('layout/admin/footer');
        } else {
            return redirect()->to(base_url('login'));
        }
    }
}
