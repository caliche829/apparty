<?php

/**
 * ImageController Class
 */
class ImageController extends Controller
{   
    /**
     * Obtiene todas las imagenes
     */
    public function getAll()
    {
        $images = Image::orderBy('description')->get();

        //Log::info($products);
        
        return View::make('images.all') -> with('images', $images);
    }    

    /**
     * Devuelve el formulario con los datos de la imágen
     */
    public function getEditForm($id)
    {
        $image = Image::find($id);

        return View::make('images.edit')->with('image', $image);
    }

    /**
     * Edita una imágen
     */
    public function postEditImage()
    {
        $input = array();
            
        //Obtengo datos para validacion   
        $input['description'] = Input::get('description');
                    
        $response = array('success' => true);
        
        $id = Input::get('id');

        //Valida el input        
        $v = Image::validate($input, 'create', $id);
        
        //En caso de fallo retorna msj de error
        if($v->fails())
        {
            $response['success'] = false;
            $response['errors'] = $v->errors()->all();
            return json_encode($response);
        }
        
        try {

            //Obtiene la imágen
            $image = Image::find($id);
            $image->description = Input::get('description');
            $image->save();
                     
            //Respuesta
            $response['url'] = 'images/all';
            $response['msg'] = 'Imágen editado con exito';
            return json_encode($response);
                        
        } catch (Exception $e) {
                
            $response['success'] = false;
            $response['errors'] = array('No se pudieron guardar los cambios');
            Log::error($e);
            return json_encode($response);
        }         
    }
}
