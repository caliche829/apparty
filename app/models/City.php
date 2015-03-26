<?php

/**
 *	Clase que define un horario
 */
class City extends Eloquent {

    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cities';

	// Método que define la relación muchos a muchos con horarios
    public function schedules()
    {
        return $this->belongsToMany('Schedule', 'cities_schedules', 'city_id', 'schedule_id');
    }
}