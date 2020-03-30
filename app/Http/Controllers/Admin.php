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
                'name' => 'Vehículos',
                'description' => 'Visualice los vehículos disponibles y acceda a toda la infomacion requerida.',
                'img'=>'carrera'
            ]
        ];
        return $modules;
    }
    
}
