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
	Route::get('admin/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

	// Registration Routes
	Route::get('admin/register', 'Auth\RegisterController@showRegistrationForm');
	Route::post('admin/register', 'Auth\RegisterController@register');

	
	// Blood Bank Routes
	Route::get('admin/bloodbank/edit', ['as' => 'bloodbank.editall', 'uses' => 'BloodbankController@BloodbankEdit']);
	Route::get('admin/bloodbank/delete', ['as' => 'bloodbank.deleteall', 'uses' => 'BloodbankController@BloodbankDelete']);
	Route::resource('admin/bloodbank', 'BloodbankController');
	

	// Ambulance Routes
	Route::get('admin/ambulance/edit', ['as' => 'ambulance.editall', 'uses' => 'AmbulanceController@AmbulanceEdit']);
	Route::get('admin/ambulance/delete', ['as' => 'ambulance.deleteall', 'uses' => 'AmbulanceController@AmbulanceDelete']);
	Route::resource('admin/ambulance', 'AmbulanceController');

	
	// Hospital Routes
	Route::get('admin/hospital/edit', ['as' => 'hospital.editall', 'uses' => 'HospitalController@HospitalEdit']);
	Route::get('admin/hospital/delete', ['as' => 'hospital.deleteall', 'uses' => 'HospitalController@HospitalDelete']);
	Route::resource('admin/hospital', 'HospitalController');

	Route::resource('doctors', 'DoctorController');
});


Route::get('admin/dashboard', 'DtmaController@getAdminDashboard');


