<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Home extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function init(){
        $modules = $this->getModules();
        session()->forget('mensaje');
        return view('home', compact('modules'));
    }

    public function control(){
        return view('control');
    }

    private function getModules(){
        $user = Auth::user();
        if ($user->type_users_id=='1') {
            $modules = [
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
                    'url' => 'addresses',
                    'name' => 'Direcciones',
                    'description' => 'Visualice las direcciones disponibles y agregue nuevas direcciones para el gestión de rutas.',
                    'img'=>'mapa'
                ],
                [
                    'url' => 'create-brand',
                    'name' => 'Marcas y modelos',
                    'description' => 'Agregue marcas y modelos de auto a la base de datos de la empresa.',
                    'img'=>'carrera'
                ],
                [
                    'url' => 'employees',
                    'name' => 'Control de empleados',
                    'description' => 'Gestión de la información de los empleados agregados a la planilla.',
                    'img'=>'control-empleados'
                ]
            ];
        }
        if ($user->type_users_id=='2') {
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
                ]
            ];
        }
        if ($user->type_users_id=='3') {
            $modules = [
                             
                [
                    'url' => 'show-taxidrivers',
                    'name' => 'Control de conductores',
                    'description' => 'Mostrar todos los conductores registrados en el sistema.',
                    'img'=>'taxista'
                ]
            ];
        }
        return $modules;
    }
}
