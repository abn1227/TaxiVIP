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
                'url' => 'control',
                'name' => 'Control de carreras',
                'description' => 'Visualice los vehículos disponibles y gestione las carreras solicitadas de una forma fácil y rápida.',
                'img'=>'carrera'
            ],
            [
                'url' => 'control',
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
                'img'=>'carrera'
            ]
        ];
        return $modules;
    }
}
