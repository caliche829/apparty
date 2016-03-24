<?php

class ProductByCity extends Eloquent {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products_cities';

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
        ->where('product_id', '=', $this->product_id)
        ->where('city_id', '=', $this->city_id);

    	return $query;
    }

    public static function validate($input, $type) 
    {
    	$rules = array();
    	if ($type == 'create') 
    	{
			$rules = array(					
					'product_id' => 'Required',
					'city_id' => 'Required',
					'price' => 'regex:/^\d*(\.\d{2})?$/',
					'quantity' => 'integer'
			);
		}
		
		$v = Validator::make($input, $rules);
		
		return $v;
	}

	// DEFINE RELATIONSHIPS --------------------------------------------------
	// product belongs to one productType
	public function product() {
		return $this->belongsTo('Product');
	}

	
	
    public function city(){
    	return $this->belongsTo('City');
    }
}