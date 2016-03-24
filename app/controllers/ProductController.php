<?php

/**
 * ProductController Class
 *
 * Maneja todas las acciones de productos
 */
class ProductController extends Controller
{
    public function defaultImgId()
    {
        return 1;
    }

    /**
     * Obtiene el form
     */
    public function getForm($categoryId, $imgId)
    {
        $categories = ProductType::orderBy('description', 'ASC')->get();

        if(!($categoryId > 0))
        {
            $category = $categories->first();
            $categoryId = $category->id;
        }

        $imgs = Image::whereNull('type')->orWhere('product_type_id', $categoryId)->orderBy('description')->get();

        return View::make('products.create')->with(array('categories' => $categories->lists('description','id'), 'imgs' => $imgs, 'categoryId' => $categoryId, 'imageId'=>$imgId));
    }

    /**
     * Obtiene todos los productos
     */
    public function getAll()
    {
        $products = Product::with('productType')->with('image')->get();

        //Log::info($products);
        
        return View::make('products.all') -> with('products', $products);
    }

    /**
     * Crea un nuevo producto
     */
    public function postCreateProduct()
    {
        $input = array();

        $imgId = Input::get('hidCflag');
        $input['description'] = Input::get('description');
        $input['name'] = Input::get('name');

        $response = array('success' => true);
        
        //Valida el input
        $v = Product::validate($input, 'create', false);
        
        //En caso de fallo retorna msj de error
        if($v->fails())
        {
            $response['success'] = false;
            $response['errors'] = $v->errors()->all();
            return json_encode($response);
        }
        
        try {

            //Crea la nueva categoría
            $product = new Product;
            $product->name = Input::get('name');
            $product->description = Input::get('description');
            $product->product_type_id = Input::get('productType');
            $product->img_id = $imgId;
            $product->save();

            //Respuesta
            $response['product'] = $product->id;
            $response['url'] = 'products/all';
            $response['msg'] = 'Producto creado con exito';
            return json_encode($response);
                        
        } catch (Exception $e) {
                
            Log::error($e);

            $response['success'] = false;
            $response['errors'] = array('No se pudieron guardar los cambios');
            
            return json_encode($response);
        }
          
    }

    /**
     * Devuelve el formulario con los datos del producto
     */
    public function getEditForm($id, $categoryId, $imgId)
    {
        $product = Product::find($id);

        $categories = ProductType::orderBy('description', 'ASC')->lists('description','id');

        if(!($categoryId > 0))
        {
            $categoryId = $product->product_type_id;
        }

        if(!($imgId > 0))
        {
            $imgId = $product->img_id;
        }

        $imgs = Image::whereNull('type')->orWhere('product_type_id', $categoryId)->orderBy('description')->get();

        return View::make('products.edit')->with(array('product'=>$product, 'categories' => $categories, 'imgs' => $imgs, 'categoryId' => $categoryId, 'imageId'=>$imgId));
    }

    /**
     * Edita un producto
     */
    public function postEditProduct()
    {
        $input = array();
            
        //Obtengo datos para validacion   
        $imgId = Input::get('hidCflag');
        $input['name'] = Input::get('name');
        $input['description'] = Input::get('description');
                    
        $response = array('success' => true);
        
        $id = Input::get('id');

        //Valida el input        
        $v = Product::validate($input, 'create', $id);
        
        //En caso de fallo retorna msj de error
        if($v->fails())
        {
            $response['success'] = false;
            $response['errors'] = $v->errors()->all();
            return json_encode($response);
        }
        
        try {

            //Obtiene el producto
            $product = Product::find($id);
            $product->name = Input::get('name');
            $product->description = Input::get('description');
            $product->img_id = $imgId;
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
