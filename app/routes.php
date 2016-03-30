<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Obtiene las ciudades activas
Route::post('allCities', 'CityController@allCities');

// Obtiene la informacion inicial del app
Route::post('getFirstInfo', 'HomeController@getFirstInfo');

// Confide routes
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');

// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth', 'before' => 'checkUserIsActive'), function()
{

	//Welcome view inside dashboard
	Route::get('welcome',  function()
	{
		return View::make('dashboard.welcome');
	});

	// Esta será nuestra ruta de bienvenida.
	Route::get('/', function()
	{
		return View::make('dashboard.index');
	});

	//////////////////////////////////////
	////
	////	HORARIOS
	////
	//////////////////////////////////////
	Route::controller('schedules', 'ScheduleController');

	//////////////////////////////////////
	////
	////	TIPOS DE PRODUCTOS
	////
	//////////////////////////////////////
	Route::controller('producttypes', 'ProductTypeController');

	//////////////////////////////////////
	////
	////	TIPOS DE PRODUCTOS POR CIUDAD
	////
	//////////////////////////////////////
	Route::controller('producttypesbycity', 'ProductTypeByCityController');

	//////////////////////////////////////
	////
	////	PRODUCTOS
	////
	//////////////////////////////////////
	Route::controller('products', 'ProductController');

	//////////////////////////////////////
	////
	////	PRODUCTOS
	////
	//////////////////////////////////////
	Route::controller('productsbycity', 'ProductByCityController');

	//////////////////////////////////////
	////
	////	ARCHIVOS
	////
	//////////////////////////////////////
	Route::controller('files', 'FileController');

	//////////////////////////////////////
	////
	////	CIUDADES
	////
	//////////////////////////////////////
	Route::controller('cities', 'CityController');

	//////////////////////////////////////
	////
	////	PEDIDOS
	////
	//////////////////////////////////////
	Route::controller('orders', 'OrderController');

	//////////////////////////////////////
	////
	////	Imagenes
	////
	//////////////////////////////////////
	Route::controller('images', 'ImageController');

	//////////////////////////////////////
	////
	////	USUARIOS
	////
	//////////////////////////////////////
	Route::controller('users', 'UsersController');

	// Confide routes
	Route::get('users/create', 'UsersController@create');
	Route::post('users', 'UsersController@store');
	
});
