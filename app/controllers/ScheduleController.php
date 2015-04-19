<?php

use Illuminate\Support\Facades\Input;

/*
 *	Clase que define el controlador de horarios
 */
class ScheduleController extends BaseController {

	// Método que define la acción inicial
	public function getIndex()
	{
		// Se crea arreglo para retornar ciudades con sus horarios
		$citiesSchedsArray = array();

		// Se obtienen todas las ciudades activas
		$cities = City::where('active', 1)->get();

		// Se recorren todas las ciudades
		foreach ($cities as $key => $city) {
			
			// Se crea arreglo para guardar horarios de un trabajador
			$citiesSchedulesArray = array(
				'L' => '',
				'M' => '',
				'X' => '',
				'J' => '',
				'V' => '',
				'S' => '',
				'D' => '',
				'F' => ''
			);

			// Se obtienen los horarios de la ciudad
			$citySchedules = $city->schedules;

			// Se recorren los horarios de la ciudad
			foreach ($citySchedules as $key => $schedule) {

				// Variable para separar el texto entre horarios de un día
				$separator = '';
		
				// Se valida si ya existe un horario definido para el mismo día				
				if ($citiesSchedulesArray[$schedule->day])
				{
					// Se define el separador 
					$separator = ' | ';
				}

				// Agrega el horario al arreglo según el día 
				$citiesSchedulesArray[$schedule->day] = $citiesSchedulesArray[$schedule->day].$separator.date('g:i a',strtotime($schedule->initial_hour)).' - '.date('g:i a',strtotime($schedule->final_hour));
			}

			// Agrega el arreglo de horario según la ciudad
			$citiesSchedsArray[$city->id] = $citiesSchedulesArray;
		}

		//Log::info($workersSchedsArray);

		// Retorna las ciudades y el arreglo de horarios
		return View::make('schedules.index') -> with(array('cities'=> $cities, 'citiesSchedsArray' => $citiesSchedsArray));
	}

	public function getEdit($id)
	{			
		// Se obtiene la ciudad
		$selectedCity = City::find($id);

		// Se obtienen todas las ciudades activas
		$cities = City::where('active', 1)->get();

		// Se crea arreglo de días para configurar horario
		$schedulesDaysArray = array(
			'L' => 'Lunes',
			'M' => 'Martes',
			'X' => 'Miercoles',
			'J' => 'Jueves',
			'V' => 'Viernes',
			'S' => 'Sabado',
			'D' => 'Domingo',
			'F' => 'Festivo'
		);

		// Se obtienen los horarios de la ciudad
		$citySchedules = City::find($id)->schedules()->orderBy('day_order', 'asc')->get();

		// Retorna los arreglos
		return View::make('schedules.edit') -> with(array(
			'selectedCity' => $selectedCity,
			'cities' => $cities,
			'schedulesDaysArray' => $schedulesDaysArray,
			'citySchedules' => $citySchedules)
		);
	}

