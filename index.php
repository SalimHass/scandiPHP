<?php

use Scandi\Router;

require_once 'autoloader.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Origin, Access-Control-Allow-Headers,Content-Type,'
 . 'Accept,Access-Control-Allow-Methods');
header("Access-Control-Allow-Methods: 'GET, POST, DELETE'");




$router = new Router();
$router->get('/scandiPHP/', 'Scandi\Api\ProductController::productList');
$router->create('/scandiPHP/create', 'Scandi\Api\ProductController::createProduct');
$router->delete('/scandiPHP/delete', 'Scandi\Api\ProductController::deleteProducts');
$router->runRoutes();
