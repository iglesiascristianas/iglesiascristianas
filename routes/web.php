<?php 

/*
|--------------------------------------------------------------------------
| Sistema Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

App::setLocale('es');

//Rutas Internas
Route::group([], function () {

	Route::get('password/reset', 			'Auth\ForgotPasswordController@showLinkRequestForm');
	Route::post('password/reset', 			'Auth\ResetPasswordController@reset');
	Route::get('password/reset/{token?}', 	'Auth\ResetPasswordController@showResetForm');
	Route::post('password/email', 			'Auth\ForgotPasswordController@sendResetLinkEmail');

	// Authentication routes...
	Route::get('login', 	'SessionController@showLoginForm');
	Route::post('login', 	'SessionController@login');
	Route::get('logout', 	'SessionController@logout');

	Route::group(['middleware' => 'auth'], function () {

	// Dashboard
	Route::get('/', 	'DashboardController@index');
	Route::get('/home', 'DashboardController@index');
	Route::get('/produccion', 'DashboardController@indexProduccion');
	Route::get('/distribucion', 'DashboardController@indexDistribucion');

	// Usuarios Routes

	Route::resource('general-form', 								'PruebaController');




	});
});