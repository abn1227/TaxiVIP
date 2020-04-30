<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class Admin extends Controller
{
    public function showHome()
    {
        $modules=$this->getModules();
        session()->forget('mensaje');
        return view('home-admin', compact('modules'));
    }
    private function getModules(){
        $modules = [
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
                'url' => 'control',
                'name' => 'Control de conductores',
                'description' => 'Visualice los conductores registrados en el sistema y toda la información requerida sobre vehículos y pagos.',
                'img'=>'taxista'
            ]
        ];
        return $modules;
    }

}
