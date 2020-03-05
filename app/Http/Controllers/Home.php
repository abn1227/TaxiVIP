<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{


    public function init(){
        $modules = $this->getModules();
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
                'description' => 'Visualice los vehículos disponibles y gestione las carreras solicitadas de una forma fácil y rápida.'
            ],
            [
                'url' => 'control',
                'name' => 'Control de conductores',
                'description' => 'Visualice los conductores registrados en el sistema y toda la información requerida sobre vehículos y pagos.'
            ],
            [
                'url' => 'control',
                'name' => 'Control de carreras',
                'description' => 'Visualice los vehículos disponibles y gestione las carreras solicitadas de una forma fácil y rápida.'
            ]
        ];
        return $modules;
    }
}
