<?php

/**
 * FileController Class
 *
 * Maneja todas las acciones de archivos
 */
class FileController extends Controller
{
    /**
     * Sube una foto 
     */
    public function postUploadPhoto()
    {
        $response = array('success' => true);

        if (Input::hasFile('qqfile'))
        {
            $type = Input::get('type');
            if ($type == 'categ') 
            {
                $type = 'categories';
            }
            $id = Input::get('id');
            $cityId = Input::get('idCity');
            $file = Input::file("qqfile");
            $url = '';
            
            try 
            {
                $img = new Image;                
                $img->type = $type;
                $img->save();

                //Crea el nombre del archivo random
                $filename = $type.'/'.$img->id.'.png';                

                //Instanciamos obj S3
                $s3 = AWS::get('s3');                
                //Guarda imagen en aws S3
                $s3->putObject(array(
                    'Bucket'     => 'apparty',
                    'Key'        => $filename,
                    'ACL'        => 'public-read',
                    'Body'       => fopen($file, 'rb'),
                ));

                $urlFile = $s3->getObjectUrl('apparty', $filename);
         
                //Guardo url de la foto
                $img->img_url = $urlFile;
                $img->save();            

                if ($type == 'products') 
                {
                    $product = Product::find($id);
                    $product->img_id = $img->id;
                    $product->save();

                    $img->description = $product->name;
                    $img->product_type_id = $product->product_type_id;
                    $img->save();

                    $url = 'products/all';
                }
                else
                {
                    if ($type == 'categories') 
                    {
                        $columns = array('product_type_id' => $id, 'city_id' => $cityId);
                        $category = ProductTypeByCity::where($columns)->with('category')->with('city')->with('image')->first();
                        $category->img_id = $img->id;
                        $category->save();

                        $img->description = $category->category->description;
                        $img->product_type_id = $category->product_type_id;
                        $img->save();

                        $url = 'producttypesbycity/city/'.$category->city_id;
                    }
                }
         
                //Respuesta
                $response['url'] = $url;
                $response['msg'] = 'Foto subida';
                return json_encode($response);
                            
            } catch (Exception $e) {
                if ($file)
                {
                    //Borra la foto de s3
                    $s3 = AWS::get('s3');
                    $s3->deleteMatchingObjects('apparty', $filename);
                }
                $response['success'] = false;
                $response['errors'] = array('No se pudieron guardar los cambios');
                Log::error($e);
                return json_encode($response);
            }
        }else{
            $response['success'] = false;
            $response['errors'] = array('Debe subir una foto en formato PNG');
            return json_encode($response);
        }   
    }
}
