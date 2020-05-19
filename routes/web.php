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

Route::get('/', 'Home@init')->name('home');
Route::get('/control', 'Home@init')->name('control');
Route::get('/address/routes', 'route@showRoute')->name('show-route');
Route::get('/address', 'Address@init')->name('addresses');
Route::get('/address/route', 'Route@init')->name('route');
Route::post('/address/save','Address@save')->name('save-addresses');
Route::post('/address/availability','Address@availability')->name('availability');
Route::post('/address/save-route','Route@save')->name('save-route');
Route::get('/address/neighborhood/{id}', 'Address@showNeighborhood')->name('neighborhoods');
Route::get('/address/neighborhood/edit/{id}', 'Address@edit')->name('edit-neighborhoods');
Route::put('/address/neighborhood/update/{id}', 'Address@update')->name('update-neighborhoods');
/*
---------------------------------------------------------------------------
Rutas para la gestion de usuario
---------------------------------------------------------------------------
*/
Route::get('/form-create','User@showFormCreate')->name('form-create-user');
Route::get('/user', 'User@editUser')->name('user');
Route::get('/add-user', 'User@showFormCreateId')->name('add-user');//Ruta creada para evitar fallo despues de la validacion
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
---------------------------------------------------------------------------------------------
Rutas para vehiculos
---------------------------------------------------------------------------------------------
*/


Route::post('/vehicles-create-vehicles/{id}', 'VehicleController@newVehicle')->name('create-vehicle');
Route::POST('/add-vehicle', 'VehicleController@insertVehicles')->name('insert.vehicles'); //Registra la informacion obtenida del formulario de crear vehiculos
Route::DELETE('/delete-vehicle/{id}', 'VehicleController@deleteVehicle')->name('delete-vehicle'); //Elimina los registros del formulario ShowVehicles
Route::put('/vehicles-update-vehicles/{id}', 'VehicleController@updateVehicles')->name('update-vehicle');
/*---------------------------------------------------------------------------
Rutas para los controladores de marca y modelo
---------------------------------------------------------------------------
*/

Route::get('/vehicle/brand-form', 'CarBrand@init')->name('create-brand');
Route::get('/vehicle/brand-edit/{id}', 'CarBrand@edit')->name('edit-brand');
Route::put('/vehicle/brand-update/{id}', 'CarBrand@update')->name('update-brand');
Route::get('/vehicle/brand', 'CarBrand@showBrand')->name('show-brand');
Route::post('/vehicle/brand-save', 'CarBrand@save')->name('brand-save');
Route::get('/vehicle/model-form', 'CarModel@init')->name('create-model');
Route::get('/vehicle/model-edit/{id}', 'CarModel@edit')->name('edit-model');
Route::put('/vehicle/model-update/{id}', 'CarModel@update')->name('update-model');
Route::post('/vehicle/model-save', 'CarModel@save')->name('model-save');
Route::get('/vehicle/model', 'CarModel@showModel')->name('show-model');
//-------------------------------------------------------------------------------------------------
//Rutas para gestionar empleados
//-------------------------------------------------------------------------------------------------
Route::get('/users/employees','Employees@getEmployees')->name('employees');
Route::get('/users/employees/edit/{id}','Employees@editEmployees')->name('edit-employees');
Route::put('/users/employees/update/{id}','Employees@updateEmployees')->name('update-employees');
//-------------------------------------------------------------------------------------------------
//Rutas para gestionar la creacion de ordenes
//-------------------------------------------------------------------------------------------------

Route::get('/address/order', 'Order@init')->name('order');
Route::get('/address/pending-order', 'Order@pendingOrders')->name('pending');
Route::post('/address/order-save','Order@save')->name('save-order');
Route::put('/address/order-update/{id}','Order@update')->name('update-order');
Route::put('/address/order-taxidriver-status/{id}', 'Order@status')->name('status');
Route::get('/address/order-taxidriver-active', 'Order@inactive')->name('inactive');
//-------------------------------------------------------------------------------------------------
//Rutas para gestionar la creacion de ordenes
//-------------------------------------------------------------------------------------------------
Route::get('/cut/show', 'CorteController@init')->name('show-cut');
Route::put('/cut/show', 'CorteController@')->name('do-cut');
