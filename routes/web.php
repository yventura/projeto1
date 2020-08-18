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

	Route::get('laudo/adicionar', function () {
		return view('users.create');
	})->name('laudo/adicionar');

				 /* Fim - Rotas Pagina Laudos           */
				 /* Começo - Rotas Crud       */    
	Route::get('usuario/adicionar', function () {
		return view('usuario.add');
	})->name('usuario/adicionar');

				 /* Fim - Rotas Crud           */
				/* Começo - Rotas Pagina Relatorios     */
    Route::get('page/relatorios', function () {
		return view('pages.relatorios');
	})->name('page/relatorios');
	            /* Fim - Rotas Pagina Relatorios        */ 
});




Route::group(['middleware' => 'auth'], function () {
	//Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	//Para CRUD
	Route::resource('laudos', 'LaudoController');
	Route::resource('equipamentos', 'EquipamentoController');
	Route::resource('usuario','TesteController');
	//Para API
	//Route::get('teste', 'LaudoController@index');
});

