<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'terminal','middleware' => 'web','namespace' => 'Terminal'], function () {
    Route::get('login', 'AuthController@login');
    Route::get('register', 'AuthController@register');
    Route::get('desc', 'AuthController@desc');
    Route::get('logout', 'AuthController@logout');
    Route::get('reset', 'UserController@reset');
    Route::get('change', 'UserController@change');
});



