<?php

    namespace Controllers;
    use MVC\Router;
    use Model\users;

    
    class UsersController{

        
        public static function crear (Router $router){

            $user = new users;
            $users = users::all();
            $errores = users :: getErrores();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
                $user = new users($_POST['user']);
                // validar
                $errores = $user->validar();
            
                // revisar el arreglo si está vacío
                if (empty($errores)) {

                    $hashed_password = password_hash($user->password, PASSWORD_DEFAULT);
                    $user->password = $hashed_password;
                    
                    $user->crear(); 
                }
            }
            
            $router->render('users/crear', [
                'user' => $user,
                'users' => $users,
                'errores' => $errores
            ]);

        }

        public static function actualizar (Router $router){

            
            $id= ValidarOredirecionar('/admin');

            $user = users::findID($id);
            

            $errores = users::getErrores();


            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $args = $_POST['user'];

                $password = $_POST['password'];

            
                $user -> sincronizar($args);


                $errores = $user -> validar();

               

                if (empty($errores)) {

                    $hashed_password = password_hash($user->password, PASSWORD_DEFAULT);
                    $user->password = $hashed_password;
                    
                    $user -> guardar();

                }
             }   

             $router->render('/users/actualizar',[
                'user' => $user,
                'errores'=> $errores
            ]);
        }

        public static function eliminar (Router $router){

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
                    $id = $_POST['id'];
                    $id = filter_var($id, FILTER_VALIDATE_INT);
    
                    $user = users ::findID($id);
                    $user->eliminar();

                    }
        }   

    }
