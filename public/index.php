<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;

$router = new Router();

$router -> get('/nosotros', 'function_nosotros');
$router -> get('/tienda_virtual', 'function_tienda');
$router -> get('/contacto', 'function_contacto');
$router -> get('/admin', 'function_admin');

$router -> comprobarRutas();
