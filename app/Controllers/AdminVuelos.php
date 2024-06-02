<?php

namespace App\Controllers;

use App\Models\VuelosModel;
use App\Models\DetallespermisosModel;

class AdminVuelos extends BaseController
{
    protected $vueloModel, $permisos;

    public function __construct()
    {
        $this->vueloModel = new VuelosModel();
        $this->permisos = new DetallespermisosModel();
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
        $data = [
            'origen' => $this->request->getPost('origen'),
            'destino' => $this->request->getPost('destino'),
            'fecha_salida' => $this->request->getPost('fecha_salida'),
            'hora_salida' => $this->request->getPost('hora_salida'),
            'duracion' => $this->request->getPost('duracion'),
            'precio' => $this->request->getPost('precio'),
        ];
        $this->vueloModel->save($data);
        return redirect()->to('/vuelo')->with('success', 'Vuelo agregado correctamente');
    }

    // Mostrar el formulario para editar un vuelo
    public function edit($id)
    {
        $data['vuelo'] = $this->vueloModel->find($id);
        echo view('layout/admin/head');
        echo view('layout/admin/nabvar');
        echo view('layout/admin/aside');
        echo view('layout/vuelo/edit', $data);
        echo view('layout/admin/footer');
    }

    // Actualizar un vuelo
    public function update($id)
    {
        $data = [
            'origen' => $this->request->getPost('origen'),
            'destino' => $this->request->getPost('destino'),
            'fecha_salida' => $this->request->getPost('fecha_salida'),
            'hora_salida' => $this->request->getPost('hora_salida'),
            'duracion' => $this->request->getPost('duracion'),
            'precio' => $this->request->getPost('precio'),
        ];
        $this->vueloModel->update($id, $data);
        return redirect()->to('/vuelo')->with('success', 'Vuelo actualizado correctamente');
    }

    // Eliminar un vuelo
    public function delete($id)
    {
        $this->vueloModel->delete($id);
        return redirect()->to('/vuelo')->with('success', 'Vuelo eliminado correctamente');
    }
    // ver vuelos
    public function show($id)
    {
        $data['vuelo'] = $this->vueloModel->find($id);

        echo view('layout/admin/head');
        echo view('layout/admin/nabvar');
        echo view('layout/admin/aside');
        echo view('layout/vuelo/show', $data);
        echo view('layout/admin/footer');
    }
}
