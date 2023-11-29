<?php

    namespace Controllers;
    use MVC\Router;
    use Model\vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    class VendedorController{


        public static function crear (Router $router){

            $vendedor = new vendedor;
            $vendedores = vendedor::all();
            $errores = vendedor :: getErrores();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $vendedor = new vendedor($_POST['vendedor']);
          
                //nombre unico
                $nombreImagen = md5(uniqid(rand(), true)).".jpg";
               
                // realizar un resize con la intervention
                if ($_FILES['vendedor']['tmp_name']['imagen']) {
                    $image = Image::make($_FILES['vendedor']['tmp_name']['imagen'])->fit(800,600);
                    $vendedor->setImagen($nombreImagen);
                } 
              
                //validar
                $errores = $vendedor -> validar();
          
                if (empty($errores)) {
          
                      
                   if(!is_dir(CARPETA_IMAGENES)) {
                       mkdir(CARPETA_IMAGENES);
                   }
                   // Guarda la imagen en el servidor
                   $image->save(CARPETA_IMAGENES . $nombreImagen);
          
                   $vendedor -> crear();
          
               }
          
          
              }

            $router -> render ('vendedores/crear',[
                'vendedor' => $vendedor,
                'vendedores' => $vendedores,
                'errores' => $errores
             ]);

          
        }

        public static function actualizar (Router $router){

            
            $id= ValidarOredirecionar('/admin');

            $vendedor = vendedor::findID($id);
            

            $errores = vendedor::getErrores();


            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $args = $_POST['vendedor'];
            
                $vendedor -> sincronizar($args);


                $errores = $vendedor -> validar();

                $nombreImagen = md5(uniqid(rand(), true)).".jpg";

                    // realizar un resize con la intervention
                if ($_FILES['vendedor']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['vendedor']['tmp_name']['imagen'])->fit(800,600);
                $vendedor->setImagen($nombreImagen);
                } 


                if (empty($errores)) {
                    
                    if ($_FILES['vendedor']['tmp_name']['imagen']) {

                        $image -> save(CARPETA_IMAGENES. $nombreImagen);

                    }
            
                    $vendedor -> guardar();

                }
             }   

             $router->render('/vendedores/actualizar',[
                'vendedor' => $vendedor,
                'errores'=> $errores
            ]);
        }

        public static function eliminar (Router $router){

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
                $tipo = $_POST['tipo'];
   
                // peticiones validas
                if(validarTipoContenido($tipo) ) {
                    $id = $_POST['id'];
                    $id = filter_var($id, FILTER_VALIDATE_INT);
         
                    // Comparar para saber que eliminar
                    if ($tipo === 'vendedor') {
                          $vendedor = vendedor ::findID($id);
                          $vendedor->eliminar();
                      }else if($tipo === 'propiedad') {
                          $propiedad = Propiedad::findID($id);
                          $propiedad->eliminar();
                    }
                }
            } 
        }
    
    }