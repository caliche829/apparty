<?php

/**
 *	Clase que define un horario
 */
class Holiday extends Eloquent {

    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'holidays';

	// Uso de timestamps
	public $timestamps = false;

	
}