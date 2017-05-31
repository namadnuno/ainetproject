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

use App\Http\Middleware\BlockedUser;

Route::get('/', 'HomeController@index')->name('home');

Route::get('/blocked', 'HomeController@blocked')->name('blocked');


Route::get('/departments', ['as' => 'departmentsAsGuest', 'uses' => 'DepartmentController@indexAsGuest']);

Route::get('/departments/{department}', 'DepartmentController@show')->name('departments.show');

Route::get('/contacts', 'UserController@indexAsGuest')->name('contacts.index');

Route::get('/login', 'Auth\LoginController@index')->name('login');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::post('/activate', 'ActivationController@activate')->name('activate');

Route::get('/not-activated/{token?}', 'ActivationController@notActivated')->name('not-activated');

Route::get('/send-activation', 'ActivationController@send')->name('activate.send');

Route::group(['middleware' => ['auth', 'user.blocked', 'user.ativated'], 'prefix' => 'dashboard'], function () {

    Route::get('/request-file/{request}', 'FileController@getFile')->name('getFile');

    Route::get('/request-file/{request}/download', 'FileController@downloadFile')->name('downloadFile');

    Route::get('/perfil', 'PerfilController@index')->name('perfil.index');

    Route::get('/perfil/edit', 'PerfilController@edit')->name('perfil.edit');

    Route::post('/perfil/create', 'PerfilController@storeAsAdmin')->name('perfil.storeAsAdmin');

    Route::put('/perfil', 'PerfilController@update')->name('perfil.update');
    
    Route::resource('requests', 'RequestController');

    Route::resource('departments', 'DepartmentController', ['except' => ['show']]);

    Route::resource('printers', 'PrinterController');

    Route::get('requests/{request}/refuse', 'AdminRequestController@refuse')
            ->name('requests.refuse');

    Route::post('requests/{request}/refused', 'AdminRequestController@refused')
            ->name('requests.refused');

    Route::get('requests/{request}/finish', 'AdminRequestController@finish')
            ->name('requests.finish');

    Route::post('request/{request}/finish', 'AdminRequestController@done')
            ->name('requests.done');

    Route::put('request/{request}/finish', 'RequestController@evaluate')
            ->name('requests.evaluate');

    Route::get('request/{request}/report', 'RequestController@report')
            ->name('request.report');

    Route::get('requests/{request}/readmit', 'AdminRequestController@readmit')
            ->name('requests.readmit');

    Route::get('requests-admnistrate/', 'AdminRequestController@index')
            ->name('requests.admnistrate');
    
    Route::resource('users', 'UserController', ['only' => [
        'index', 'show', 'destroy', 'create']]);

    Route::put('/users/change', 'UserController@change')->name('user.change');

    Route::put('/user/change-tipo-conta', 'UserController@changeTipoConta')->name('user.changeTipoConta');
    
    Route::put('/comments/change', 'CommentController@change')->name('comments.change');

    Route::get('/notifications', 'NotificationController@index')->name('notifications');
});

Route::resource('comments', 'CommentController', ['except' => [
    'create'
]]);

Auth::routes();

Route::get('/register', 'Auth\RegisterController@form')->name('register');

