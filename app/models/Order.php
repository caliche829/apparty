<?php

/**
 *	Clase que define un pedido
 */
class Order extends Eloquent {

    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'orders_old';

	// Un pedido tiene un usuario
	public function customer() {
		return $this->belongsTo('Customer');
	}

	// Un pedido tiene un estado
	public function status() {
		return $this->belongsTo('Status');
	}
}