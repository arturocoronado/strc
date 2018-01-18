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


Route::group(['prefix' => 'login'], function(){
    Route::post('/enter', 'LoginController@enter')->name('login.enter');
    Route::get('/out', 'LoginController@out')->name('login.out');
});


Route::group(['prefix' => 'usuarios'], function(){
    Route::get('/', 'UsuariosController@index')->name('usuarios.index');
    Route::get('/view/{id?}', 'UsuariosController@view')->name('usuarios.view');
    Route::post('/save/{user?}', 'UsuariosController@save')->name('usuarios.save');
    Route::get('/data', 'UsuariosController@data')->name('usuarios.data');
    Route::get('/delete/{id}', 'UsuariosController@delete')->name('usuarios.delete');
});

Route::group(['prefix' => 'catalogos'], function(){
   Route::get('puestos', 'PuestosController@index')->name('catalogos.puestos.index');
   Route::get('puestos/data', 'PuestosController@data')->name('catalogos.puestos.data');
   Route::get('puestos/form/{puesto?}', 'PuestosController@form')->name('catalogos.puestos.form');
   Route::post('puestos/save/{puesto?}', 'PuestosController@save')->name('catalogos.puestos.save');
   Route::get('puestos/delete/{puesto}', 'PuestosController@delete')->name('catalogos.puestos.delete');
   
   Route::get('dependencias', 'DependenciasController@index')->name('catalogos.dependencias.index');
   Route::get('dependencias/data', 'DependenciasController@data')->name('catalogos.dependencias.data');
   Route::get('dependencias/form/{dependencia?}', 'DependenciasController@form')->name('catalogos.dependencias.form');
   Route::post('dependencias/save/{dependencia?}', 'DependenciasController@save')->name('catalogos.dependencias.save');
   Route::get('dependencias/delete/{dependencia}', 'DependenciasController@delete')->name('catalogos.dependencia.delete');

   
});








