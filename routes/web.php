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
Route::view('/', 'welcome')->name('welcome');

Route::get('/home', 'Home@init')->name('home');
Route::get('/logout','Auth\LoginController@logout');
Route::get('/control', 'Home@init')->name('control');

Route::get('/address/routes', 'Route@showRoute')->name('show-route')->middleware('auth','manager');
Route::get('/address', 'Address@init')->name('addresses')->middleware('auth','manager');
Route::get('/address/route', 'Route@init')->name('route')->middleware('auth','manager');
Route::post('/address/save','Address@save')->name('save-addresses')->middleware('auth','manager');
Route::post('/address/availability','Address@availability')->name('availability')->middleware('auth','receptionist');
Route::post('/address/save-route','Route@save')->name('save-route')->middleware('auth','manager');
Route::get('/address/neighborhood/{id}', 'Address@showNeighborhood')->name('neighborhoods')->middleware('auth','manager');
Route::get('/address/neighborhood/edit/{id}', 'Address@edit')->name('edit-neighborhoods')->middleware('auth','manager');
Route::put('/address/neighborhood/update/{id}', 'Address@update')->name('update-neighborhoods')->middleware('auth','manager');
/*
---------------------------------------------------------------------------
Rutas para la gestion de usuario
---------------------------------------------------------------------------
*/
Route::get('/form-create','User@showFormCreate')->name('form-create-user')->middleware('auth','shared');
Route::get('/user', 'User@editUser')->name('user');
Route::get('/add-user', 'User@showFormCreateId')->name('add-user')->middleware('auth','shared');//Ruta creada para evitar fallo despues de la validacion
Route::post('/add-user', 'User@createUser')->name('add-user')->middleware('auth','shared');
Route::put('/user/{id}', 'User@update')->name('update-user')->middleware('auth');
Route::get('/user/detail', 'User@seeData')->name('detail-user')->middleware('auth');

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
/*

/*---------------------------------------------------------------------------
Rutas para los controladores de taxista
---------------------------------------------------------------------------
*/
Route::post('/new-taxi-driving','TaxiDriver@createTaxiDriving')->name('new-taxidriver')->middleware('auth', 'manager');
Route::get('/taxi-driving','TaxiDriver@showAll')->name('show-taxidrivers')->middleware('auth','receptionist');
Route::get('/show-taxi-driving/{id}','TaxiDriver@showTaxiDriver')->name('detail-taxidriver')->middleware('auth','receptionist');
Route::get('/edit-taxi-driving/{id}','TaxiDriver@editTaxiDriver')->name('edit-taxidriver')->middleware('auth','receptionist');
Route::put('/update-taxi-driving/{id}','TaxiDriver@updateTaxiDriver')->name('update-taxidriver')->middleware('auth','receptionist');

/*
---------------------------------------------------------------------------------------------
Rutas para vehiculos
---------------------------------------------------------------------------------------------
*/
Route::post('/vehicles-create-vehicles/{id}', 'VehicleController@newVehicle')->name('create-vehicle')->middleware('auth','receptionist');
Route::POST('/add-vehicle', 'VehicleController@insertVehicles')->name('insert.vehicles')->middleware('auth','receptionist'); 
Route::put('/vehicles-update-vehicles/{id}', 'VehicleController@updateVehicles')->name('update-vehicle')->middleware('auth','receptionist');
/*---------------------------------------------------------------------------
Rutas para los controladores de marca y modelo
---------------------------------------------------------------------------
*/

Route::get('/vehicle/brand-form', 'CarBrand@init')->name('create-brand')->middleware('auth','manager');
Route::get('/vehicle/brand-edit/{id}', 'CarBrand@edit')->name('edit-brand')->middleware('auth','manager');
Route::put('/vehicle/brand-update/{id}', 'CarBrand@update')->name('update-brand')->middleware('auth','manager');
Route::get('/vehicle/brand', 'CarBrand@showBrand')->name('show-brand')->middleware('auth','manager');
Route::post('/vehicle/brand-save', 'CarBrand@save')->name('brand-save')->middleware('auth','manager');
Route::get('/vehicle/model-form', 'CarModel@init')->name('create-model')->middleware('auth','manager');
Route::get('/vehicle/model-edit/{id}', 'CarModel@edit')->name('edit-model')->middleware('auth','manager');
Route::put('/vehicle/model-update/{id}', 'CarModel@update')->name('update-model')->middleware('auth','manager');
Route::post('/vehicle/model-save', 'CarModel@save')->name('model-save')->middleware('auth','manager');
Route::get('/vehicle/model', 'CarModel@showModel')->name('show-model')->middleware('auth','manager');
//-------------------------------------------------------------------------------------------------
//Rutas para gestionar empleados
//-------------------------------------------------------------------------------------------------
Route::get('/users/employees','Employees@getEmployees')->name('employees')->middleware('auth','manager');
Route::get('/users/employees/edit/{id}','Employees@editEmployees')->name('edit-employees')->middleware('auth','manager');
Route::put('/users/employees/update/{id}','Employees@updateEmployees')->name('update-employees')->middleware('auth','manager');
//-------------------------------------------------------------------------------------------------
//Rutas para gestionar la creacion de ordenes
//-------------------------------------------------------------------------------------------------

Route::get('/address/order', 'Order@init')->name('order')->middleware('auth','receptionist');
Route::get('/address/pending-order', 'Order@pendingOrders')->name('pending')->middleware('auth','receptionist');
Route::post('/address/order-save','Order@save')->name('save-order')->middleware('auth','receptionist');
Route::put('/address/order-update/{id}','Order@update')->name('update-order')->middleware('auth','receptionist');
Route::put('/address/order-taxidriver-status/{id}', 'Order@status')->name('status')->middleware('auth','receptionist');
Route::get('/address/order-taxidriver-active', 'Order@inactive')->name('inactive')->middleware('auth','receptionist');
Route::get('/address/order/history', 'Order@orders')->name('history')->middleware('auth','receptionist');
Route::get('/address/order/history/{id}', 'Order@show')->name('detail-history');
//-------------------------------------------------------------------------------------------------
//Rutas para gestionar la creacion de ordenes
//-------------------------------------------------------------------------------------------------
Route::get('/cut/show', 'CorteController@init')->name('show-cut')->middleware('auth','shared');
Route::put('/cut/show/{id}', 'CorteController@doCut')->name('do-cut')->middleware('auth','shared');

//-------------------------------------------------------------------------------------------------
//Rutas para gestionar los historiales del conductor
//-------------------------------------------------------------------------------------------------

