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

Route::get('/v1/auto-register', 'UserController@autoRegister')->middleware('guest');

Route::prefix('/v1/gas-track')->group(function (){
    Route::get('/', 'GasTrackController@index')->middleware('api.autologin');
    Route::post('/', 'GasTrackController@save')->middleware('api.autologin');
    Route::get('/{id}/delete', 'GasTrackController@delete')->middleware('api.autologin');
});

Route::prefix('/v1/votes/')->group(function (){
    Route::post('/', 'VoteController@save')->middleware('api.autologin');
});