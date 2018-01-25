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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', 'LoginController@index')->name('login.index');


Route::group(['prefix' => 'login'], function() {
    Route::post('/enter', 'LoginController@enter')->name('login.enter');
    Route::get('/out', 'LoginController@out')->name('login.out');
});


Route::group(['prefix' => 'usuarios'], function() {
    Route::get('/', 'UsuariosController@index')->name('usuarios.index');
    Route::get('/view/{id?}', 'UsuariosController@view')->name('usuarios.view');
    Route::post('/save/{user?}', 'UsuariosController@save')->name('usuarios.save');
    Route::get('/data', 'UsuariosController@data')->name('usuarios.data');
    Route::get('/delete/{id}', 'UsuariosController@delete')->name('usuarios.delete');
});

Route::group(['prefix' => 'catalogos'], function() {
    Route::get('puestos', 'PuestosController@index')->name('catalogos.puestos.index');
    Route::get('puestos/data', 'PuestosController@data')->name('catalogos.puestos.data');
    Route::get('puestos/form/{puesto?}', 'PuestosController@form')->name('catalogos.puestos.form');
    Route::post('puestos/save/{puesto?}', 'PuestosController@save')->name('catalogos.puestos.save');
    Route::get('puestos/delete/{puesto}', 'PuestosController@delete')->name('catalogos.puestos.delete');

    Route::get('entes', 'EntesController@index')->name('catalogos.entes.index');
    Route::get('entes/data', 'EntesController@data')->name('catalogos.entes.data');
    Route::get('entes/form/{ente?}', 'EntesController@form')->name('catalogos.entes.form');
    Route::post('entes/save/{ente?}', 'EntesController@save')->name('catalogos.entes.save');
    Route::get('entes/delete/{ente}', 'EntesController@delete')->name('catalogos.entes.delete');

    Route::get('fracciones', 'FraccionesController@index')->name('catalogos.fracciones.index');
    Route::get('fracciones/data', 'FraccionesController@data')->name('catalogos.fracciones.data');
    Route::get('fracciones/form/{fraccion?}', 'FraccionesController@form')->name('catalogos.fracciones.form');
    Route::post('fracciones/save/{fraccion?}', 'FraccionesController@save')->name('catalogos.fracciones.save');
    Route::get('fracciones/delete/{fraccion}', 'FraccionesController@delete')->name('catalogos.fracciones.delete');
});

Route::group(['prefix' => 'padron'], function() {
    Route::get('prorrogas', 'ProrrogasController@index')->name('padron.prorrogas.index');
    Route::get('prorrogas/data', 'ProrrogasController@data')->name('padron.prorrogas.data');
    Route::get('prorrogas/form/{prorroga?}', 'ProrrogasController@form')->name('catalogos.prorrogas.form');
    Route::post('prorrogas/save/{prorroga?}', 'ProrrogasController@save')->name('catalogos.prorrogas.save');
    Route::get('prorrogas/delete/{prorroga}', 'ProrrogasController@delete')->name('catalogos.prorrogas.delete');    
});

Route::group(['prefix' => 'config'], function() {
    Route::get('opciones', 'ParametrosController@index')->name('config.parametros.index');
    Route::get('opciones/data', 'ParametrosController@data')->name('config.parametros.data');
    Route::post('opciones/save/{opcion?}', 'ParametrosController@save')->name('config.parametros.save');
    Route::post('opciones/save_manual', 'ParametrosController@savemanual')->name('config.parametros.savemanual');
    Route::post('opciones/savelogogob', 'ParametrosController@savelogogob')->name('config.parametros.savelogogob');
    Route::post('opciones/savelogodep', 'ParametrosController@savelogodep')->name('config.parametros.savelogodep');
    Route::get('opciones/edit', 'ParametrosController@edit')->name('config.parametros.edit');
    
    Route::get('calendario', 'CalendarController@index')->name('config.calendar.index');
    Route::get('calendario/load', 'CalendarController@load')->name('config.calendar.load');
    Route::get('calendario/save', 'CalendarController@save')->name('config.calendar.save');
    Route::get('calendario/del', 'CalendarController@del')->name('config.calendar.del');
});








