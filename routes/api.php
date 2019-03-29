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

Route::get('/auto-register', 'UserController@autoRegister')->middleware('guest');

Route::prefix('/gas-track')->group(function (){
    Route::get('/', 'GasTrackController@index')->middleware('api.autologin');
    Route::post('/save', 'GasTrackController@save')->middleware('api.autologin');
    Route::get('/{id}/delete', 'GasTrackController@delete')->middleware('api.autologin');

});