<?php 

require 'funciones.php';
require 'config/databases.php';
require __DIR__.'/../vendor/autoload.php';



//conectar db

$db = conectarDB();

use Model\ActiveRecord;


ActiveRecord :: setDB($db);
