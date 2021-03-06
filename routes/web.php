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

	Route::get('admin/bloodbank/{bloodbank}/delete', ['as' => 'bloodbank.delete', 'uses' => 'BloodbankController@BloodbankDeleteSingle']);
	
	Route::get('admin/bloodbank/deleted-data', ['as' => 'bloodbank.deletedata', 'uses' => 'BloodbankController@BloodbankDeletedData']);
	
	Route::get('admin/bloodbank/{bloodbank}/restore', ['as' => 'bloodbank.restore', 'uses' => 'BloodbankController@BloodbankRestoreSingle']);

	Route::delete('admin/bloodbank/delete-selected', ['as' => 'bloodbank.selected.delete', 'uses' => 'BloodbankController@bloodbankSelectedDelete']);

	Route::post('admin/bloodbank/restore-selected', ['as' => 'bloodbank.selected.restore', 'uses' => 'BloodbankController@bloodbankSelectedRestore']);
	
	Route::resource('admin/bloodbank', 'BloodbankController');
	

	// Ambulance Routes
	Route::get('admin/ambulance/edit', ['as' => 'ambulance.editall', 'uses' => 'AmbulanceController@AmbulanceEdit']);

	Route::get('admin/ambulance/delete', ['as' => 'ambulance.deleteall', 'uses' => 'AmbulanceController@AmbulanceDelete']);

	Route::get('admin/ambulance/{ambulance}/delete', ['as' => 'ambulance.delete', 'uses' => 'AmbulanceController@AmbulanceDeleteSingle']);

	Route::get('admin/ambulance/deleted-data', ['as' => 'ambulance.deletedata', 'uses' => 'AmbulanceController@AmbulanceDeletedData']);

	Route::get('admin/ambulance/{ambulance}/restore', ['as' => 'ambulance.restore', 'uses' => 'AmbulanceController@AmbulanceRestoreSingle']);

	Route::delete('admin/ambulance/delete-selected', ['as' => 'ambulance.selected.delete', 'uses' => 'AmbulanceController@ambulanceSelectedDelete']);

	Route::post('admin/ambulance/restore-selected', ['as' => 'ambulance.selected.restore', 'uses' => 'AmbulanceController@ambulanceSelectedRestore']);

	Route::resource('admin/ambulance', 'AmbulanceController');

	
	// Hospital Routes
	Route::get('admin/hospital/edit', ['as' => 'hospital.editall', 'uses' => 'HospitalController@HospitalEdit']);
	
	Route::get('admin/hospital/delete', ['as' => 'hospital.deleteall', 'uses' => 'HospitalController@HospitalDelete']);

	Route::get('admin/hospital/{hospital}/delete', ['as' => 'hospital.delete', 'uses' => 'HospitalController@HospitalDeleteSingle']);

	Route::get('admin/hospital/deleted-data', ['as' => 'hospital.deletedata', 'uses' => 'HospitalController@HospitalDeletedData']);

	Route::get('admin/hospital/{hospital}/restore', ['as' => 'hospital.restore', 'uses' => 'HospitalController@HospitalRestoreSingle']);

	Route::delete('admin/hospital/delete-selected', ['as' => 'hospital.selected.delete', 'uses' => 'HospitalController@hospitalSelectedDelete']);

	Route::post('admin/hospital/restore-selected', ['as' => 'hospital.selected.restore', 'uses' => 'HospitalController@hospitalSelectedRestore']);
	
	Route::resource('admin/hospital', 'HospitalController');

	Route::resource('admin/doctor', 'DoctorController');
});


Route::get('admin/dashboard', 'DtmaController@getAdminDashboard');


