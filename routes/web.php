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
	//Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	//Para CRUD
	Route::resource('usuario','UsuarioController');
    Route::get('comerciofixo/semanal', ['as' => 'comerciofixo.semanal', 'uses' => 'ComercioFixoController@semanal']);
    Route::resource('comerciofixo','ComercioFixoController');
    Route::resource('noturno', 'NoturnoController');
    //Route::get('noturno', ['as' => 'noturno.index', 'uses' => 'NoturnoController@semanal']);
    Route::resource('feira_livre','LivreController');
    Route::resource('comercio_ambulante', 'ComercioAmbulanteController');
    Route::resource('nivel','NivelController');
	//Para API
    Route::post('api/comerciofixo', ['as' => 'api.fixo', 'uses' => 'ComercioFixoController@semanalApi']);
    Route::post('api/noturno', ['as' => 'api.note', 'uses' => 'NoturnoController@semanalApi']);
    Route::post('api/comercio_ambulante', ['as' => 'api.ambulante', 'uses' => 'ComercioAmbulanteController@semanalApi']);
});

