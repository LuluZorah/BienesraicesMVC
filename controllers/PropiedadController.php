<?php

    namespace Controllers;
    use MVC\Router;
    use Model\Propiedad;
    use Model\vendedor;
    use Model\blog;
    use Model\users;
    use Intervention\Image\ImageManagerStatic as Image;

    class PropiedadController{

        public static function index (Router $router){

           $propiedades = Propiedad:: all();
           $vendedores= vendedor:: all();
           $blogs= blog:: all();
           $users= users:: all();
           $registrado = null;
                
            $registrado = $_GET['registrado_'] ?? null;

            $router -> render ('propiedades/admin',[
              'propiedades' => $propiedades,
              'registrado' => $registrado,
              'vendedores' => $vendedores,
              'blogs' => $blogs,
              'users' => $users
           ]);

        }

        public static function crear (Router $router){

            $propiedad = new Propiedad;
            $vendedores = vendedor::all();
            $errores = Propiedad :: getErrores();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                     $propiedad = new Propiedad($_POST['propiedad']);

            //nombre unico
                    $nombreImagen = md5(uniqid(rand(), true)).".jpg";
                
                    // realizar un resize con la intervention
                    if ($_FILES['propiedad']['tmp_name']['imagen']) {
                        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                        $propiedad->setImagen($nombreImagen);
                    } 
                
                    //validar
                    $errores = $propiedad -> validar();
                

                    //revisar el arreglo si esta vacio
                
                    if (empty($errores)) {

                        
                        if(!is_dir(CARPETA_IMAGENES)) {
                            mkdir(CARPETA_IMAGENES);
                        }
                        // Guarda la imagen en el servidor
                        $image->save(CARPETA_IMAGENES . $nombreImagen);

                        $propiedad -> crear();

                      }

            }
            
            $router -> render ('propiedades/crear',[
                'propiedad' => $propiedad,
                'vendedores' => $vendedores,
                'errores' => $errores
             ]);

        }

        public static function actualizar (Router $router){

            $id= ValidarOredirecionar('/admin');

            $propiedad = Propiedad::findID($id);

            $errores = Propiedad::getErrores();

            $vendedores = vendedor::all();

             if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
                $args = $_POST['propiedad'];
            
                $propiedad -> sincronizar($args);
                // debuguear($propiedad);
        
                $errores = $propiedad -> validarActualizar();
        
                $nombreImagen = md5(uniqid(rand(), true)).".jpg";
        
                       // realizar un resize con la intervention
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
                } 
        
                // debuguear($propiedad);
        
                if (empty($errores)) {
                    
                    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        
                        $image -> save(CARPETA_IMAGENES. $nombreImagen);
        
                    }
             
                    $propiedad -> guardar();
        
                }
            }

            $router->render('/propiedades/actualizar',[
                'propiedad' => $propiedad,
                'errores'=> $errores,
                'vendedores' => $vendedores
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