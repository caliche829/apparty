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

    public function categories()
    {
        return $this->belongsToMany('ProductType', 'prodtypes_cities', 'city_id', 'product_type_id')
                    ->leftJoin('image_category as img', 'prodtypes_cities.img_id', '=', 'img.id')
                    ->select('product_types.id', 'product_types.description', 'img_url', 'prodtypes_cities.active', 'prodtypes_cities.img_id')
                    ->orderBy('product_types.description');
    }

    public function products()
    {
        return $this->belongsToMany('Product', 'products_cities', 'city_id', 'product_id')
                    //->leftJoin('image_category as img', 'products.img_id', '=', 'img.id')
                    ->select('products.id', 'products.name', 'products.description', 'products.img_id', 'products_cities.active', 'products_cities.price', 'products_cities.quantity') //, 'products.img_url'
                    ->orderBy('products.name');
    }
}