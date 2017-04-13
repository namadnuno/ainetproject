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
    Route::get('/perfil/update', [
        'as' => 'perfil.update',
        'uses' => 'PerfilController@update'
        ]);
});

Auth::routes();
