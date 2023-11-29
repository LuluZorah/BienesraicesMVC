<?php

    namespace Model;

    class vendedor extends ActiveRecord{

        protected static $tabla = 'vendedores';
        protected static $columnasDB = ['id','nombre','apellido','celulares','imagen'];

        public $id;
        public $nombre;
        public $apellido;
        public $celulares;
        public $imagen;
        
        public function __construct($args = [])
        {

            $this->id = $args['id'] ?? null;
            $this->nombre = $args['nombre'] ?? '';
            $this->apellido = $args['apellido'] ?? '';
            $this->celulares = $args['celulares'] ?? ' ';
            $this->imagen = $args['nombreImagen'] ?? ' ';
        }

        public function validar(){
        
            if(strlen($this -> nombre)< 2){
                self::$errores[]= "Debes añadir un nombre"; 
            }
            if(strlen($this -> apellido)< 1){
                self::$errores[]= " Debes añadir un apellido"; 
            }

            if(strlen($this -> celulares) < 2){
                self::$errores[]= "El celular es obligatorio";
                
            }
            if(!preg_match('/[0-9]{10}/' , $this-> celulares)){
                self::$errores[]= "El celular es invalido"; 
            } 

            if(strlen($this -> celulares) > 10){
                self::$errores[]= "El celular es muy largo"; 
            }

                        
            if ($_FILES['vendedor']['error']['imagen'] === 4) {
                self::$errores[] = "La foto es Obligatoria";
            }
            
            if(!$this ->imagen){
                self::$errores[]= "La foto es obligatoria"; 
            }
        
        
        
            return self::$errores;
        }
      
    }