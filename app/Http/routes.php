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

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['ajax']], function () {
    Route::post('worker/state', 'ApiController@state');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', 'HomeController@welcome');
    Route::get('/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
    Route::get('/home', 'HomeController@index');


    Route::get('/worker/create', 'WorkerController@create');
    Route::post('/worker/store', 'WorkerController@store');
    Route::post('/worker/upload',  ['as' => 'worker.upload', 'uses' => 'WorkerController@upload']);
    Route::get('/worker/show/{id_worker}', 'WorkerController@show');
    Route::get('/worker/edit/{id_worker}', 'WorkerController@edit');
    Route::post('/worker/update', 'WorkerController@update');
    Route::post('/worker/remove', 'WorkerController@remove');

    Route::get('/area', 'AreaController@index');
    Route::get('/area/create', 'AreaController@create');
    Route::post('/area/store', 'AreaController@store');


    Route::get('/vacation/create/{id_worker}/{name_worker}', 'VacationController@create');
    Route::post('/vacation/store', 'VacationController@store');
});

Route::group(['middleware' => ['api']], function () {
    Route::post('worker/state', 'ApiController@state');
});