	public function postEdit()
	{		
   		try {
   			// Obtiene el id de la ciudad
   			$cityId = Input::get('cityId');
							
			// Obtengo el arreglo de horarios removidos
			$removedSchedules = Input::get('removedSchedules');

			// Obtengo los arreglos de los horarios a crear
			$newSchedDays = Input::get('NewDays');
			$newSchedInitHours = Input::get('NewInitialHours');
			$newSchedFinalHours = Input::get('NewFinalHours');

			// Obtengo los arreglos de los horarios modificados
			$modSchedIds = Input::get('modifiedSchedIds');
			$modSchedDays = Input::get('day');
			$modSchedInitHours = Input::get('initial_hour');
			$modSchedFinalHours = Input::get('final_hour');

			
			// Creo el arreglo de horarios de la ciudad
			$citySchedArray = array();
			
			// Obtiene el trabajador	
			$city = City::find($cityId);
			
			// Valido si se removieron horarios
			if($removedSchedules)
			{
				// Recorro el arreglo
				foreach ($removedSchedules as $key => $remSchedId) {
					
					// Desvincula el horario removidos del trabajador
					$city->schedules()->detach($remSchedId);
				}
			}

			// Valido si se modificarán horarios
			if($modSchedIds)
			{
				// Recorro los arreglos
				foreach ($modSchedIds as $key => $modSchedId) {

					// Obtengo el horario existente
					$schedule = Schedule::find($modSchedId);

					// Valido si se realizaron cambios
					$scheduleWithoutChanges = $schedule->where(
															'initial_hour', $modSchedInitHours[$key]
														)->where(
															'final_hour', $modSchedFinalHours[$key]
														)->where(
															'day', $modSchedDays[$key]
														)->first();

					Log::info('schedId '. $modSchedId);
					Log::info('initial_hour '. $modSchedInitHours[$key]);
					Log::info('final_hour '. $modSchedFinalHours[$key]);
					Log::info('day '. $modSchedDays[$key]);
					Log::info($scheduleWithoutChanges);

					// Valido si no se hicieron cambios en el horario
					if ($scheduleWithoutChanges)
					{
						if ($scheduleWithoutChanges->id == $modSchedId) {
							
							Log::info('No hubo cambios en el horario: '.$scheduleWithoutChanges->id);

							// Guardo el horario en el arreglo de horarios de la ciudad
							$citySchedArray[$schedule->id] = $schedule->id;

							// Se omite la modificación del horario
							continue;
						}
					}

					// Obtengo alguna ciudad que este usando este horario
					$anotherCity = $schedule->cities()->whereNotIn(
															'id', array($cityId)
														)->first();

					// Valido si hay otra ciudad usando ese horario
					if ($anotherCity)
					{							
						// Establezco el horario para crear en los arreglos de horarios nuevos
						$newSchedDays[] = $modSchedDays[$key];
						$newSchedInitHours[] = $modSchedInitHours[$key];
						$newSchedFinalHours[] = $modSchedFinalHours[$key];

						// Se omite la modificación del horario
						continue;
					}
					
					// Guardo el horario en el arreglo de horarios de la ciudad
					$citySchedArray[$schedule->id] = $schedule->id;
				
					// Establezco el día a partir de la información del arreglo de días
					$schedule->day = $modSchedDays[$key];

					// Establezco la hora inicial a partir de la información del arreglo de horas iniciales
					$schedule->initial_hour = $modSchedInitHours[$key];

					// Establezco la hora final a partir de la información del arreglo de horas finales
					$schedule->final_hour = $modSchedFinalHours[$key];

					// Valido si la fecha final es menor que la inicial
					if (strtotime($schedule->initial_hour) >= strtotime($schedule->final_hour))
					{
						// Establece respuesta negativa
			   			$response['success'] = 0;

						// Establece el mensaje de error
						$response['errors'] = array('Verifique que en todos los casos la fecha final sea mayor que la inicial');

						// Retorna la respusta como JSON
						return json_encode($response);
					}

					// Guardo los cambios
					$schedule->save();					
				}
			}

			// Valido si se crearán horarios
			if($newSchedDays)
			{
				// Se crea arreglo para obtener el dia anterior por ejemplo si el dia es V -> J
				$previousDay = array(
					'L' => 'D',
					'M' => 'L',
					'X' => 'M',
					'J' => 'X',
					'V' => 'J',
					'S' => 'V',
					'D' => 'S',
					'F' => 'D'
				);

				// Se crea arreglo para guardar el orden de los dias de lunes a viernes
				$orderDays = array(
					'L' => '1',
					'M' => '2',
					'X' => '3',
					'J' => '4',
					'V' => '5',
					'S' => '6',
					'D' => '7',
					'F' => '8'
				);

				// Recorro los arreglos
				foreach ($newSchedDays as $key => $newSchedDay) {

					// Se intenta obtener un horario con las mismas caracteristicas que lo ingresado
					$schedule = Schedule::where(
											'day', $newSchedDay
										)->where(
											'initial_hour', $newSchedInitHours[$key]
										)->where(
											'final_hour', $newSchedFinalHours[$key]
										)->first();

					//Log::info($schedule);

					// Se valida si se encontró un horario
					if ($schedule)
					{
						//Log::info("Horario a asociar:".$schedule->id);

						// Guardo el horario en el arreglo de horarios de la ciudad
						$citySchedArray[$schedule->id] = $schedule->id;
					}
					else
					{
						//Log::info("No encontró horario, se creará nuevo");
						
						// Creo el horario
						$schedule = new Schedule;

						// Establezco el día a partir de la información del arreglo de días
						$schedule->day = $newSchedDay;

						//Establezco el dia previo
						$schedule->previous_day = $previousDay[$newSchedDay];

						//Establezco el orden del dia en la semana
						$schedule->day_order = $orderDays[$newSchedDay];			

						// Establezco la hora inicial a partir de la información del arreglo de horas iniciales
						$schedule->initial_hour = $newSchedInitHours[$key];

						// Establezco la hora final a partir de la información del arreglo de horas finales
						$schedule->final_hour = $newSchedFinalHours[$key];

						// Valido si la fecha final es menor que la inicial
						if (strtotime($schedule->initial_hour) >= strtotime($schedule->final_hour))
						{
							// Establece respuesta negativa
				   			$response['success'] = 0;

							// Establece el mensaje de error
							$response['errors'] = array('Verifique que en todos los casos la fecha final sea mayor que la inicial');

							// Retorna la respusta como JSON
							return json_encode($response);
						}

						// Guardo los cambios
						$schedule->save();

						//Log::info("Horario a asociar:".$schedule->id);

						// Guardo el horario en el arreglo de horarios de la ciudad
						$citySchedArray[$schedule->id] = $schedule->id;
					}
				}
			}

			//Log::info($workerSchedArray);

			if ($citySchedArray)
			{
				// Sincronizo el horario existente del trabajador con el nuevo
				$city->schedules()->sync($citySchedArray);
				
				// Guarda los cambios
				$city->save();
			}
			
			// Establece respuesta negativa
   			$response['success'] = 1;

			// Establece la dirección a ir
			$response['url'] = 'schedules';

			// Retorna la respusta como JSON
			return json_encode($response);

   		} catch (Exception $e) {
   			
   			// Establece respuesta negativa
   			$response['success'] = 0;

   			// Establece el mensaje de error
			$response['errors'] = array('No se pudieron guardar los cambios');
			
			Log::error($e);

			// Retorna la respuesta como JSON
			return json_encode($response);
   		}
	}
	
