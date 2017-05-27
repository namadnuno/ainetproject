<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('request/of-week', 'Api\RequestController@ofWeek');
Route::get('departments/{department}/colors/', 'Api\DepartmentController@depatementColors');

Route::get('users/{user}/colors', 'Api\UserController@colors');
Route::get('users/{user}/requests', 'Api\UserController@requests');


