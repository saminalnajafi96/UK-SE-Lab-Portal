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
	
	// PagesController
	Route::get('/','PagesController@index');
	Route::get('/tutorials','PagesController@tutorials');
	Route::get('/support','PagesController@support');
	
	// BookingsController
	Route::resource('bookings', 'BookingsController');
	
	// Auth
	Auth::routes();
	Route::get('/home', 'HomeController@index');
	
	// Email verification
	Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
	
	// EnvironmentsController
	Route::get('/environments', 'EnvironmentsController@index');
	Route::get('/environments/{environment_name}/{id}', [
			'as' => 'environments.show', 'uses' => 'EnvironmentsController@show']);
	Route::get('/environments/checkPass', [
			'as' => 'environments.checkPass', 'uses' => 'EnvironmentsController@checkPass']);
	//Route::resource('environments', 'EnvironmentsController');