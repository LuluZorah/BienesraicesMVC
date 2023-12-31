<?php

    namespace Model;

    class ActiveRecord{

                //base de datos

                protected static $db;
                protected static $columnasDB = [];
                protected static $tabla = '';
        
                protected static $errores = [];
        
        

                
                 //definir conexcion a db
                public static function setDB($database){
                    self:: $db = $database;
                }
            
                
        
                public function guardar(){
        
                    if (!is_null($this -> id)) {
                        $this->actualizar();
                    }else{
        
                        $this->crear();
                    }
                  
                }
        
                public function crear(){
                    
        
                    //sanitizar los datos
        
                    $atributos =  $this->sanitizarDatos();
                    
                    $query = " INSERT INTO " . static::$tabla  ." ( ";
                    $query .= join(', ', array_keys($atributos));
                    $query .= " ) VALUES (' ";
                    $query .= join("', '", array_values($atributos));
                    $query .= " ') ";
                 
                   
                    $resultado = self :: $db->query($query);
                   
                    if ($resultado) {
                        header('Location: /admin?registrado = 1');
                    }
                }
        
                public function actualizar(){
        
                    $atributos =  $this->sanitizarDatos();
                    $valores = [];
                    foreach ($atributos as $key => $value) {
                        $valores[]= "{$key}='{$value}'";
                    }
                    $query = "UPDATE " . static::$tabla  ." SET ";
                    $query .=  join(', ', $valores);
                    $query .= " WHERE id = '" .self::$db->escape_string ($this -> id)."' ";
                    $query .= " LIMIT 1";
        
                    $resultado = self :: $db->query($query);
        
                    if ($resultado) {
                        header('Location: /admin?registrado = 2');
                    }
                }
        
                public function eliminar(){
                     //eliminar
                     $query = "DELETE FROM " . static::$tabla  ." WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
                     $resultado = self::$db->query($query);
                    
                     if ($resultado) {
                        $this->borrarImagen();
                        header('Location: /admin?registrado = 3');
                    }
                }
        
                public function atributos(){
                    $atributos =  [];
                    foreach(static:: $columnasDB as $columna){
                        if ($columna === 'id') continue;
                          
                        $atributos[$columna] = $this->$columna; 
                    }
                    return $atributos;
                }
        
                public function sanitizarDatos(){
                    $atributos =  $this->atributos();
                    $sanitizado = [];
                    foreach ($atributos as $key => $value) {
                        $sanitizado[$key] = self :: $db-> escape_string($value);
                    }
        
                    return $sanitizado;
                }
        
        
        
                //validacion
        
                public static function getErrores(){
                  return static:: $errores;
                }


                //get para obtener un valor y set para editarlo
                public  function setImagen($imagen)
                {
                   
                    //eliminar imagen anterior
                    if (!is_null($this -> id)) {
                        $this-> borrarImagen();
                    }
        
                    if ($imagen) 
                    {
                        $this->imagen = $imagen;
                    }
                }
                
                public function borrarImagen(){
                   
                    $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
                    if($existeArchivo) {
                        unlink(CARPETA_IMAGENES . $this->imagen);
                    }
                
                }
                public function validar(){

                    static::$errores=[];
                    return static::$errores;
                }
        
                //lista de todas las propiedades
        
                public static function all(){
                    $query = "SELECT * FROM ". static::$tabla;
                
                    $resultado = self::consultarSQL($query);
            
                    
                    return $resultado;
                    
                }
                

                //obtener determinado numero de registros

                public static function get($cantidad){
                    $query = "SELECT * FROM ". static::$tabla . " LIMIT ". $cantidad;
                
                    $resultado = self::consultarSQL($query);
            
                    
                    return $resultado;
                    
                }

                //buscar por id
        
                public static function findID($id){
        
                    $query = "SELECT * FROM " . static::$tabla  ." WHERE id = {$id}";
                    $resultado = self::consultarSQL($query);
                    return array_shift($resultado);
        
                }
        
                public static function consultarSQL($query){
                    $resultado = self::$db->query($query);
                    $array = [];
        
                    while ($registro = $resultado->fetch_assoc()){
                        $array[] = static::crearObjeto($registro);
                    }
                
                    //liberar memoria
        
                    $resultado ->free();
        
        
                    return $array;
        
                    
                }
        
                protected static function crearObjeto($registro){
                    $objeto = new static;
                
                    foreach($registro as $key => $value){
                        if(property_exists($objeto, $key)){
                            $objeto->$key = $value;
                        }
                    }
                    
                    return $objeto;
                }
        
                public function sincronizar($args = []){
                    foreach ($args as $key => $value) {
                       if (property_exists($this, $key) && !is_null($value)) {
                            $this -> $key = $value;
                       }
                    }
                }
    }