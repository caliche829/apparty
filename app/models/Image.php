<?php

/**
 *	Clase que define una imagen
 */
class Image extends Eloquent {

    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'image_category';

	public static function validate($input, $type, $id) 
    {
    	$rules = array();
    	if ($type == 'create') 
    	{
    		$strRule = 'Required|Between:3,250|unique:image_category,description';

    		if($id)
    		{
				$strRule = 'Required|Between:3,250|unique:image_category,description,'.$id.',id';
    		}

			$rules = array(					
				'description' => $strRule
			);
		}
		
		$v = Validator::make($input, $rules);
		
		return $v;
	}

    public function categories()
    {
        return $this->belongsTo('ProductType');
    }
}