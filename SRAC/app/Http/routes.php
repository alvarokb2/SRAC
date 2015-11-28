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


//rutas usuario no autenticado
Route::get('/', [
    'uses'  => 'FrontController@index',
    'as'    => '/'
]);
Route::get('contact', [
    'uses'  => 'FrontController@contact',
    'as'    => 'contact'
]);

Route::get('test', [
    'uses'  => 'FrontController@test',
    'as'    => 'test'
]);


//rutas autenticacion
Route::resource('login', 'LoginController');
Route::get('logout', [
    'uses'  => 'LoginController@Logout',
    'as'    => 'logout'
]);


Route::resource('usuario', 'UsuarioController');


//grupo de rutas clientes

Route::group(['prefix' => 'cliente'], function(){

    //rutas comunes cliente, socio

    Route::resource('reserva', 'ReservaController', [
        'names' => [
            'index'     => 'cliente.reservas',
            'create'    => 'cliente.reservas.create',
            'store'     => 'cliente.reservas.store',
        ]
    ]);
/*
    Route::get('reserva/historial', [
        'uses'  => 'ReservaController@index',
        'as'    => 'cliente.reservas.historial'
    ]);
*/

    //rutas socio

    Route::group(['prefix' => 'socio'], function(){

        Route::get('noticias',[
            'uses'  => 'NoticiaController@socioNoticias',
            'as'    => 'cliente.socio.noticias'
        ]);
    });
});



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
    Route::get('disponibilidad', [
        'uses'  => 'FrontController@disponibilidad',
        'as'    => 'empleado.disponibilidad'
    ]);

    Route::resource('reserva', 'ReservaController', [
        'names' => [
            'index'     => 'empleado.reservas',
            'create'    => 'empleado.reservas.create',
            'store'     => 'empleado.reservas.store',
            'show'      => 'empleado.reservas.show',
            'edit'      => 'empleado.reservas.edit',
            'update'    => 'empleado.reservas.update'
            ]
        ]);


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