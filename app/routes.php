<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Administrador
Route::group(array('prefix' => 'admin'), function()
{
	// Login
	Route::get('login', 'AuthController@getLogin');
	Route::post('login', 'AuthController@postLogin');
    // Logout
    Route::get('logout', 'AuthController@getLogout');

	// Pantalla Bienvenida
	Route::get('/', 'AuthController@getWelcome');

    /**
     * Módulo de Clientes
     */
    Route::resource('clientes', 'ClienteController');
    // Busqueda
    Route::post('clientes/search', 'ClienteController@buscar');

    /*
        Módulo de Personal
    */
    Route::resource('personal', 'PersonalController');
    // Busqueda
    Route::post('personal/search', 'PersonalController@buscar');

    // Módulo de pagos
    Route::resource('pagos', 'PagoController');
});
