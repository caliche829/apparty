<?php

class HomeController extends BaseController {

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

	private function getAdId($city){
			
		$adsArray = null;
		
		if ($city == 'Cali') {
			
			$adsArray = array(0 => 'taxiya', 1 => 'taxiya', 2 => 'taxiya', 3 => 'taxiya', 4 => 'taxiya', 5 => 'taxiya', 6 => 'taxiya', 7 => 'taxiya', 8 => 'taxiya', 9 => 'taxiya',
					10 => 'taxiya', 11 => 'taxiya', 12 => 'taxiya', 13 => 'taxiya', 14 => 'taxiya', 15 => 'taxiya', 16 => 'taxiya', 17 => 'taxiya', 18 => 'taxiya', 19 => 'taxiya',
					20 => 'taxiya', 21 => 'taxiya', 22 => 'taxiya', 23 => 'taxiya', 24 => 'taxiya', 25 => 'taxiya', 26 => 'taxiya', 27 => 'taxiya', 28 => 'taxiya', 29 => 'taxiya',
					30 => 'taxiya', 31 => 'taxiya', 32 => 'taxiya', 33 => 'taxiya', 34 => 'taxiya', 35 => 'taxiya', 36 => 'taxiya', 37 => 'taxiya', 38 => 'taxiya', 39 => 'taxiya',
					40 => 'taxiya', 41 => 'taxiya', 42 => 'taxiya', 43 => 'taxiya', 44 => 'taxiya', 45 => 'taxiya', 46 => 'taxiya', 47 => 'taxiya', 48 => 'taxiya', 49 => 'taxiya',
					50 => 'taxiya', 51 => 'taxiya', 52 => 'taxiya', 53 => 'taxiya', 54 => 'taxiya', 55 => 'taxiya', 56 => 'taxiya', 57 => 'taxiya', 58 => 'taxiya', 59 => 'taxiya',
					60 => 'taxiya', 61 => 'taxiya', 62 => 'taxiya', 63 => 'taxiya', 64 => 'taxiya', 65 => 'taxiya', 66 => 'taxiya', 67 => 'taxiya', 68 => 'taxiya', 69 => 'taxiya',
					70 => 'taxiya', 71 => 'taxiya', 72 => 'taxiya', 73 => 'taxiya', 74 => 'taxiya', 75 => 'taxiya', 76 => 'taxiya', 77 => 'taxiya', 78 => 'taxiya', 79 => 'taxiya',
					80 => 'taxiya', 81 => 'taxiya', 82 => 'taxiya', 83 => 'taxiya', 84 => 'taxiya', 85 => 'taxiya', 86 => 'taxiya', 87 => 'taxiya', 88 => 'taxiya', 89 => 'taxiya',
					90 => 'taxiya', 91 => 'taxiya', 92 => 'taxiya', 93 => 'taxiya', 94 => 'taxiya', 95 => 'taxiya', 96 => 'taxiya', 97 => 'taxiya', 98 => 'taxiya', 99 => 'taxiya',
					100 => 'taxiya', 101 => 'taxiya', 102 => 'taxiya', 103 => 'taxiya', 104 => 'taxiya', 105 => 'taxiya', 106 => 'taxiya', 107 => 'taxiya', 108 => 'taxiya', 109 => 'taxiya',
					110 => 'taxiya', 111 => 'taxiya', 112 => 'taxiya', 113 => 'taxiya', 114 => 'taxiya', 115 => 'taxiya', 116 => 'taxiya', 117 => 'taxiya', 118 => 'taxiya', 119 => 'taxiya',
					120 => 'taxiya', 121 => 'taxiya', 122 => 'taxiya', 123 => 'taxiya', 124 => 'taxiya', 125 => 'taxiya', 126 => 'taxiya', 127 => 'taxiya', 128 => 'taxiya', 129 => 'taxiya',
					130 => 'taxiya', 131 => 'taxiya', 132 => 'taxiya', 133 => 'taxiya', 134 => 'taxiya', 135 => 'taxiya', 136 => 'taxiya', 137 => 'taxiya', 138 => 'taxiya', 139 => 'taxiya',
					140 => 'taxiya', 141 => 'taxiya', 142 => 'taxiya', 143 => 'taxiya', 144 => 'taxiya', 145 => 'taxiya', 146 => 'taxiya', 147 => 'taxiya', 148 => 'taxiya', 149 => 'taxiya',
					150 => 'taxiya', 151 => 'taxiya', 152 => 'taxiya', 153 => 'taxiya', 154 => 'taxiya', 155 => 'taxiya', 156 => 'taxiya', 157 => 'taxiya', 158 => 'taxiya', 159 => 'taxiya',
					160 => 'taxiya', 161 => 'taxiya', 162 => 'taxiya', 163 => 'taxiya', 164 => 'taxiya', 165 => 'taxiya', 166 => 'taxiya', 167 => 'taxiya', 168 => 'taxiya', 169 => 'taxiya',
					170 => 'taxiya', 171 => 'taxiya', 172 => 'taxiya', 173 => 'taxiya', 174 => 'taxiya', 175 => 'taxiya', 176 => 'taxiya', 177 => 'taxiya', 178 => 'taxiya', 179 => 'taxiya',
					180 => 'taxiya', 181 => 'taxiya', 182 => 'taxiya', 183 => 'taxiya', 184 => 'taxiya', 185 => 'taxiya', 186 => 'taxiya', 187 => 'taxiya', 188 => 'taxiya', 189 => 'taxiya',
					190 => 'taxiya', 191 => 'taxiya', 192 => 'taxiya', 193 => 'taxiya', 194 => 'taxiya', 195 => 'taxiya', 196 => 'taxiya', 197 => 'taxiya', 198 => 'taxiya', 199 => 'taxiya',
					200 => 'taxiya', 201 => 'taxiya', 202 => 'taxiya', 203 => 'taxiya', 204 => 'taxiya', 205 => 'taxiya', 206 => 'taxiya', 207 => 'taxiya', 208 => 'taxiya', 209 => 'taxiya',
					210 => 'taxiya', 211 => 'taxiya', 212 => 'taxiya', 213 => 'taxiya', 214 => 'taxiya', 215 => 'taxiya', 216 => 'taxiya', 217 => 'taxiya', 218 => 'taxiya', 219 => 'taxiya',
					220 => 'taxiya', 221 => 'taxiya', 222 => 'taxiya', 223 => 'taxiya', 224 => 'taxiya', 225 => 'taxiya', 226 => 'taxiya', 227 => 'taxiya', 228 => 'taxiya', 229 => 'taxiya',
					230 => 'taxiya', 231 => 'taxiya', 232 => 'taxiya', 233 => 'taxiya', 234 => 'taxiya', 235 => 'taxiya', 236 => 'taxiya', 237 => 'taxiya', 238 => 'taxiya', 239 => 'taxiya',
					240 => 'taxiya', 241 => 'taxiya', 242 => 'taxiya', 243 => 'taxiya', 244 => 'taxiya', 245 => 'taxiya', 246 => 'taxiya', 247 => 'taxiya', 248 => 'taxiya', 249 => 'taxiya',
					250 => 'taxiya', 251 => 'taxiya', 252 => 'taxiya', 253 => 'taxiya', 254 => 'taxiya', 255 => 'taxiya', 256 => 'taxiya', 257 => 'taxiya', 258 => 'taxiya', 259 => 'taxiya',
					260 => 'taxiya', 261 => 'taxiya', 262 => 'taxiya', 263 => 'taxiya', 264 => 'taxiya', 265 => 'taxiya', 266 => 'taxiya', 267 => 'taxiya', 268 => 'taxiya', 269 => 'taxiya',
					270 => 'taxiya', 271 => 'taxiya', 272 => 'taxiya', 273 => 'taxiya', 274 => 'taxiya', 275 => 'taxiya', 276 => 'taxiya', 277 => 'taxiya', 278 => 'taxiya', 279 => 'taxiya',
					280 => 'taxiya', 281 => 'taxiya', 282 => 'taxiya', 283 => 'taxiya', 284 => 'taxiya', 285 => 'taxiya', 286 => 'taxiya', 287 => 'taxiya'	);
		
		}elseif ($city == 'Medellin') {
			
			$adsArray = array(0 => 'sexboutique', 1 => 'sexboutique', 2 => 'sexboutique', 3 => 'sexboutique', 4 => 'sexboutique', 5 => 'sexboutique', 6 => 'sexboutique', 7 => 'sexboutique', 8 => 'sexboutique', 9 => 'sexboutique',
					10 => 'sexboutique', 11 => 'sexboutique', 12 => 'sexboutique', 13 => 'sexboutique', 14 => 'sexboutique', 15 => 'sexboutique', 16 => 'sexboutique', 17 => 'sexboutique', 18 => 'sexboutique', 19 => 'sexboutique',
					20 => 'sexboutique', 21 => 'sexboutique', 22 => 'sexboutique', 23 => 'sexboutique', 24 => 'sexboutique', 25 => 'sexboutique', 26 => 'sexboutique', 27 => 'sexboutique', 28 => 'sexboutique', 29 => 'sexboutique',
					30 => 'sexboutique', 31 => 'sexboutique', 32 => 'sexboutique', 33 => 'sexboutique', 34 => 'sexboutique', 35 => 'sexboutique', 36 => 'sexboutique', 37 => 'sexboutique', 38 => 'sexboutique', 39 => 'sexboutique',
					40 => 'sexboutique', 41 => 'sexboutique', 42 => 'sexboutique', 43 => 'sexboutique', 44 => 'sexboutique', 45 => 'sexboutique', 46 => 'sexboutique', 47 => 'sexboutique', 48 => 'sexboutique', 49 => 'sexboutique',
					50 => 'sexboutique', 51 => 'sexboutique', 52 => 'sexboutique', 53 => 'sexboutique', 54 => 'sexboutique', 55 => 'sexboutique', 56 => 'sexboutique', 57 => 'sexboutique', 58 => 'sexboutique', 59 => 'sexboutique',
					60 => 'sexboutique', 61 => 'sexboutique', 62 => 'sexboutique', 63 => 'sexboutique', 64 => 'sexboutique', 65 => 'sexboutique', 66 => 'sexboutique', 67 => 'sexboutique', 68 => 'sexboutique', 69 => 'sexboutique',
					70 => 'sexboutique', 71 => 'sexboutique', 72 => 'sexboutique', 73 => 'sexboutique', 74 => 'sexboutique', 75 => 'sexboutique', 76 => 'sexboutique', 77 => 'sexboutique', 78 => 'sexboutique', 79 => 'sexboutique',
					80 => 'sexboutique', 81 => 'sexboutique', 82 => 'sexboutique', 83 => 'sexboutique', 84 => 'sexboutique', 85 => 'sexboutique', 86 => 'sexboutique', 87 => 'sexboutique', 88 => 'sexboutique', 89 => 'sexboutique',
					90 => 'sexboutique', 91 => 'sexboutique', 92 => 'sexboutique', 93 => 'sexboutique', 94 => 'sexboutique', 95 => 'sexboutique', 96 => 'sexboutique', 97 => 'sexboutique', 98 => 'sexboutique', 99 => 'sexboutique',
					100 => 'sexboutique', 101 => 'sexboutique', 102 => 'sexboutique', 103 => 'sexboutique', 104 => 'sexboutique', 105 => 'sexboutique', 106 => 'sexboutique', 107 => 'sexboutique', 108 => 'sexboutique', 109 => 'sexboutique',
					110 => 'sexboutique', 111 => 'sexboutique', 112 => 'sexboutique', 113 => 'sexboutique', 114 => 'sexboutique', 115 => 'sexboutique', 116 => 'sexboutique', 117 => 'sexboutique', 118 => 'sexboutique', 119 => 'sexboutique',
					120 => 'sexboutique', 121 => 'sexboutique', 122 => 'sexboutique', 123 => 'sexboutique', 124 => 'sexboutique', 125 => 'sexboutique', 126 => 'sexboutique', 127 => 'sexboutique', 128 => 'sexboutique', 129 => 'sexboutique',
					130 => 'sexboutique', 131 => 'sexboutique', 132 => 'sexboutique', 133 => 'sexboutique', 134 => 'sexboutique', 135 => 'sexboutique', 136 => 'sexboutique', 137 => 'sexboutique', 138 => 'sexboutique', 139 => 'sexboutique',
					140 => 'sexboutique', 141 => 'sexboutique', 142 => 'sexboutique', 143 => 'sexboutique', 144 => 'sexboutique', 145 => 'sexboutique', 146 => 'sexboutique', 147 => 'sexboutique', 148 => 'sexboutique', 149 => 'sexboutique',
					150 => 'sexboutique', 151 => 'sexboutique', 152 => 'sexboutique', 153 => 'sexboutique', 154 => 'sexboutique', 155 => 'sexboutique', 156 => 'sexboutique', 157 => 'sexboutique', 158 => 'sexboutique', 159 => 'sexboutique',
					160 => 'sexboutique', 161 => 'sexboutique', 162 => 'sexboutique', 163 => 'sexboutique', 164 => 'sexboutique', 165 => 'sexboutique', 166 => 'sexboutique', 167 => 'sexboutique', 168 => 'sexboutique', 169 => 'sexboutique',
					170 => 'sexboutique', 171 => 'sexboutique', 172 => 'sexboutique', 173 => 'sexboutique', 174 => 'sexboutique', 175 => 'sexboutique', 176 => 'sexboutique', 177 => 'sexboutique', 178 => 'sexboutique', 179 => 'sexboutique',
					180 => 'sexboutique', 181 => 'sexboutique', 182 => 'sexboutique', 183 => 'sexboutique', 184 => 'sexboutique', 185 => 'sexboutique', 186 => 'sexboutique', 187 => 'sexboutique', 188 => 'sexboutique', 189 => 'sexboutique',
					190 => 'sexboutique', 191 => 'sexboutique', 192 => 'sexboutique', 193 => 'sexboutique', 194 => 'sexboutique', 195 => 'sexboutique', 196 => 'sexboutique', 197 => 'sexboutique', 198 => 'sexboutique', 199 => 'sexboutique',
					200 => 'sexboutique', 201 => 'sexboutique', 202 => 'sexboutique', 203 => 'sexboutique', 204 => 'sexboutique', 205 => 'sexboutique', 206 => 'sexboutique', 207 => 'sexboutique', 208 => 'sexboutique', 209 => 'sexboutique',
					210 => 'sexboutique', 211 => 'sexboutique', 212 => 'sexboutique', 213 => 'sexboutique', 214 => 'sexboutique', 215 => 'sexboutique', 216 => 'sexboutique', 217 => 'sexboutique', 218 => 'sexboutique', 219 => 'sexboutique',
					220 => 'sexboutique', 221 => 'sexboutique', 222 => 'sexboutique', 223 => 'sexboutique', 224 => 'sexboutique', 225 => 'sexboutique', 226 => 'sexboutique', 227 => 'sexboutique', 228 => 'sexboutique', 229 => 'sexboutique',
					230 => 'sexboutique', 231 => 'sexboutique', 232 => 'sexboutique', 233 => 'sexboutique', 234 => 'sexboutique', 235 => 'sexboutique', 236 => 'sexboutique', 237 => 'sexboutique', 238 => 'sexboutique', 239 => 'sexboutique',
					240 => 'sexboutique', 241 => 'sexboutique', 242 => 'sexboutique', 243 => 'sexboutique', 244 => 'sexboutique', 245 => 'sexboutique', 246 => 'sexboutique', 247 => 'sexboutique', 248 => 'sexboutique', 249 => 'sexboutique',
					250 => 'sexboutique', 251 => 'sexboutique', 252 => 'sexboutique', 253 => 'sexboutique', 254 => 'sexboutique', 255 => 'sexboutique', 256 => 'sexboutique', 257 => 'sexboutique', 258 => 'sexboutique', 259 => 'sexboutique',
					260 => 'sexboutique', 261 => 'sexboutique', 262 => 'sexboutique', 263 => 'sexboutique', 264 => 'sexboutique', 265 => 'sexboutique', 266 => 'sexboutique', 267 => 'sexboutique', 268 => 'sexboutique', 269 => 'sexboutique',
					270 => 'sexboutique', 271 => 'sexboutique', 272 => 'sexboutique', 273 => 'sexboutique', 274 => 'sexboutique', 275 => 'sexboutique', 276 => 'sexboutique', 277 => 'sexboutique', 278 => 'sexboutique', 279 => 'sexboutique',
					280 => 'sexboutique', 281 => 'sexboutique', 282 => 'sexboutique', 283 => 'sexboutique', 284 => 'sexboutique', 285 => 'sexboutique', 286 => 'sexboutique', 287 => 'sexboutique'	);
				
		}
		
		$minutes = (((int)date('G'))*60) + (int)date('i');
		
		$minutes = floor($minutes / 5);
		 
		//error_log('$adsArray index: '.$minutes, 0);
		
		$adId = 'noAds';
		
		if( isset($adsArray[$minutes]) )
		{
			if ($adsArray[$minutes] != NULL && $adsArray[$minutes] != '') {
				$adId = $adsArray[$minutes];
			}
		}
		
		return $adId;
	}

