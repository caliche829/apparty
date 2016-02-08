<?php

/**
 * ProductTypeController Class
 *
 * Maneja todas las acciones de product types
 */
class ProductTypeController extends Controller
{
    /**
     * Obtiene el form
     */
    public function getForm()
    {
        return View::make('productType.create');
    }

    /**
     * Obtiene todas las categorias
     */
    public function getAll()
    {
        $categories = ProductType::all();
        
        return View::make('productType.all') -> with('categories', $categories);
    }

    /**
     * Obtiene view con las ciudades para seleccionar
     */
    public function getCities()
    {
        $cities = City::lists('name','id');
        
        return View::make('productType.cityIndex') -> with('cities', $cities);
    }

    /**
     * Obtiene todas las categorias de una ciudad
     */
    public function getCityAll($id)
    {
        $city = City::where('id', $id)->with('categories')->first();
        
        return View::make('productType.cityCategories') -> with('city', $city);
    }

    /**
     * Crea una nueva categoria
     */
    public function postCreateProductType()
    {
        $input = array();

        $id = Input::get('category');
                    
        $input['description'] = Input::get('category');
                    
        $response = array('success' => true);
        
        //Valida el input
        $v = ProductType::validate($input, 'create');
        
        //En caso de fallo retorna msj de error
        if($v->fails())
        {
            $response['success'] = false;
            $response['errors'] = $v->errors()->all();
            return json_encode($response);
        }
        
        try {

            //Crea la nueva categoria
            $category = new ProductType;
            $category->description = Input::get('category');
            $category->save();
            
            //Respuesta
            $response['url'] = 'producttypes/all';
            $response['msg'] = 'Categoria creada con exito';
            return json_encode($response);
                        
        } catch (Exception $e) {
                
            $response['success'] = false;
            $response['errors'] = array('No se pudieron guardar los cambios');
            Log::error($e);
            return json_encode($response);
        }
          
    }

    /**
     * Devuelve el formulario con los datos de la categoria
     */
    public function getEditForm($id)
    {
        $category = ProductType::find($id);
        
        return View::make('productType.edit') -> with('category', $category);
    }

    /**
     * Edita una categoria
     */
    public function postEditCategory()
    {
        $input = array();
            
        //Obtengo datos para validacion        
        $input['description'] = Input::get('category');
                    
        $response = array('success' => true);
        
        //Valida el input
        $v = ProductType::validate($input, 'create');
        
        //En caso de fallo retorna msj de error
        if($v->fails())
        {
            $response['success'] = false;
            $response['errors'] = $v->errors()->all();
            return json_encode($response);
        }
        
        try {

            //Obtiene la categoria
            $category = ProductType::find(Input::get('id'));
            $category->description = Input::get('category');
            $category->save();
                     
            //Respuesta
            $response['url'] = 'producttypes/all';
            $response['msg'] = 'Categoria editada con exito';
            return json_encode($response);
                        
        } catch (Exception $e) {
                
            $response['success'] = false;
            $response['errors'] = array('No se pudieron guardar los cambios');
            Log::error($e);
            return json_encode($response);
        }
         
    }
}
