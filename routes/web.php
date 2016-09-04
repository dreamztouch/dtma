<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => ['web']], function () {
	// Authentication Routes
	Route::get('admin/login', 'Auth\LoginController@showLoginForm');
	Route::post('admin/login', 'Auth\LoginController@login');
	Route::get('admin/logout', 'Auth\LoginController@logout');

	// Registration Routes
	Route::get('admin/register', 'Auth\RegisterController@showRegistrationForm');
	Route::post('admin/register', 'Auth\RegisterController@register');
});

Route::get('/', function () {
    return view('welcome');
});


//Route::get('admin/login', 'DtmaController@getAdminLogin');
Route::get('admin/dashboard', 'DtmaController@getAdminDashboard');

