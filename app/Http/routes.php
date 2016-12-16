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

Route::group(['prefix' => 'Terminal','middleware' => 'web','namespace' => 'Terminal'], function () {
    Route::get('login', 'UserController@login');
    Route::get('register', 'UserController@register');
    Route::get('desc', 'UserController@desc');
});



