<?php

class CityController extends BaseController {

	public function allCities()
	{			
		
		// Se obtienen todas las ciudades activas
		$cities = City::where('active', 1)->get();

		//Log::info($cities);

		return Response::json($cities);
	}

}