	/**
	 * Get the ad and the first information for the app
	 */
	function getFirstInfo(){
			
		$city = Input::get('city');

		$jsonArray = array( "success" => true,
							"showTime" => 5000,
							"img" => 'noAds');
		
		$adsArray = null;

		$index = $this->getAdId($city);	
		
		if ($city == 'Cali') {
			
			$adsArray = array('sexboutique' => 'https://s3.amazonaws.com/apparty/ads/taxiyaAd.jpg',
							  'taxiya' => 'https://s3.amazonaws.com/apparty/ads/24_cervezas_poker.jpg',
							  'hallowen' => 'https://s3.amazonaws.com/apparty/ads/hallowen.jpg'
			);

			$index = 'taxiya';

		}elseif ($city == 'Medellin') {
			$adsArray = array('sexboutique' => 'https://s3.amazonaws.com/apparty/ads/24_cervezas_pilsen.jpg',
							  'durex' => 'https://s3.amazonaws.com/apparty/ads/durex.jpg');
			
		}elseif ($city == 'Palmira') {
			$adsArray = array('hallowen' => 'https://s3.amazonaws.com/apparty/ads/hallowen.jpg');
		}
		
		if ($index != 'noAds') {
			
			$jsonArray['img'] = $adsArray[$index];
		}

		//Get all the active cities
		$jsonArray['cities'] = City::where('active', 1)->get();

		//Check if the city is open at this time
		$jsonArray['schedule'] = $this->checkCitySchedule($city);

		//Log::info($jsonArray);
	
		return Response::json($jsonArray);
	}

