<?php

class ProductType extends Eloquent {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product_types';
			
	// DEFINE RELATIONSHIPS --------------------------------------------------
	
	public static function validate($input, $type, $id) 
    {
    	$rules = array();
    	if ($type == 'create') 
    	{
    		$strRule = 'Required|Between:3,50|unique:product_types,description';

    		if($id)
    		{
				$strRule = 'Required|Between:3,50|unique:product_types,description,'.$id.',id';
    		}

			$rules = array(					
					'description' => $strRule
			);
		}
		
		$v = Validator::make($input, $rules);
		
		return $v;
	}

	public function scopeWhereNotRelatedToCity($query, $city_id)
    {
        $existCatergoriesQuery = DB::table('prodtypes_cities')
            ->where('city_id', '=', $city_id)
            ->select('product_type_id')
            ->get();

        $existCatergories = array();
        foreach($existCatergoriesQuery as $queryLevel)
        {
            $existCatergories[] = $queryLevel->product_type_id;
        }

        
        $query->whereNotIn('id', $existCatergories);
    }
}