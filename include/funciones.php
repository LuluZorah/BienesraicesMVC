<?php 


define('TEMPLATES_URL', __DIR__ . '/templates');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'].'/imagenes/');
// echo CARPETA_IMAGENES;
function incluirTemplate($nombre, $inicio = false) {
    include TEMPLATES_URL . "/{$nombre}.php";
}


function estadoAutenticado(): bool{

    session_start();

    if (!$_SESSION['login']) {
        header('Location: /bienesraices/index.php');
    }

    return false;


}

function debuguear($variable){

    echo"<pre>";
    var_dump($variable);
    echo"</pre>";

    exit;

}

function sanizitar($html): string{
    $sanitizar = htmlspecialchars($html);
    return $sanitizar;
}

function validarTipoContenido($tipo){
    $tipos = ['vendedor','propiedad'];

    return in_array($tipo, $tipos);
}


function mostrarNotificacion($codigo){
    $mensaje = ' ';
    switch ($codigo) {
        case 1:
            $mensaje = 'Creado Correctamente'; 
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente'; 
        break;
        case 3:
            $mensaje = 'Eliminado Correctamente'; 
        break;
        
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function ValidarOredirecionar (string $url){

    $id = $_GET['id'];

     $id = filter_var($id,FILTER_VALIDATE_INT);
     
     if (!$id) {
          header("Location: {$url}");
     }

     return $id;
}