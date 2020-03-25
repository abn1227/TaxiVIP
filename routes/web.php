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
Route::get('/user', 'User@seeData')->name('user');
Route::post('/add-user', 'User@createUser')->name('add-user');
Route::put('/user/{id}', 'User@update')->name('update-user');

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