	/**
	*	Check if the city is open at this time
	*/
	function checkCitySchedule($city){

		$result = array('open' => false);

		//Array con letras para cada dia de la semana
		$daysArray = ['', 'L', 'M', 'X', 'J', 'V', 'S', 'D'];

		// Se crea arreglo para guardar horarios de la ciudad
		$citySchedulesArray = array(
			'L' => '',
			'M' => '',
			'X' => '',
			'J' => '',
			'V' => '',
			'S' => '',
			'D' => '',
			'F' => ''
		);

		$actualDay = $daysArray[date('N', strtotime(date('Y-m-d').''))];
		$timeNow = date('H:i:s');
		$timeNoon = date('H:i:s', strtotime('12:00:00'));
		$holidayMonday = false;
		
		$initialTime = null;
		$finalTime = null;

		$citySchedules = DB::select('select schedules.*
									from cities, schedules, cities_schedules
									where schedules.id = cities_schedules.schedule_id
									and cities_schedules.city_id = cities.id
									and cities.name = ?
									group by schedules.id, schedules.day, schedules.initial_hour, schedules.final_hour, schedules.previous_day, schedules.day_order
									order by schedules.day_order asc', array($city));

		//Si es domingo verifico el lunes festivo solo si abre la app despues del medio dia
		if ($actualDay == 'D' && $timeNow > $timeNoon) {
			
			//Obtengo la fecha del lunes
			$mondayDate = date('Y-m-d', strtotime('+1 days'));

			//Consulto la fecha del lunes a ver si es festivo
			$holiday = Holiday::where('holiday_date', $mondayDate)->get();

			//Si hay algun resultado es porque es festivo
			if (count($holiday) > 0) {
				
				$holidayMonday = true;
			}
		}

		// Se recorren los horarios
		foreach ($citySchedules as $key => $schedule) {

			$initialTime = date('H:i:s', strtotime($schedule->initial_hour));
			$finalTime = date('H:i:s', strtotime($schedule->final_hour));

			//Reviso si es el mismo dia del horario
			if($actualDay == $schedule->day){

				//Revisa si esta dentro del horario
				if ($initialTime <= $timeNow && $timeNow <= $finalTime) {

					//Verifica que no sea dia Domingo
					if ($actualDay != 'D' && $city == 'Cali') {

						$result['open'] = true;	

						break;

					}else{

						//Si el lunes es festivo hay servicio el domingo en la noche
						if ($holidayMonday || $timeNow < $timeNoon && $city == 'Cali') { 
						
							$result['open'] = true;	

							break;
						}	
					}
				}
			}

			// Variable para separar el texto entre horarios de un día
			$separator = '';
			$dateToShow = '';
			$arrayIndex = null;

			//Si el horario es menor al medio dia, busco el dia anterior para poner el horario final
			if ($initialTime <= $timeNoon) {
				
				$dateToShow = date('g:i a',strtotime($schedule->final_hour));

				$arrayIndex = $schedule->previous_day;
			}else{
				$arrayIndex = $schedule->day;

				$dateToShow = date('g:i a',strtotime($schedule->initial_hour));
			}
			
			// Se valida si ya existe un horario definido para el mismo día				
			if ($citySchedulesArray[$arrayIndex])
			{
				// Se define el separador 
				$separator = ' a ';
			}

			if (strpos($citySchedulesArray[$arrayIndex], ' a ') === false) {
				
				// Agrega el horario al arreglo según el día 
				$citySchedulesArray[$arrayIndex] = $citySchedulesArray[$arrayIndex].$separator.$dateToShow;
			}
			
		}

		// Se crea arreglo para guardar horarios de la ciudad
		$finalCityScheds = array(
			'L' => 'Lunes: ',
			'M' => 'Martes: ',
			'X' => 'Miercoles: ',
			'J' => 'Jueves: ',
			'V' => 'Viernes: ',
			'S' => 'Sabado: ',
			'D' => 'Domingo: ',
			'F' => 'Festivo: '
		);

		// Se recorren los horarios
		foreach ($citySchedules as $key => $schedule) {

			if (strpos($finalCityScheds[$schedule->day], ' a ') === false) {

				// Agrega el horario al arreglo según el día 
				$finalCityScheds[$schedule->day] .= $citySchedulesArray[$schedule->day];
			}
		}

		//$result['open'] = true;	
		$result['schedule'] = $finalCityScheds;

		return $result;
	}
}
