<?php

    namespace Model;

    class users extends ActiveRecord{

        protected static $tabla = 'usuarios';
        protected static $columnasDB = ['id','email','password'];

        public $id;
        public $email;
        public $password;
        
        public function __construct($args = [])
        {

            $this->id = $args['id'] ?? null;
            $this->email = $args['email'] ?? '';
            $this->password= $args['password'] ?? '';
        }

        public function validar($verificarPassword = false){
        
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                self::$errores[] = "El correo electrónico es inválido";
            }
            
            if(strlen($this->password) < 8) {
                self::$errores[] = "La contraseña debe tener al menos 8 caracteres";
            }
            
            if(!preg_match('/[A-Za-z]/', $this->password) || !preg_match('/\d/', $this->password)) {
                self::$errores[] = "La contraseña debe contener al menos una letra y un número";
            }
            
            return self::$errores;
        }
      
    }