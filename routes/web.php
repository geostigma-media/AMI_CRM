<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
  if (Auth::check()) {
    return redirect('/home');
  } else {
    return view('auth.login');
  }
});
Route::get('/registro', 'RegisterPublicController@index')->name('registerPublic');
Route::post('/registro/crear', 'RegisterPublicController@store')->name('createPublic');

Route::get('/contrato', 'ContractController@contract')->name('contract');
Route::post('/contrato_pago', 'ContractController@contractPay')->name('contractPay');

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
  Route::get('/home', 'HomeController@index')->name('home');
  Route::post('/envio_pago', 'HomeController@sendinfopay')->name('sendinfopay');
  Route::get('/logout',  'Auth\LoginController@logout')->name('logout');
  Route::get('/clientes',  'ClientsController@index')->name('clients');
  Route::get('/seguimiento/{id}',  'ClientsController@tracing')->name('tracing');
  Route::post('/seguimiento/crear',  'ClientsController@storeTracing')->name('storeTracing');
  Route::get('/loadClients/{id}',  'HomeController@loadClient')->name('loadClient');
  Route::get('/loadClientSendEmail/{id}',  'HomeController@loadClientSendEmail')->name('loadClientSendEmail');
  Route::get('/loadClientSendEmail/{id}',  'HomeController@loadClientSendEmail2')->name('loadClientSendEmail2');
  Route::post('/clientes/crear', 'ClientsController@store')->name('createClient');
  Route::get('/correo/template/{id}', 'EmailsController@loadTemplate')->name('loadTemplate');


  Route::group(['middleware' => ['admin']], function () {
    //EMIALS
    Route::get('/correos', 'EmailsController@index')->name('emails');
    Route::post('/correos/crear', 'EmailsController@store')->name('store');
    Route::get('/editar_plantilla/{id}', 'EmailsController@editPlantilla')->name('editPlantilla');
    Route::put('/actualziar_plantilla/{id}', 'EmailsController@updatePlantilla')->name('updatePlantilla');
    Route::delete('/correo/{id}', 'EmailsController@destroy')->name('deleteEmail');

    //CONTRATOS
    Route::get('/contratos', 'ContractController@index')->name('contracs');
    Route::post('/contratos/crear', 'ContractController@store')->name('contracsStore');
    Route::get('/contrato/{id}', 'ContractController@editContract')->name('editContract');
    Route::put('/contrato/editar/{id}', 'ContractController@updateContract')->name('updateContract');
    Route::delete('/contrato/eliminar/{id}', 'ContractController@destroy')->name('deleteContract');

    //CLIENTES
    Route::put('/pago/{id}', 'HomeController@paySuccess')->name('paySuccess');
    Route::get('/clientes/editar/{id}',  'ClientsController@edit')->name('clientsEdit');
    Route::put('/clientes/update/{id}',  'ClientsController@updateCliente')->name('updateCliente');
    Route::get('/clientes/contrato/{id}',  'ClientsController@dowloadContract')->name('dowloadContract');
    Route::delete('/clientes/eliminar/{id}',  'ClientsController@delete')->name('deleteClient');

    //ASESOR
    Route::get('/asesores', 'AsesorController@index')->name('asesors');
    Route::post('/asesor/crear', 'AsesorController@store')->name('asesorStore');
    Route::get('/asesor/{id}', 'AsesorController@editAsesor')->name('editAsesor');
    Route::put('/asesor/editar/{id}', 'AsesorController@updateAsesor')->name('updateAsesor');
    Route::put('/asesor/desactivar/{id}', 'AsesorController@disabledAsesor')->name('disabledAsesor');

    //SEGUIMIENTO
    Route::delete('/segimiento/{id}', 'ClientsController@deleteTracing')->name('deleteTracing');

    //TAREAS
    Route::get('/tareas', 'TaskController@index')->name('task');
    Route::post('/tarea/crear', 'TaskController@store')->name('createTask');
    Route::get('/tarea/{id}', 'TaskController@edit')->name('editTask');
    Route::put('/tarea/editar/{id}', 'TaskController@update')->name('updateTask');
    Route::delete('/tarea/{id}', 'TaskController@delete')->name('deleteTask');

    //EXCEL
    Route::get('/clientes/excel', 'ClientsController@loadExcel')->name('loadExcel');
  });
});
