<?php

class CityController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function allCities()
	{			
		
		// Se obtienen todas las ciudades activas
		$cities = City::where('active', 1)->get();

		//Log::info($cities);

		return Response::json($cities);
	}

}
