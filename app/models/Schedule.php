<?php

/**
 *	Clase que define un horario
 */
class Schedule extends Eloquent {

    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'schedules';

	// Uso de timestamps
	public $timestamps = false;

	// Método que define la relación muchos a muchos con ciudades
	public function cities()
    {
        return $this->belongsToMany('City', 'cities_schedules', 'schedule_id', 'city_id');
    }
}