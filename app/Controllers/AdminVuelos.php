<?php

namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\VuelosModel;
use App\Models\DetallespermisosModel;
use App\Models\VuelosReservadosModel;

use Twilio\Rest\Client;

class AdminVuelos extends BaseController
{
    protected $vueloModel, $permisos, $v_reservas, $ReservaModel;

    public function __construct()
    {
        $this->vueloModel = new VuelosModel();
        $this->permisos = new DetallespermisosModel();
        $this->v_reservas = new VuelosReservadosModel();

    }

    // Mostrar todos los vuelo
    public function flights()
    {
        $data['vuelos'] = $this->vueloModel->findAll();


        $session = session();
        $userId = $session->get('idUsuario'); // Obtener el ID del usuario desde la sesión

        $permissions = $this->permisos->where('id_usuarios', $userId)->findAll();

        $data['permissions'] = array_column($permissions, 'id_permisos');
        if (in_array(15, $data['permissions'])) {
            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/vuelo/vuelo', $data);
            echo view('layout/admin/footer');
        } else {
            echo view('layout/usuario/no_permisos');
        }
    }
    //  listar peticiones de vuelos
    public function listar_solicitudes()
    {
        $session = session();
        $userId = $session->get('idUsuario'); // Obtener el ID del usuario desde la sesión

        $permissions = $this->permisos->where('id_usuarios', $userId)->findAll();
        $data['permissions'] = array_column($permissions, 'id_permisos');

        if (in_array(12, $data['permissions'])) {
            $data['solicitudes'] = $this->v_reservas->findAll();
            echo view('layout/admin/head');
            echo view('layout/admin/nabvar');
            echo view('layout/admin/aside');
            echo view('layout/vuelo/solicitudes', $data);
            echo view('layout/admin/footer');
        } else {
            echo view('layout/usuario/no_permisos');
        }
    }
    // obtener mas detalles de la solicitud de velos
    public function getSolicitudDetails($id)
    {
        $solicitud = $this->v_reservas->find($id);
    
        if ($solicitud) {
            // Devuelve un array con los datos de la solicitud
            return $this->response->setJSON([
                'desde' => $solicitud['desde'],
                'fecha_ida' => $solicitud['fecha_ida'],
                'hacia' => $solicitud['hacia'],
                'fecha_regreso' => $solicitud['fecha_regreso'],
                'cantidad_pasajeros' => $solicitud['cantidad_pasajeros'],
                'estado' => $solicitud['estado']
            ]);
        } else {
            return $this->response->setJSON(['error' => 'Solicitud no encontrada']);
        }
    }
    

    // actualizar estado
    public function updateEstado()
    {
        $request = $this->request->getPost();
        // Actualizar el estado
        $result = $this->v_reservas->update($request['id'], ['estado' => $request['estado']]);

        if ($result) {
            $response = [
                'success' => true,
                'message' => 'Estado de solicitud actualizado correctamente.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Error al actualizar el estado de la solicitud.'
            ];
        }
        return $this->response->setJSON($response);
    }
    // Mostrar el formulario para agregar un nuevo vuelo
    public function create()
    {
        echo view('layout/admin/head');
        echo view('layout/admin/nabvar');
        echo view('layout/admin/aside');
        echo view('layout/vuelo/create');
        echo view('layout/admin/footer');
    }

    // Guardar un nuevo vuelo
    public function store()
    {
        $file = $this->request->getFile('imagen');
        if ($file->isValid() && !$file->hasMoved()) {
            $nombre = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $nombre);

            $data = ['nombre' => $nombre];
            $this->vueloModel->insert($data);

            return redirect()->to(base_url('/vuelo'))->with('success', 'Imagen subida correctamente');
        }
        return redirect()->back()->with('error', 'Error al subir la imagen');
    }

    public function delete($id)
    {
        $vuelo = $this->vueloModel->find($id);
        if ($vuelo) {
            $filePath = FCPATH . 'uploads/' . $vuelo['nombre'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $this->vueloModel->delete($id);
            return redirect()->to(base_url('/vuelo'))->with('success', 'Imagen eliminada correctamente');
        }
        return redirect()->back()->with('error', 'Error al eliminar la imagen');
    }

    // Mostrar el formulario para editar un vuelo
    // public function edit($id)
    // {
    //     $data['vuelo'] = $this->vueloModel->find($id);
    //     echo view('layout/admin/head');
    //     echo view('layout/admin/nabvar');
    //     echo view('layout/admin/aside');
    //     echo view('layout/vuelo/edit', $data);
    //     echo view('layout/admin/footer');
    // }

    // // Actualizar un vuelo
    // public function update($id)
    // {
    //     $data = [
    //         'origen' => $this->request->getPost('origen'),
    //         'destino' => $this->request->getPost('destino'),
    //         'fecha_salida' => $this->request->getPost('fecha_salida'),
    //         'hora_salida' => $this->request->getPost('hora_salida'),
    //         'duracion' => $this->request->getPost('duracion'),
    //         'precio' => $this->request->getPost('precio'),
    //     ];
    //     $this->vueloModel->update($id, $data);
    //     return redirect()->to('/vuelo')->with('success', 'Vuelo actualizado correctamente');
    // }

    // ver vuelos

    // creaer solicitud de vuelo
    public function guardarReserva()
    {
        // Verificar si la petición es AJAX
        if ($this->request->isAJAX()) {
            // Recibir los datos del formulario
            $desde = $this->request->getPost('desde');
            $fechaIda = $this->request->getPost('fecha_ida');
            $fechaRegreso = $this->request->getPost('fecha_regreso');
            $cantidad_pasajeros = $this->request->getPost('cantidad_pasajeros');
            $hacia = $this->request->getPost('hacia');
            $nombre = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $cedula = $this->request->getPost('cedula');
            $correo = $this->request->getPost('correo');
            $telefono = $this->request->getPost('telefono');

            $data = [
                'desde' =>  $desde,
                'fecha_ida' => $fechaIda,
                'fecha_regreso' => $fechaRegreso,
                'cantidad_pasajeros' => $cantidad_pasajeros,
                'hacia' => $hacia,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'cedula' => $cedula,
                'correo' => $correo,
                'telefono' => $telefono
            ];

            $result = $this->v_reservas->insert($data);
            // Verificar si la consulta se ejecutó correctamente
            if ($result) {
                // Si la inserción fue exitosa
                return $this->response->setJSON([
                    $this->sendSmsNotification('+57' . $telefono),
                    'success' => true
                ]);
            } else {
                // Si hubo un error al insertar los datos
                return $this->response->setJSON(['success' => false, 'error' => 'Error al guardar la reserva en la base de datos']);
            }
        } else {
            // Si no es una petición AJAX, redirigir o devolver un error
            return $this->response->setJSON(['success' => false, 'error' => 'Acceso no autorizado']);
        }
    }
    // enviar notificacion al telefono
    private function sendSmsNotification($to)
    {

        $sid = "AC3e55e342d023cce0fc5bce80b06d4121";
        $token = "f349d9d81d6859ca8b39c2980eca768f";
        $from = "+12622289140";
        $twilio = new Client($sid, $token);

        $messageBody = "Estimado/a,
         Un ejecutivo se contactará contigo para brindarte la información sobre tu viaje. 
         Recuerda que PLANEAR VOLAR es tu aliado #1. Debes estar pendiente a la llamada que se realizará.";

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
