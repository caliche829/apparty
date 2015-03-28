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
			
			$adsArray = array(0 => 'taxiya', 1 => 'sexboutique', 2 => 'taxiya', 3 => 'sexboutique', 4 => 'taxiya', 5 => 'sexboutique', 6 => 'taxiya', 7 => 'sexboutique', 8 => 'taxiya', 9 => 'sexboutique',
					10 => 'taxiya', 11 => 'sexboutique', 12 => 'taxiya', 13 => 'sexboutique', 14 => 'taxiya', 15 => 'sexboutique', 16 => 'taxiya', 17 => 'sexboutique', 18 => 'taxiya', 19 => 'sexboutique',
					20 => 'taxiya', 21 => 'sexboutique', 22 => 'taxiya', 23 => 'sexboutique', 24 => 'taxiya', 25 => 'sexboutique', 26 => 'taxiya', 27 => 'sexboutique', 28 => 'taxiya', 29 => 'sexboutique',
					30 => 'taxiya', 31 => 'sexboutique', 32 => 'taxiya', 33 => 'sexboutique', 34 => 'taxiya', 35 => 'sexboutique', 36 => 'taxiya', 37 => 'sexboutique', 38 => 'taxiya', 39 => 'sexboutique',
					40 => 'taxiya', 41 => 'sexboutique', 42 => 'taxiya', 43 => 'sexboutique', 44 => 'taxiya', 45 => 'sexboutique', 46 => 'taxiya', 47 => 'sexboutique', 48 => 'taxiya', 49 => 'sexboutique',
					50 => 'taxiya', 51 => 'sexboutique', 52 => 'taxiya', 53 => 'sexboutique', 54 => 'taxiya', 55 => 'sexboutique', 56 => 'taxiya', 57 => 'sexboutique', 58 => 'taxiya', 59 => 'sexboutique',
					60 => 'taxiya', 61 => 'sexboutique', 62 => 'taxiya', 63 => 'sexboutique', 64 => 'taxiya', 65 => 'sexboutique', 66 => 'taxiya', 67 => 'sexboutique', 68 => 'taxiya', 69 => 'sexboutique',
					70 => 'taxiya', 71 => 'sexboutique', 72 => 'taxiya', 73 => 'sexboutique', 74 => 'taxiya', 75 => 'sexboutique', 76 => 'taxiya', 77 => 'sexboutique', 78 => 'taxiya', 79 => 'sexboutique',
					80 => 'taxiya', 81 => 'sexboutique', 82 => 'taxiya', 83 => 'sexboutique', 84 => 'taxiya', 85 => 'sexboutique', 86 => 'taxiya', 87 => 'sexboutique', 88 => 'taxiya', 89 => 'sexboutique',
					90 => 'taxiya', 91 => 'sexboutique', 92 => 'taxiya', 93 => 'sexboutique', 94 => 'taxiya', 95 => 'sexboutique', 96 => 'taxiya', 97 => 'sexboutique', 98 => 'taxiya', 99 => 'sexboutique',
					100 => 'taxiya', 101 => 'sexboutique', 102 => 'taxiya', 103 => 'sexboutique', 104 => 'taxiya', 105 => 'sexboutique', 106 => 'taxiya', 107 => 'sexboutique', 108 => 'taxiya', 109 => 'sexboutique',
					110 => 'taxiya', 111 => 'sexboutique', 112 => 'taxiya', 113 => 'sexboutique', 114 => 'taxiya', 115 => 'sexboutique', 116 => 'taxiya', 117 => 'sexboutique', 118 => 'taxiya', 119 => 'sexboutique',
					120 => 'taxiya', 121 => 'sexboutique', 122 => 'taxiya', 123 => 'sexboutique', 124 => 'taxiya', 125 => 'sexboutique', 126 => 'taxiya', 127 => 'sexboutique', 128 => 'taxiya', 129 => 'sexboutique',
					130 => 'taxiya', 131 => 'sexboutique', 132 => 'taxiya', 133 => 'sexboutique', 134 => 'taxiya', 135 => 'sexboutique', 136 => 'taxiya', 137 => 'sexboutique', 138 => 'taxiya', 139 => 'sexboutique',
					140 => 'taxiya', 141 => 'sexboutique', 142 => 'taxiya', 143 => 'sexboutique', 144 => 'taxiya', 145 => 'sexboutique', 146 => 'taxiya', 147 => 'sexboutique', 148 => 'taxiya', 149 => 'sexboutique',
					150 => 'taxiya', 151 => 'sexboutique', 152 => 'taxiya', 153 => 'sexboutique', 154 => 'taxiya', 155 => 'sexboutique', 156 => 'taxiya', 157 => 'sexboutique', 158 => 'taxiya', 159 => 'sexboutique',
					160 => 'taxiya', 161 => 'sexboutique', 162 => 'taxiya', 163 => 'sexboutique', 164 => 'taxiya', 165 => 'sexboutique', 166 => 'taxiya', 167 => 'sexboutique', 168 => 'taxiya', 169 => 'sexboutique',
					170 => 'taxiya', 171 => 'sexboutique', 172 => 'taxiya', 173 => 'sexboutique', 174 => 'taxiya', 175 => 'sexboutique', 176 => 'taxiya', 177 => 'sexboutique', 178 => 'taxiya', 179 => 'sexboutique',
					180 => 'taxiya', 181 => 'sexboutique', 182 => 'taxiya', 183 => 'sexboutique', 184 => 'taxiya', 185 => 'sexboutique', 186 => 'taxiya', 187 => 'sexboutique', 188 => 'taxiya', 189 => 'sexboutique',
					190 => 'taxiya', 191 => 'sexboutique', 192 => 'taxiya', 193 => 'sexboutique', 194 => 'taxiya', 195 => 'sexboutique', 196 => 'taxiya', 197 => 'sexboutique', 198 => 'taxiya', 199 => 'sexboutique',
					200 => 'taxiya', 201 => 'sexboutique', 202 => 'taxiya', 203 => 'sexboutique', 204 => 'taxiya', 205 => 'sexboutique', 206 => 'taxiya', 207 => 'sexboutique', 208 => 'taxiya', 209 => 'sexboutique',
					210 => 'taxiya', 211 => 'sexboutique', 212 => 'taxiya', 213 => 'sexboutique', 214 => 'taxiya', 215 => 'sexboutique', 216 => 'taxiya', 217 => 'sexboutique', 218 => 'taxiya', 219 => 'sexboutique',
					220 => 'taxiya', 221 => 'sexboutique', 222 => 'taxiya', 223 => 'sexboutique', 224 => 'taxiya', 225 => 'sexboutique', 226 => 'taxiya', 227 => 'sexboutique', 228 => 'taxiya', 229 => 'sexboutique',
					230 => 'taxiya', 231 => 'sexboutique', 232 => 'taxiya', 233 => 'sexboutique', 234 => 'taxiya', 235 => 'sexboutique', 236 => 'taxiya', 237 => 'sexboutique', 238 => 'taxiya', 239 => 'sexboutique',
					240 => 'taxiya', 241 => 'sexboutique', 242 => 'taxiya', 243 => 'sexboutique', 244 => 'taxiya', 245 => 'sexboutique', 246 => 'taxiya', 247 => 'sexboutique', 248 => 'taxiya', 249 => 'sexboutique',
					250 => 'taxiya', 251 => 'sexboutique', 252 => 'taxiya', 253 => 'sexboutique', 254 => 'taxiya', 255 => 'sexboutique', 256 => 'taxiya', 257 => 'sexboutique', 258 => 'taxiya', 259 => 'sexboutique',
					260 => 'taxiya', 261 => 'sexboutique', 262 => 'taxiya', 263 => 'sexboutique', 264 => 'taxiya', 265 => 'sexboutique', 266 => 'taxiya', 267 => 'sexboutique', 268 => 'taxiya', 269 => 'sexboutique',
					270 => 'taxiya', 271 => 'sexboutique', 272 => 'taxiya', 273 => 'sexboutique', 274 => 'taxiya', 275 => 'sexboutique', 276 => 'taxiya', 277 => 'sexboutique', 278 => 'taxiya', 279 => 'sexboutique',
					280 => 'taxiya', 281 => 'sexboutique', 282 => 'taxiya', 283 => 'sexboutique', 284 => 'taxiya', 285 => 'sexboutique', 286 => 'taxiya', 287 => 'sexboutique'	);
		
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
							"showTime" => 3000,
							"img" => 'noAds');
		
		$adsArray = null;

		$index = $this->getAdId($city);	
		
		if ($city == 'Cali') {
			
			$adsArray = array('sexboutique' => 'http://taxiya.elasticbeanstalk.com/apparty/ads/taxiyaAd.jpg',
							  'taxiya' => 'http://taxiya.elasticbeanstalk.com/apparty/ads/appartyGuaro.jpg',
							  'hallowen' => 'http://taxiya.elasticbeanstalk.com/apparty/ads/hallowen.jpg'
			);

			$index = 'taxiya';

		}elseif ($city == 'Medellin') {
			$adsArray = array('sexboutique' => 'http://taxiya.elasticbeanstalk.com/apparty/ads/durex.jpg',
							  'durex' => 'http://taxiya.elasticbeanstalk.com/apparty/ads/durex.jpg');
			
		}elseif ($city == 'Palmira') {
			$adsArray = array('hallowen' => 'http://taxiya.elasticbeanstalk.com/apparty/ads/hallowen.jpg');
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
		$holidayMonday = false;

		//Si es domingo verifico el lunes festivo
		if ($actualDay == 'D') {
			
			//Obtengo la fecha del lunes
			$mondayDate = date('Y-m-d', strtotime('+1 days'));

			//Consulto la fecha del lunes a ver si es festivo
			$holiday = Holiday::where('holiday_date', $mondayDate)->get();

			//Si hay algun resultado es porque es festivo
			if (count($holiday) > 0) {
				
				$holidayMonday = true;
			}
		}

		//Log::info('timeNow: '.$timeNow);

		$timeNoon = date('H:i:s', strtotime('12:00:00'));
		$initialTime = null;
		$finalTime = null;

		$citySchedules = DB::select('select schedules.*
									from cities, schedules, cities_schedules
									where schedules.id = cities_schedules.schedule_id
									and cities_schedules.city_id = cities.id
									and cities.name = ?
									group by schedules.id, schedules.day, schedules.initial_hour, schedules.final_hour, schedules.previous_day, schedules.day_order
									order by schedules.day_order asc', array($city));
		
		//Log::info($citySchedules);

		// Se recorren los horarios
		foreach ($citySchedules as $key => $schedule) {

			$initialTime = date('H:i:s', strtotime($schedule->initial_hour));
			$finalTime = date('H:i:s', strtotime($schedule->final_hour));

			//Reviso si es el mismo dia del horario
			if($actualDay == $schedule->day){

				//Revisa si esta dentro del horario
				if ($initialTime <= $timeNow && $timeNow <= $finalTime) {

					//Verifica que no sea dia Domingo
					if ($actualDay != 'D') {

						$result['open'] = true;	

						break;

					}else if ($holidayMonday) { //Si el lunes es festivo hay servicio el domingo
						
						$result['open'] = true;	

						break;
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

		$result['schedule'] = $finalCityScheds;

		return $result;
	}
}
