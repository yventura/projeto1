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

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	// UPGRADE -> VIEW 
	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');


	             /* Yuri                                */
                 /* Começo - Rotas Pagina Laudos        */

	Route::get('laudos/index', function () {
		return view('laudos.index');
	})->name('laudos/index');

	Route::get('laudos/envia', function () {
		return view('laudos.envia');
	})->name('laudos/envia');
     
	Route::get('laudo/adicionar', function () {
		return view('laudos.add');
	})->name('laudo/adicionar');

				 /* Fim - Rotas Pagina Laudos           */
				/* Começo - Rotas Pagina Relatorios     */
    Route::get('page/relatorios', function () {
		return view('pages.relatorios');
	})->name('page/relatorios');
	            /* Fim - Rotas Pagina Relatorios        */ 
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	//Para CRUD
	Route::resource('laudos', 'LaudoController');
	Route::resource('equipamentos', 'EquipamentoController');
	//Para API
	//Route::get('teste', 'LaudoController@index');
});

