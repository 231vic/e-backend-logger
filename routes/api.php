<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', 'AuthController@apilogin');
Route::group([
    'middleware' => 'auth:api'
], function() {
    //ALL API NEEDS A BEARER TOKEN
    Route::post('logout', 'AuthController@apilogout');
    Route::get('/logs', 'LogsController@index');
    Route::post('/log/create', 'LogsController@create');
    Route::delete('/log/delete', 'LogsController@delete');
    Route::put('/log/update', 'LogsController@update');
  });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
