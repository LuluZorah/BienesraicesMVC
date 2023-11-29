<?php

    namespace Controllers;
    use MVC\Router;
    use Model\blog;
    use Intervention\Image\ImageManagerStatic as Image;

    class BlogController{

        public static function crear (Router $router){

            $blog = new blog;
            $blogs = blog::all();
            $errores = blog :: getErrores();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                     $blog = new blog($_POST['blog']);

            //nombre unico
                    $nombreImagen = md5(uniqid(rand(), true)).".jpg";
                
                    // realizar un resize con la intervention
                    if ($_FILES['blog']['tmp_name']['imagen']) {
                        $image = Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(800,600);
                        $blog->setImagen($nombreImagen);
                    } 
                
                    //validar
                    $errores = $blog -> validar();
                

                    //revisar el arreglo si esta vacio
                
                    if (empty($errores)) {

                        
                        if(!is_dir(CARPETA_IMAGENES)) {
                            mkdir(CARPETA_IMAGENES);
                        }
                        // Guarda la imagen en el servidor
                        $image->save(CARPETA_IMAGENES . $nombreImagen);

                        $blog -> crear();

                      }

            }
            
            $router -> render ('blog/crear',[
                'blog' => $blog,
                'blogs' => $blogs,
                'errores' => $errores
             ]);

        }

        public static function actualizar (Router $router){

            
            $id= ValidarOredirecionar('/admin');

            $blog = blog::findID($id);
            

            $errores = blog::getErrores();


            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $args = $_POST['blog'];
            
                $blog -> sincronizar($args);


                $errores = $blog -> validar();

                $nombreImagen = md5(uniqid(rand(), true)).".jpg";

                    // realizar un resize con la intervention
                if ($_FILES['blog']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(800,600);
                $blog->setImagen($nombreImagen);
                } 


                if (empty($errores)) {
                    
                    if ($_FILES['vendedor']['tmp_name']['imagen']) {

                        $image -> save(CARPETA_IMAGENES. $nombreImagen);

                    }
            
                    $blog -> guardar();

                }
             }   

             $router->render('/blog/actualizar',[
                'blog' => $blog,
                'errores'=> $errores
            ]);
        }

        public static function eliminar (Router $router){

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
                    $id = $_POST['id'];
                    $id = filter_var($id, FILTER_VALIDATE_INT);
    
                    $blog = blog ::findID($id);
                    $blog->eliminar();

                    }
        }   
    }