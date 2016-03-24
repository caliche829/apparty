<?php

use Illuminate\Database\Eloquent\Builder;

class ProductTypeByCity extends Eloquent {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'prodtypes_cities';

	/**
	* Set the keys for a save update query.
	* This is a fix for tables with composite keys
	*
	* @param  \Illuminate\Database\Eloquent\Builder  $query
	* @return \Illuminate\Database\Eloquent\Builder
	*/
	protected function setKeysForSaveQuery(\Illuminate\Database\Eloquent\Builder $query) {
        $query
        //Put appropriate values for your keys here:
        ->where('product_type_id', '=', $this->product_type_id)
        ->where('city_id', '=', $this->city_id);

    	return $query;
    }
			
	// DEFINE RELATIONSHIPS --------------------------------------------------
	
	public static function validate($input, $type) 
    {
    	$rules = array();
    	if ($type == 'create') 
    	{
			$rules = array(					
					'product_type_id' => 'Required',
					'city_id' => 'Required'				
			);
		}
		
		$v = Validator::make($input, $rules);
		
		return $v;
	}

	public function image(){
    	return $this->belongsTo('Image', 'img_id', 'id');
    }

    public function city(){
    	return $this->belongsTo('City');
    }

    public function category(){
    	return $this->belongsTo('ProductType', 'product_type_id', 'id');
    }
}