<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'uses'  => 'FrontController@index',
    'as'    => '/'
]);
Route::get('contact', [
    'uses'  => 'FrontController@contact',
    'as'    => 'contact'
]);

Route::resource('usuario', 'UsuarioController');

//grupo de rutas empleados
Route::group(['prefix' => 'empleado'], function(){

    //rutas comunes encargado, administrador

    //manipulacion de usuarios
    Route::resource('usuarios', 'UsuarioController', [
        'names' => [
            'index'     => 'empleado.usuarios',
            'create'    => 'empleado.usuarios.create',
            'store'     => 'empleado.usuarios.store',
            'edit'      => 'empleado.usuarios.edit',
            'update'    => 'empleado.usuarios.update',
        ]
    ]);
    Route::get('usuarios/destroy/{id}', [
        'uses'  => 'UsuarioController@destroy',
        'as'    => 'empleado.usuarios.destroy'
    ]);


    //manipulacion horarios
    Route::get('disponibilidad',function(){
        return view('encargado.disponibilidad.disponibilidad');
    });


    Route::group(['prefix' => 'admin'], function(){

        //rutas administrador

        //manipulacion noticas
        Route::resource('noticias', 'NoticiaController', [
            'names' => [
                'index'     => 'empleado.admin.noticias',
                'create'    => 'empleado.admin.noticias.create',
                'store'     => 'empleado.admin.noticias.store',
                'edit'      => 'empleado.admin.noticias.edit',
                'update'    => 'empleado.admin.noticias.update',
            ]
        ]);
        Route::get('noticias/destroy/{id}', [
            'uses'  => 'NoticiaController@destroy',
            'as'    => 'empleado.admin.noticias.destroy'
        ]);

    });

});