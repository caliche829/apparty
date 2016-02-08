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
            $id = Input::get('id');
            $file = Input::file("qqfile");
            $url = '';
            
            try {
                
                //Instanciamos obj S3
                $s3 = AWS::get('s3');

                $filename = str_replace(' ', '', microtime());
                $filename = str_replace('.', '', $filename);

                if ($type == 'product') {
                    
                    $filename = 'products/'.$id.'_'.$filename.'.png';
                    $url = 'products/all';
                }

                //Guarda imagen en aws S3
                $s3->putObject(array(
                    'Bucket'     => 'apparty',
                    'Key'        => $filename,
                    'ACL'        => 'public-read',
                    'Body'       => fopen($file, 'rb'),
                ));

                $deleteFile = '';

                //Guardo la url de la foto en la categoria
                if ($type == 'product') {

                    $product = Product::find($id);

                    $deleteFile = $product->photo;

                    $product->photo = $s3->getObjectUrl('apparty', $filename);
                    $product->save();
                }

                //Borramos la imagen previa
                $s3->deleteObject(array(
                    'Bucket'     => 'apparty',
                    'Key'        => $deleteFile
                ));
         
                //Respuesta
                $response['url'] = $url;
                $response['msg'] = 'Foto subida';
                return json_encode($response);
                            
            } catch (Exception $e) {
                    
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
