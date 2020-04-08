<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', 'Home@init')->name('home');
Route::get('/control', 'Home@control')->name('control');
/*
---------------------------------------------------------------------------
Rutas para la gestion de usuario
--------------------------------------------------------------------------- 
*/
Route::get('/form-create','User@showFormCreate')->name('form-create-user');
Route::get('/user', 'User@editUser')->name('user');
Route::post('/add-user', 'User@createUser')->name('add-user');
Route::put('/user/{id}', 'User@update')->name('update-user');
Route::get('/user/detail', 'User@seeData')->name('detail-user');

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
/*
---------------------------------------------------------------------------
Rutas para los controladores de administrador
--------------------------------------------------------------------------- 
*/
Route::get('/home-admin','Admin@showHome')->name('home-admin');
/*---------------------------------------------------------------------------
Rutas para los controladores de taxista
--------------------------------------------------------------------------- 
*/
Route::post('/new-taxi-driving','TaxiDriver@createTaxiDriving')->name('new-taxidriver');
Route::get('/taxi-driving','TaxiDriver@showAll')->name('show-taxidrivers');
Route::get('/show-taxi-driving/{id}','TaxiDriver@showTaxiDriver')->name('detail-taxidriver');
Route::get('/edit-taxi-driving/{id}','TaxiDriver@editTaxiDriver')->name('edit-taxidriver');
Route::put('/update-taxi-driving/{id}','TaxiDriver@updateTaxiDriver')->name('update-taxidriver');
//Route::get('/taxi-driver','Admin@showFormTaxiDriver')->name('form-taxi-driver');

/*
-------------------------------------------------------
Rutas para vehiculos
----------------------------------------------------
*/

Route::get('/', 'VehicleController@index')->name('carros');//visualizacion de los vehiculos existentes                                               
Route::get('/vehicles.detailVehicles/{id}', 'VehicleController@detailVehicle')->name('detailVehicles'); //detalle de informacion por vahiculo

Route::get('/vehicles.createVehicles', 'VehicleController@create')->name('create'); //Envia al formulario para crear vehiculos

Route::POST('/agregarar', 'VehicleController@insertVehicles')->name('insert.vehicles'); //Registra la informacion obtenida del formulario de crear vehiculos


Route::DELETE('/eliminar/{id}', 'VehicleController@deleteVehicle')->name('delete.vehicles'); //Elimina los registros del formulario ShowVehicles

Route::get('/vehicles.updateVehicles/{id}', 'VehicleController@upadateVehicles')->name('update.vehicles');

Route::put('/vehicles.updateVehicles/{id}', 'VehicleController@newVehicle')->name('new.vehicle');


