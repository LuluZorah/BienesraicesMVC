<?php

require_once __DIR__ . '/../include/app.php';

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;
use Controllers\BlogController;
use Controllers\LoginController;
use Controllers\UsersController;

$router = new Router ();

///privada
$router ->  get('/admin', [PropiedadController::class, 'index']);
$router ->  get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router ->  get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router ->  post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router ->  get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router ->  post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router ->  post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);


$router ->  get('/vendedores/crear', [VendedorController::class, 'crear']);
$router ->  get('/vendedores/crear', [VendedorController::class, 'crear']);
$router ->  post('/vendedores/crear', [VendedorController::class, 'crear']);
$router ->  get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router ->  post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router ->  post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);


$router ->  get('/blog/crear', [BlogController::class, 'crear']);
$router ->  get('/blog/crear', [BlogController::class, 'crear']);
$router ->  post('/blog/crear', [BlogController::class, 'crear']);
$router ->  get('/blog/actualizar', [BlogController::class, 'actualizar']);
$router ->  post('/blog/actualizar', [BlogController::class, 'actualizar']);
$router ->  post('/blog/eliminar', [BlogController::class, 'eliminar']);

//users
$router ->  get('/users/crear', [UsersController::class, 'crear']);
$router ->  get('/users/crear', [UsersController::class, 'crear']);
$router ->  post('/users/crear', [UsersController::class, 'crear']);
$router ->  get('/users/actualizar', [UsersController::class, 'actualizar']);
$router ->  post('/users/actualizar', [UsersController::class, 'actualizar']);
$router ->  post('/users/eliminar', [UsersController::class, 'eliminar']);

//publica
$router ->  get('/', [PaginasController::class, 'index']);
$router ->  get('/nosotros', [PaginasController::class, 'nosotros']);
$router ->  get('/propiedades', [PaginasController::class, 'propiedades']);
$router ->  get('/propiedad', [PaginasController::class, 'propiedad']);
$router ->  get('/blog', [PaginasController::class, 'blog']);
$router ->  get('/entrada', [PaginasController::class, 'entrada']);
$router ->  get('/contacto', [PaginasController::class, 'contacto']);
$router ->  post('/contacto', [PaginasController::class, 'contacto']);


//login

$router ->  get('/login', [LoginController::class, 'login']);
$router ->  post('/login', [LoginController::class, 'login']);
$router ->  get('/logout', [LoginController::class, 'logout']);




$router -> comprobarRutas();