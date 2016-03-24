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
     * Obtiene todas las categorías
     */
    public function getAll()
    {
        $categories = ProductType::all();
        
        return View::make('productType.all') -> with('categories', $categories);
    }

    /**
     * Crea una nueva categoría
     */
    public function postCreateProductType()
    {
        $input = array();

        $id = Input::get('category');
                    
        $input['description'] = Input::get('category');
                    
        $response = array('success' => true);
        
        //Valida el input
        $v = ProductType::validate($input, 'create', false);
        
        //En caso de fallo retorna msj de error
        if($v->fails())
        {
            $response['success'] = false;
            $response['errors'] = $v->errors()->all();
            return json_encode($response);
        }
        
        try {

            //Crea la nueva categoría
            $category = new ProductType;
            $category->description = Input::get('category');
            $category->save();
            
            //Respuesta
            $response['url'] = 'producttypes/all';
            $response['msg'] = 'Categoría creada con exito';
            return json_encode($response);
                        
        } catch (Exception $e) {
                
            $response['success'] = false;
            $response['errors'] = array('No se pudieron guardar los cambios');
            Log::error($e);
            return json_encode($response);
        }
          
    }

    /**
     * Devuelve el formulario con los datos de la categoría
     */
    public function getEditForm($id)
    {
        $category = ProductType::find($id);
        
        return View::make('productType.edit') -> with('category', $category);
    }

    /**
     * Edita una categoría
     */
    public function postEditCategory()
    {
        $input = array();
            
        //Obtengo datos para validacion        
        $input['description'] = Input::get('category');

        $response = array('success' => true);
        
        $id = Input::get('id');        
        
        //Valida el input
        $v = ProductType::validate($input, 'create', $id);
        
        //En caso de fallo retorna msj de error
        if($v->fails())
        {
            $response['success'] = false;
            $response['errors'] = $v->errors()->all();
            return json_encode($response);
        }
        
        try {

            //Obtiene la categoría
            $category = ProductType::find($id);
            $category->description = Input::get('category');
            $category->save();
                     
            //Respuesta
            $response['url'] = 'producttypes/all';
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
