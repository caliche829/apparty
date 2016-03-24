<?php
/**
 * ProductTypeByCityController Class
 *
 * Maneja todas las acciones de product types por city
 */
class ProductTypeByCityController extends Controller
{

    //Obtiene el registro
    public function find($columns = array())
    {
        $prodtypebycity =  ProductTypeByCity::where($columns)->with('category')->with('city')->with('image')->first();

        return $prodtypebycity;
    }

    /**
     * Obtiene el form
     */
    public function getForm($id, $categoryId, $imgId)
    {
        $city = City::find($id);
        
        $categories = ProductType::whereNotRelatedToCity($id)->orderBy('description', 'ASC')->get();

        if(!($categoryId > 0))
        {
            $category = $categories->first();
            $categoryId = $category->id;
        }

        $imgs = Image::whereNull('type')->orWhere('product_type_id', $categoryId)->orderBy('description')->get();

        return View::make('productType.createCityCategory')->with(array('city'=>$city, 'categories' => $categories->lists('description','id'), 'imgs' => $imgs, 'categoryId' => $categoryId, 'imageId'=>$imgId));        
    }


    /**
     * Obtiene view con las ciudades para seleccionar
     */
    public function getCities()
    {
        return $this->getCity(-1);
    }

    /**
     * Obtiene view con las ciudades para seleccionar
     */
    public function getCity($id)
    {
        $cities = City::orderBy('name', 'asc')->lists('name','id');
        $cities[''] = '';

        $city = false;

        if($id != -1)
        {
            $city = City::where('id', $id)->with('categories')->first();
        }

        return View::make('productType.cityIndex') -> with(array('cities'=>$cities, 'city'=>$city));
    }

    /**
     * Obtiene todas las categorías de una ciudad
     */
    public function getCityAll($id)
    {
        $city = City::where('id', $id)->with('categories')->first();
        
        return View::make('productType.cityCategories') -> with('city', $city);
    }


    /**
     * Crea una nueva categoría
     */
    public function postCreateProductType()
    {
        $input = array();

        $imgId = Input::get('hidCflag');      
        $input['product_type_id'] = Input::get('category');
        $input['city_id'] = Input::get('idCity');
                    
        $response = array('success' => true);
        
        //Valida el input
        $v = ProductTypeByCity::validate($input, 'create');
        
        //En caso de fallo retorna msj de error
        if($v->fails())
        {
            $response['success'] = false;
            $response['errors'] = $v->errors()->all();
            return json_encode($response);
        }
        
        try {

            //Crea la nueva categoría
            $category = new ProductTypeByCity;
            $category->product_type_id = Input::get('category');
            $category->city_id = Input::get('idCity');
            $category->active = 1;
            $category->img_id = $imgId;
            $category->save();            
            
            //Respuesta
            $response['category'] = $category->product_type_id;
            //$response['city'] = $category->city_id;
            $response['url'] = 'producttypesbycity/city/'.$category->city_id;
            $response['msg'] = 'Categoría creada con exito';
            return json_encode($response);
                        
        } catch (Exception $e) {
            Log::error($e);

            $response['success'] = false;
            $response['errors'] = array('No se pudieron guardar los cambios');
            
            return json_encode($response);
        }         
    }

    /**
     * Devuelve el formulario con los datos de la categoría
     */
    public function getEditForm($id, $imgId, $cityId)
    {
        $city = City::find($cityId);
        
        $categoryByCity = $this->find(array('product_type_id' => $id, 'city_id' => $cityId));

        $categories = ProductType::whereNotRelatedToCity($id)->get();

        $category = ProductType::find($id);
        $categories = $categories->add($category);

        /*$categories = $categories->sortBy(function( $category ) {
                        return $category->description;
                     });*/

        if($imgId == -1)
        {
            $imgId = $categoryByCity->img_id;
        }

        //Log::info($category);
        //Log::info($categories);

        $imgs = Image::whereNull('type')->orWhere('product_type_id', $id)->orderBy('description')->get();

        return View::make('productType.editCityCategory')->with(array('city'=>$city,'categoryByCity'=>$categoryByCity, 'categories' => $categories->lists('description','id'), 'imgs' => $imgs, 'categoryId' => $id, 'imageId'=>$imgId));
    }

    /**
     * Edita una categoría
     */
    public function postEditProductType()
    {
        $input = array();
            
        //Obtengo datos para validacion
        $imgId = Input::get('hidCflag');
        $id = Input::get('category');
        $cityId = Input::get('idCity');
        $input['product_type_id'] = $id;
        $input['city_id'] = $cityId;
                    
        $response = array('success' => true);
        
        //Valida el input
        $v = ProductTypeByCity::validate($input, 'create');
        
        //En caso de fallo retorna msj de error
        if($v->fails())
        {
            $response['success'] = false;
            $response['errors'] = $v->errors()->all();
            return json_encode($response);
        }
        
        try {

            //Obtiene la categoría
            $category = $this->find(array('product_type_id' => $id, 'city_id' => $cityId));
            if($category)
            {
                $category->active = Input::get('active');
                $category->img_id = $imgId;
                $category->save();
            }
            else
            {
                $category = new ProductTypeByCity;
                $category->product_type_id = Input::get('category');
                $category->city_id = Input::get('idCity');
                $category->active = 1;
                $category->img_id = $imgId;
                $category->save();   
            }
                     
            //Respuesta
            $response['category'] = $category->product_type_id;
            $response['url'] = 'producttypesbycity/city/'.$cityId;
            $response['msg'] = 'Categoría editada con exito';
            return json_encode($response);
                        
        } catch (Exception $e) {
                
            $response['success'] = false;
            $response['errors'] = array('No se pudieron guardar los cambios');
            Log::error($e);
            return json_encode($response);
        }
         
    }
}
