<?php

    namespace Controllers;
    use MVC\Router;
    use Model\propiedad;
    use Model\blog;
    use Model\users;
    use PHPMailer\PHPMailer\PHPMailer;

    class PaginasController{

        public static function index (Router $router){

            $propiedades =  Propiedad::get(3);
            $blogs =  blog::get(2);
            $inicio = true;
            $router -> render ('paginas/index',[
                'propiedades' => $propiedades,
                'blogs' => $blogs,
                'inicio' => $inicio
             ]);
 
         }

         public static function nosotros (Router $router){

            $router -> render ('paginas/nosotros');

         }

         public static function propiedades (Router $router){
            $propiedades =  Propiedad::get(20);
            $router -> render ('paginas/propiedades',[
                'propiedades' => $propiedades,
              
             ]);
         }
         public static function propiedad (Router $router){
            $id= ValidarOredirecionar('/propiedades');

            $propiedad = Propiedad::findID($id);

            $router -> render ('paginas/propiedad',[
                'propiedad' => $propiedad,
              
             ]);

 
         }

         public static function blog (Router $router){

            $blogs =  blog::get(20);
            $router -> render ('paginas/blog',[
                'blogs' => $blogs  
             ]);

 
         }
         public static function entrada (Router $router){

            $id= ValidarOredirecionar('/blog');
            $blog = blog :: findID($id);
           
            $router -> render ('paginas/entrada',[
               'blog' => $blog,
             
            ]);
         }
         public static function contacto (Router $router){

            $mensaje =  null;

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                  $respuestas = $_POST['contacto'];


                  //crear instancia
                  $mail = new PHPMailer();

                  //configurar SMTP envio de email

                  $mail -> isSMTP();
                  $mail -> Host = 'sandbox.smtp.mailtrap.io';
                  $mail -> SMTPAuth = true;
                  $mail -> Username = '684b4060988cb0';
                  $mail -> Password = '5bf9ba68a06c7e' ;
                  $mail -> SMTPSecure = 'tls';
                  $mail -> Port = 2525;

                  //configurar el contenido del mail

                  $mail -> setFrom('admin@bienesraices.com');
                  $mail -> addAddress('admin@bienesraice.com','BienesRaices.com');
                  $mail -> Subject = 'Tienes un nuevo mensaje';


                  $mail -> isHTML(true);
                  $mail -> CharSet = 'UTF-8';


                  $contenido = '<html><p>Tienes un nuevo mensaje</p></html>';
                  $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . ' </p>';
                

                  //enviar de manera condicional

                  if ($respuestas['contacto'] === 'telefono') {
                     $contenido .= '<p>Eligio ser contactado por Telefono</p>';
                     $contenido .= '<p>Telefono: ' . $respuestas['telefono'] . ' </p>';
                     $contenido .= '<p>Fecha: ' . $respuestas['fecha'] . ' </p>';
                     $contenido .= '<p>Hora: ' . $respuestas['hora'] . ' </p>';
                  }

                  else {
                     $contenido .= '<p>Eligio ser contactado por Email</p>';
                     $contenido .= '<p>Email: ' . $respuestas['email'] . ' </p>';
                  }
                 
                  $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . ' </p>';
                  $contenido .= '<p>Vende o compra: ' . $respuestas['tipo'] . ' </p>';
                  $contenido .= '<p>Presupuesto:  $' . $respuestas['presupuesto'] . ' </p>';
                  $contenido .= '<p>Prefiere ser contactado por:  ' . $respuestas['contacto'] . ' </p>';
                  $contenido .= '</html>';

                  $mail -> Body = $contenido;
                  $mail -> AltBody = 'Texto alternativo';
                  
                  if ( $mail -> send()) {
                     $mensaje = "Enviado correctamente";
                  }
                  else{

                     $mensaje = "No se pudo enviar";
                  }
                 
            }
            
            $router -> render ('paginas/contacto',[
             
                  'mensaje' => $mensaje
            ]);
         }
        
    }