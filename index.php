<?php
header('Access-Control-Allow-Origin: *');

header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Origin, Access-Control-Allow-Headers,Content-Type, Accept,Access-Control-Allow-Methods, Authorization, X-Requested-With');
header("Access-Control-Allow-Methods: 'GET, POST, DELETE'");


include "autoloader.php";

//print_r($_SERVER) ;


$router = new Router();
$router->get('/scandiPHP/', 'ProductController::productList');
$router->create('/scandiPHP/create', 'ProductController::createProduct');
$router->delete('/scandiPHP/delete', 'ProductDao::deleteProducts');

$router->runRoutes();



