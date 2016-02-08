<?php

class ProductType extends Eloquent {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product_types';
			
	// DEFINE RELATIONSHIPS --------------------------------------------------
	
	public static function validate($input, $type) 
    {
    	$rules = array();
    	if ($type == 'create') 
    	{
			$rules = array(					
					'description' => 'Required|Between:3,50'
			);
		}
		
		$v = Validator::make($input, $rules);
		
		return $v;
	}
}