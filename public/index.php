<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PaginasController;
use Controllers\AdminController;
use Controllers\LoginController;


$router = new Router();

$router->get('/', [PaginasController::class, 'index']);
$router->get('/propiedades', [PaginasController::class, 'propiedades']);
$router->post('/propiedades', [PaginasController::class, 'propiedades']);
$router->get('/propiedades/propiedad', [PaginasController::class, 'propiedad']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);


$router->get('/admin', [AdminController::class, 'index']);
$router->get('/admin/crear', [AdminController::class, 'crear']);
$router->post('/admin/crear', [AdminController::class, 'crear']);
$router->get('/admin/actualizar', [AdminController::class, 'actualizar']);
$router->post('/admin/actualizar', [AdminController::class, 'actualizar']);
$router->post('/admin/eliminar', [AdminController::class, 'eliminar']);

$router->comprobarRutas();