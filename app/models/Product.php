<?php

class Product extends Eloquent {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';
			
	// DEFINE RELATIONSHIPS --------------------------------------------------
	// product belongs to one productType
	public function productType() {
		return $this->belongsTo('ProductType');
	}

	public static function validate($input, $type) 
    {
    	$rules = array();
    	if ($type == 'create') 
    	{
			$rules = array(					
				'name' => 'Required|Between:3,50',
				'description' => 'Required|Between:3,50'
			);
		}
		
		$v = Validator::make($input, $rules);
		
		return $v;
	}
}