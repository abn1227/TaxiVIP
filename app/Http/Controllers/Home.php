<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{


    public function init(){
        $modules = $this->getModules();
        // session()->flush();
        session()->forget('mensaje');
        return view('home', compact('modules'));
    }

    public function control(){
        return view('control');
    }

    private function getModules(){
        $modules = [
            [
                'url' => 'order',
                'name' => 'Control de carreras',
                'description' => 'Gestione las solicitudes de servicios de taxi.',
                'img'=>'operador'
            ],
            [
                'url' => 'show-cut',
                'name' => 'Corte',
                'description' => 'Gestione el pago que debe de hacer el conductor.',
                'img'=>'corte'
            ],
            [
                'url' => 'form-create-user',
                'name' => 'Agregar Empleado',
                'description' => 'Agregue un nuevo empleado a planilla.',
                'img'=>'empleados'
            ],
            [
                'url' => 'show-taxidrivers',
                'name' => 'Control de conductores',
                'description' => 'Mostrar todos los conductores registrados en el sistema.',
                'img'=>'taxista'
            ],
            [
                'url' => 'addresses',
                'name' => 'Direcciones',
                'description' => 'Visualice las direcciones disponibles y agregue nuevas direcciones para el gestion de rutas.',
                'img'=>'mapa'
            ],
            [
                'url' => 'create-brand',
                'name' => 'Marcas y modelos',
                'description' => 'agregue marcas y modelos de auto a la base de datos de la empresa.',
                'img'=>'carrera'
            ],
            [
                'url' => 'employees',
                'name' => 'Control de empleados',
                'description' => 'Gestion de la informacion de los empleados agregados a la planilla.',
                'img'=>'control-empleados'
            ]
        ];
        return $modules;
    }
}
