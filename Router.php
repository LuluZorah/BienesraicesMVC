<?php 

    namespace MVC;

    class Router{


        public $rutasGET =[];
        public $rutasPOST = [];


        public function get($url, $fn){

            $this -> rutasGET[$url] = $fn;

        }

        
        public function post($url, $fn){

            $this -> rutasPOST[$url] = $fn;

        }

        public function comprobarRutas(){

            session_start();

            $auth = $_SESSION['login'] ?? null;
            //rutas protegidas

            $rutas_protegidas = ['/admin','/propiedades/crear','/propiedades/actualizar','/propiedades/eliminar','/vendedores/crear','/vendedores/actualizar','/vendedores/eliminar','/blog/crear','/blog/actualizar','/blog/eliminar'
            ,'/users/crear','/users/actualizar','/users/eliminar'];

            $urlActual = $_SERVER['PATH_INFO'] ?? '/';
            $metodo = $_SERVER['REQUEST_METHOD'];
            
            if ($metodo == 'GET') {
                $urlActual = explode('?',$urlActual)[0];
                $fn = $this->rutasGET[$urlActual] ?? null;
            }
            else{

                $fn = $this -> rutasPOST[$urlActual] ?? null;
            }

            if (in_array($urlActual, $rutas_protegidas) && !$auth) {
                header('Location: /');
            }


            if ($fn) {
                # existe la url
                call_user_func($fn, $this);

            }
            else {
                echo "Pagina no encontrada";
            }

            

        }

        public function render($view, $datos = []){

            foreach ($datos as $key => $value) {
                $$key = $value;
            }

            ob_start();

            include __DIR__ . "/views/$view.php";

            $contenido = ob_get_clean();

            include __DIR__ . "/views/layout.php";
           
        }
    }