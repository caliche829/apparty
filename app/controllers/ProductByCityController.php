<?php
/**
 * ProductByCityController Class
 *
 * Maneja todas las acciones de product types por city
 */
class ProductByCityController extends Controller
{

    //Obtiene el registro
    public function find($columns = array())
    {
        $productbycity =  ProductByCity::where($columns)->with('product')->with('city')->first();

        return $productbycity;
    }

    /**
     * Obtiene el form
     */
    public function getForm($cityId, $productId)
    {
        $city = City::find($cityId);
        
        $products = Product::whereNotRelatedToCity($cityId)->orderBy('name', 'ASC')->get();

        if(!($productId > 0))
        {
            $product = $products->first();
            $productId = $product->id;
        }

        return View::make('products.createCityProduct')->with(array('city'=>$city, 'products' => $products->lists('name','id'), 'productId' => $productId));
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
            $city = City::where('id', $id)->with('products')->first();
        }

        return View::make('products.cityIndex') -> with(array('cities'=>$cities, 'city'=>$city));
    }

    /**
     * Obtiene todas las categorías de una ciudad
     */
    public function getCityAll($id)
    {
        $city = City::where('id', $id)->with('products')->first();
        
        return View::make('products.cityProducts') -> with('city', $city);
    }


    /**
     * Crea una nueva categoría
     */
    public function postCreateProduct()
    {
        $input = array();
   
        $input['product_id'] = Input::get('product');
        $input['city_id'] = Input::get('idCity');
        $input['price'] = Input::get('price');
        $input['quantity'] = Input::get('quantity');
                    
        $response = array('success' => true);
        
        //Valida el input
        $v = ProductByCity::validate($input, 'create');
        
        //En caso de fallo retorna msj de error
        if($v->fails())
        {
            $response['success'] = false;
            $response['errors'] = $v->errors()->all();
            return json_encode($response);
        }
        
        try {

            //Crea la nueva categoría
            $product = new ProductByCity;
            $product->product_id = Input::get('product');
            $product->city_id = Input::get('idCity');
            $product->price = Input::get('price');
            $product->quantity = Input::get('quantity');
            $product->active = 1;
            $product->save();            
            
            //Respuesta
            $response['url'] = 'productsbycity/city/'.$product->city_id;
            $response['msg'] = 'Articulo creado con exito';
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
    public function getEditForm($productId, $cityId)
    {
        $city = City::find($cityId);
        
        $productByCity = $this->find(array('product_id' => $productId, 'city_id' => $cityId));

        $products = Product::whereNotRelatedToCity($cityId)->orderBy('name', 'ASC')->get();

        $product = Product::find($productId);
        $products = $products->add($product);

        return View::make('products.editCityProduct')->with(array('city'=>$city,'productByCity'=>$productByCity, 'products' => $products->lists('name','id'), 'productId' => $productId));
    }

    /**
     * Edita una categoría
     */
    public function postEditProduct()
    {
        $input = array();
            
        //Obtengo datos para validacion
        $id = Input::get('product');
        $cityId = Input::get('idCity');

        $input['product_id'] = $id;
        $input['city_id'] = $cityId;
        $input['price'] = Input::get('price');
        $input['quantity'] = Input::get('quantity');
                    
        $response = array('success' => true);
        
        //Valida el input
        $v = ProductByCity::validate($input, 'create');
        
        //En caso de fallo retorna msj de error
        if($v->fails())
        {
            $response['success'] = false;
            $response['errors'] = $v->errors()->all();
            return json_encode($response);
        }
        
        try {

            //Obtiene la categoría
            $product = $this->find(array('product_id' => $id, 'city_id' => $cityId));

            if($product)
            {
                $product->price = Input::get('price');
                $product->quantity = Input::get('quantity');
                $product->active = Input::get('active');
                $product->save();
            }
            else
            {
                $product = new ProductByCity;
                $product->product_id = Input::get('product');
                $product->city_id = Input::get('idCity');
                $product->price = Input::get('price');
                $product->quantity = Input::get('quantity');
                $product->active = 1;
                $product->save();   
            }
                     
            //Respuesta
            $response['url'] = 'productsbycity/city/'.$cityId;
            $response['msg'] = 'Articulo editado con exito';
            return json_encode($response);
                        
        } catch (Exception $e) {
                
            $response['success'] = false;
            $response['errors'] = array('No se pudieron guardar los cambios');
            Log::error($e);
            return json_encode($response);
        }
         
    }
}
