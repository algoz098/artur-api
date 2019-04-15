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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => '/gas-track', 'namespace' => 'Web'], function (){
    Route::get('/', 'GasTrackController@about')->name('GasTrackAbout');
});

Route::group(['prefix' => '/admin', 'namespace' => 'Admin'], function (){
    Route::get('/', 'HomeController@index')->name('AdminHome');

    Route::group(['prefix' => '/web'], function (){
        Route::get('/users/select', 'UserController@select');
    });
    
    Route::group(['prefix' => '/gas-track'], function (){
        Route::get('/', 'GasTrackController@index')->name('AdminGasTracks');
        Route::post('/set-user', 'GasTrackController@setUser')->name('AdminGasTrackSetUser');
    });

    Route::group(['prefix' => '/users'], function (){
        Route::get('/', 'UserController@index')->name('AdminUsers');
    });
});