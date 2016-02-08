<?php

/**
 * ProductController Class
 *
 * Maneja todas las acciones de productos
 */
class ProductController extends Controller
{
    /**
     * Obtiene el form
     */
    public function getForm()
    {
        $categories = ProductType::lists('description','id');

        return View::make('products.create')->with('categories', $categories);
    }

    /**
     * Obtiene todos los productos
     */
    public function getAll()
    {
        $products = Product::with('productType')->get();
        
        return View::make('products.all') -> with('products', $products);
    }

    /**
     * Crea un nuevo producto
     */
    public function postCreateProduct()
    {
        $input = array();

        if (Input::hasFile('qqfile'))
        {
            $file = Input::file("qqfile");
                        
            $input['description'] = Input::get('description');
            $input['name'] = Input::get('name');

            $response = array('success' => true);
            
            //Valida el input
            $v = Product::validate($input, 'create');
            
            //En caso de fallo retorna msj de error
            if($v->fails())
            {
                $response['success'] = false;
                $response['errors'] = $v->errors()->all();
                return json_encode($response);
            }
            
            try {

                //Crea la nueva categoria
                $product = new Product;
                $product->name = Input::get('name');
                $product->description = Input::get('description');
                $product->product_type_id = Input::get('productType');
                $product->save();

                //Crea el nombre del archivo random
                $filename = str_replace(' ', '', microtime());
                $filename = str_replace('.', '', $filename);
                $filename = 'products/'.$product->id.'_'.$filename.'.png';

                //Guarda imagen en aws S3
                $s3 = AWS::get('s3');
                $s3->putObject(array(
                    'Bucket'     => 'apparty',
                    'Key'        => $filename,
                    'ACL'        => 'public-read',
                    'Body'       => fopen($file, 'rb'),
                ));

                $urlFile = $s3->getObjectUrl('apparty', $filename);
         
                //Guardo url de la foto
                $product->photo = $urlFile;
                $product->save();

                //Respuesta
                $response['url'] = 'products/all';
                $response['msg'] = 'Producto creado con exito';
                return json_encode($response);
                            
            } catch (Exception $e) {
                    
                Log::error($e);

                //Borra la foto de s3
                $s3 = AWS::get('s3');
                $s3->deleteMatchingObjects('apparty', $filename);

                $response['success'] = false;
                $response['errors'] = array('No se pudieron guardar los cambios');
                
                return json_encode($response);
            }
        }else{
            $response['success'] = false;
            $response['errors'] = array('Debe subir una foto en formato PNG');
            return json_encode($response);
        }   
    }

    /**
     * Devuelve el formulario con los datos del producto
     */
    public function getEditForm($id)
    {
        $product = Product::find($id);
        $categories = ProductType::lists('description','id');
        
        return View::make('products.edit') -> with(array('product'=>$product, 'categories'=>$categories));
    }

    /**
     * Edita un producto
     */
    public function postEditProduct()
    {
        $input = array();
            
        //Obtengo datos para validacion        
        $input['name'] = Input::get('name');
        $input['description'] = Input::get('description');
                    
        $response = array('success' => true);
        
        //Valida el input
        $v = Product::validate($input, 'create');
        
        //En caso de fallo retorna msj de error
        if($v->fails())
        {
            $response['success'] = false;
            $response['errors'] = $v->errors()->all();
            return json_encode($response);
        }
        
        try {

            //Obtiene el producto
            $product = Product::find(Input::get('id'));
            $product->name = Input::get('name');
            $product->description = Input::get('description');
            $product->save();
                     
            //Respuesta
            $response['url'] = 'products/all';
            $response['msg'] = 'Producto editado con exito';
            return json_encode($response);
                        
        } catch (Exception $e) {
                
            $response['success'] = false;
            $response['errors'] = array('No se pudieron guardar los cambios');
            Log::error($e);
            return json_encode($response);
        }
         
    }
}