	/**
	 * Devuelve todos los festivos guardados en la BD
	 */
	public function getHolidays()
	{
		//Se obtienen los festivos desde la fecha actual en adelante
		$holidays = Holiday::where('holiday_date', '>=', date('Y-m-d'))->get();
			
		// Retorna los arreglos
		return View::make('schedules.holidays') -> with(array('holidays' => $holidays));
	}
	
	/**
	 * Guarda o borra los festivos en la BD
	 */
	public function postEditHolidays()
	{
		try {
			//Array con letras para cada dia de la semana
			$daysArray = ['', 'L', 'M', 'X', 'J', 'V', 'S', 'D'];
			$array = Input::get('holiday_date');
			
			//Si vienen nuevos festivos
			if (count($array) > 0) {

				// Se recorren todos los festivos
				foreach ($array as $key => $holiday) {
						
					//Verifico si ese festivo ya existe en BD
					$count = Holiday::where('holiday_date', '=', $holiday)->count();
						
					if ($count == 0) {
						//Creo el nuevo festivo
						$holidayData = new Holiday();
						$holidayData->holiday_date = $holiday;
						$holidayData->day = $daysArray[date('N', strtotime( $holiday ))];
						$holidayData->save();
					}
				}
			}
						
			//Obtengo los festivos a eliminar
			$array = Input::get('removedHolidays');
			
			//Si vienen festivos para eliminar
			if (count($array) > 0) {
					
				Holiday::destroy($array);
			}
			
			// Establece respuesta
			$response['success'] = 1;
			
			// Establece la dirección a ir
			$response['url'] = 'schedules/holidays';
			
			// Retorna la respusta como JSON
			return json_encode($response);
			
		} catch (Exception $e) {
		
			// Establece respuesta negativa
			$response['success'] = 0;
			
			// Establece el mensaje de error
			$response['errors'] = array('No se pudieron guardar los cambios');
				
			Log::error($e);
			
			// Retorna la respuesta como JSON
			return json_encode($response);
		}
	}
}