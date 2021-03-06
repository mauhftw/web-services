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

// Nos mostrará el formulario de login.
Route::get('login', 'AuthController@showLogin');

// Validamos los datos de inicio de sesión.
Route::post('login', 'AuthController@postLogin');

// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function()
{
    // Esta será nuestra ruta de bienvenida.
    Route::get('/', function()
    {
        return View::make('hello');
    });
Route::get('list_zones/createRecord/{id}', 'dnsController@createRecord');
//Route::post('list_zones/storeRecord/{id}', 'dnsController@storeRecord');
Route::resource('list_zones', 'dnsController');
Route::resource('add_master', 'masterController');
Route::resource('list_domains', 'mailController');
Route::resource('list_mailbox', 'mailboxController');	
Route::resource('add_slave', 'slaveController');	
    // Esta ruta nos servirá para cerrar sesión.
    Route::get('logout', 'AuthController@logOut');
});




