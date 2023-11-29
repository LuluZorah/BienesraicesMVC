<?php 

    namespace Model;

    class Propiedad extends ActiveRecord {

        
        protected static $tabla = 'propiedades';
        protected static $columnasDB = ['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedores_id'];
        
        public $id;
        public $titulo;
        public $precio;
        public $imagen;
        public $descripcion;
        public $habitaciones;
        public $wc;
        public $estacionamiento;
        public $creado;
        public $vendedores_id;


          public function __construct($args = [])
            {
    
                $this->id = $args['id'] ?? null;
                $this->titulo = $args['Titulo'] ?? '';
                $this->precio = $args['precio'] ?? '';
                $this->imagen = $args['nombreImagen'] ?? ' ';
                $this->descripcion = $args['descripcion'] ?? '';
                $this->habitaciones = $args['habitaciones'] ?? '';
                $this->wc = $args['wc'] ?? '';
                $this->estacionamiento = $args['estacionamiento'] ?? '';
                $this->creado = date('Y/m/d');
                $this->vendedores_id = $args['vendedores'] ?? ' ';
            }
        
            public function validar(){
        
              if(strlen($this -> titulo)< 4){
                  self::$errores[]= "Debes añadir un titulo"; 
              }
              if(strlen($this -> titulo)> 45){
                  self::$errores[]= "Titulo demasiado largo"; 
              }
  
              if(!$this -> precio){
                  self::$errores[]= "El precio es Obligatorio"; 
              }

                if ($_FILES['propiedad']['error']['imagen'] === 4) {
                    self::$errores[] = "La imagen es Obligatoria";
                }
                
                if(!$this ->imagen){
                    self::$errores[]= "La imagen es obligatoria"; 
                }
            
              if(strlen($this -> descripcion)< 10){
                  self::$errores[]= "La descripcion es obligatoria y debe tener al menos 10 caracteres"; 
              }
      
              if(!$this ->habitaciones){
                  self::$errores[]= "El numero de habitaciones es Obligatorio"; 
              }
          
              if(!$this ->wc){
                  self::$errores[]= "El numero de baños es Obligatorio"; 
              }
      
              if(!$this ->estacionamiento){
                  self::$errores[]= "El numero de estacionamiento es Obligatorio"; 
              }
      
              if(!$this ->vendedores_id){
                  self::$errores[]= "Elige el vendedor"; 
              }
              
              return self::$errores;
          }

          public function validarActualizar(){
        
            if(strlen($this -> titulo)< 4){
                self::$errores[]= "Debes añadir un titulo"; 
            }
            if(strlen($this -> titulo)> 45){
                self::$errores[]= "Titulo demasiado largo"; 
            }

            if(!$this -> precio){
                self::$errores[]= "El precio es Obligatorio"; 
            }


              if(!$this ->imagen){
                  self::$errores[]= "La imagen es obligatoria"; 
              }
          
            if(strlen($this -> descripcion)< 10){
                self::$errores[]= "La descripcion es obligatoria y debe tener al menos 10 caracteres"; 
            }
    
            if(!$this ->habitaciones){
                self::$errores[]= "El numero de habitaciones es Obligatorio"; 
            }
        
            if(!$this ->wc){
                self::$errores[]= "El numero de baños es Obligatorio"; 
            }
    
            if(!$this ->estacionamiento){
                self::$errores[]= "El numero de estacionamiento es Obligatorio"; 
            }
    
            if(!$this ->vendedores_id){
                self::$errores[]= "Elige el vendedor"; 
            }
            
            return self::$errores;
        }

       
    }

    