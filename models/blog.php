<?php

    namespace Model;

    class Blog extends ActiveRecord{

        protected static $tabla = 'blog';
        protected static $columnasDB = ['id','titulo','imagen','fecha','descripcion','escritor','resumen'];

        public $id;
        public $titulo;
        public $imagen;
        public $fecha;
        public $descripcion;
        public $escritor;
        public $resumen;
        
        public function __construct($args = [])
        {

            $this->id = $args['id'] ?? null;
            $this->titulo = $args['titulo'] ?? '';
            $this->imagen= $args['nombreImagen'] ?? '';
            $this->fecha = date('Y/m/d');
            $this->descripcion = $args['descripcion'] ?? ' ';
            $this->escritor = $args['escritor'] ?? ' ';
            $this->resumen = $args['resumen'] ?? ' ';
        }

        public function validar(){
        
            if(strlen($this -> titulo)< 2){
                self::$errores[]= "Debes añadir un titulo"; 
                
            }
            if(strlen($this -> titulo)> 45){
                self::$errores[]= "El titulo es muy largo"; 
                
            }

            if(!$this ->imagen){
                self::$errores[]= "La foto es Obligatoria"; 
            }
        

            if(strlen($this -> escritor)< 1){
                self::$errores[]= " Debes añadir un escritor"; 
            }

            if(strlen($this -> descripcion)< 10){
                self::$errores[]= "La descripcion es obligatoria y debe tener al menos 10 caracteres"; 
            }

            if(strlen($this -> resumen)< 5){
                self::$errores[]= "El resumen es obligatorio y debe tener al menos 5 caracteres"; 
            }

            if(strlen($this -> resumen)> 100){
                self::$errores[]= "El resumen muy largo"; 
            }

        
            return self::$errores;
        }
      
    }