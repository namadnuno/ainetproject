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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@index']);
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/perfil', [
        'as' => 'perfil.index',
        'uses' => 'PerfilController@index'
    ]);
    Route::get('/perfil/edit', [
        'as' => 'perfil.edit',
        'uses' => 'PerfilController@edit'
    ]);
    Route::put('/perfil', [
        'as' => 'perfil.update',
        'uses' => 'PerfilController@update'
    ]);

    Route::get('/requests', [
        'as' => 'requests.index',
        'uses' => 'RequestController@index'
    ]);

    Route::get('/requests/new', [
       'as' => 'requests.new',
        'uses' => 'RequestController@new'
    ]);

    Route::post('/requests/', [
       'as' => 'requests.store',
        'uses' => 'RequestController@store'
    ]);
});

Auth::routes();
