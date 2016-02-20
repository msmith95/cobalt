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

Route::group(['middleware' => 'cors'], function() {
	Route::post('/api/auth', 'ApiController@auth');
	Route::post('/api/register', 'ApiController@register');
	Route::post('api/testApi', 'ApiController@testApi');
	Route::post('api/register', 'ApiController@register');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', 'PagesController@index');
    Route::get('/home', 'HomeController@index');
    Route::get('/pickApartment', 'ApartmentController@index');
    Route::post('/joinApartment', 'ApartmentController@addToExisting');
    Route::post('/createApartment', 'ApartmentController@create');
    Route::get('/completeChore/{id}', 'HomeController@completeChore');
    Route::get('/addChore', 'HomeController@addChore');
});
