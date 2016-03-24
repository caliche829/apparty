<?php

class Product extends Eloquent {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';
			
	// DEFINE RELATIONSHIPS --------------------------------------------------
	public static function validate($input, $type, $id) 
    {
    	$rules = array();
    	if ($type == 'create') 
    	{
    		$strRule = 'Required|Between:3,50|unique:products,name';

    		if($id)
    		{
				$strRule = 'Required|Between:3,50|unique:products,name,'.$id.',id';
    		}

			$rules = array(					
				'name' => $strRule,
				'description' => 'Required|Between:3,50'
			);
		}
		
		$v = Validator::make($input, $rules);
		
		return $v;
	}

	// product belongs to one productType
	public function productType() {
		return $this->belongsTo('ProductType');
	}

	public function image(){
    	return $this->belongsTo('Image', 'img_id', 'id');
    }

    // product belongs to one productType
	public function productTypeimage() {
		return $this->belongsTo('ProductType')
					->join('image_category as img', 'img_id', '=', 'img.id')
	                //->select('product_types.id', 'product_types.description', 'img_url', 'prodtypes_cities.active', 'prodtypes_cities.img_id')
	                ->orderBy('product_types.description');;
	}

	public function scopeWhereNotRelatedToCity($query, $city_id)
    {
        $existProductsQuery = DB::table('products_cities')
            ->where('city_id', '=', $city_id)
            ->select('product_id')
            ->get();

        $existProducts = array();
        foreach($existProductsQuery as $queryLevel)
        {
            $existProducts[] = $queryLevel->product_id;
        }

        
        $query->whereNotIn('id', $existProducts);
    }
}