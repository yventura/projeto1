<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');
});

Route::group(['middleware' => 'auth'], function () {

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	//Para CRUD

        // Rota Usuarios
	Route::resource('usuario','UsersController');

        // Rota Comercio Fixo
    Route::resource('comerciofixo','ComercioFixoController');
    Route::get('relatorio/comercio_fixo', ['as' => 'comerciofixo.createPDF', 'uses' => 'ComercioFixoController@createPDF']);
    Route::post('relatorio/comercio_fixo', ['as' => 'comerciofixo.createPDF', 'uses' => 'ComercioFixoController@createPDF']);
    Route::post('api/comerciofixo', ['as' => 'api.fixo', 'uses' => 'ComercioFixoController@semanalApi']);

        //  Rota Noturno
    Route::resource('noturno', 'NoturnoController');
    Route::get('relatorio/noturno', ['as' => 'noturno.createPDF', 'uses' => 'NoturnoController@createPDF']);
    Route::post('relatorio/noturno', ['as' => 'noturno.createPDF', 'uses' => 'NoturnoController@createPDF']);
    Route::post('api/noturno', ['as' => 'api.note', 'uses' => 'NoturnoController@semanalApi']);

        //  Rota Feira livre
    Route::resource('feira_livre','LivreController');
    Route::get('relatorio/feira_livre', ['as' => 'livre.createPDF', 'uses' => 'LivreController@createPDF']);
    Route::post('relatorio/feira_livre', ['as' => 'livre.createPDF', 'uses' => 'LivreController@createPDF']);
    Route::post('api/feira_livre', ['as' => 'api.livre', 'uses' => 'livreController@semanalApi']);

        //  Rota Comercio Ambulante
    Route::resource('comercio_ambulante', 'ComercioAmbulanteController');
    Route::get('relatorio/comercio_ambulante', ['as' => 'comercio_ambulante.createPDF', 'uses' => 'ComercioAmbulanteController@createPDF']);
    Route::post('relatorio/comercio_ambulante', ['as' => 'comercio_ambulante.createPDF', 'uses' => 'ComercioAmbulanteController@createPDF']);
    Route::post('api/comercio_ambulante', ['as' => 'api.ambulante', 'uses' => 'ComercioAmbulanteController@semanalApi']);

        // Rota Niveis
    Route::resource('nivel','NivelController');
});

