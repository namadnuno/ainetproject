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

Route::get('/departments', ['as' => 'departmentsAsGuest', 'uses' => 'DepartmentController@indexAsGuest']);

Route::get('/contacts', ['as' => 'contacts.index', 'uses' => 'UserController@indexAsGuest']);

Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@index']);
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

Route::get('/request-file/{request}', 'FileController@getFile')->name('getFile');
Route::get('/request-file/{request}/download', 'FileController@downloadFile')->name('downloadFile');

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/perfil', [
        'as' => 'perfil.index',
        'uses' => 'PerfilController@index'
    ]);
    Route::get('/perfil/edit', [
        'as' => 'perfil.edit',
        'uses' => 'PerfilController@edit'
    ]);
    Route::post('/perfil/create', [
        'as' => 'perfil.storeAsAdmin',
        'uses' => 'PerfilController@storeAsAdmin'
    ]);
    Route::put('/perfil', [
        'as' => 'perfil.update',
        'uses' => 'PerfilController@update'
    ]);

    Route::resource('requests', 'RequestController');

    Route::resource('departments', 'DepartmentController');

    Route::resource('printers', 'PrinterController');

    Route::get('requests/{request}/refuse', [
        'as' => 'requests.refuse',
        'uses' => 'RequestController@refuse'
    ]);

    Route::post('requests/{request}/refused', [
        'as' => 'requests.refused',
        'uses' => 'RequestController@refused'
    ]);

    Route::get('requests/{request}/finish', [
        'as' => 'requests.finish',
        'uses' => 'RequestController@finish'
    ]);

    Route::post('request/{request}/finish', [
        'as' => 'requests.done',
        'uses' => 'RequestController@done'
    ]);

    Route::put('request/{request}/finish', [
        'as' => 'requests.evaluate',
        'uses' => 'RequestController@evaluate'
    ]);

    Route::get('request/{request}/report', [
        'as' => 'request.report',
        'uses' => 'RequestController@report'
    ]);

    Route::get('requests/{request}/readmit', [
        'as' => 'requests.readmit',
        'uses' => 'RequestController@readmit'
    ]);

    
    Route::resource('users', 'UserController', ['only' => [
        'index', 'show', 'destroy', 'create']]);

    Route::put('/users/change', ['as' => 'user.change', 'uses' => 'UserController@change']);
    
    Route::put('/comments/change', ['as' => 'comments.change', 'uses' => 'CommentController@change']);
});

Route::resource('comments', 'CommentController', ['except' => [
    'create'
]]);


Auth::routes();
