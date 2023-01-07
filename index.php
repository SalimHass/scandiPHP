<?php
header('Access-Control-Allow-Origin: *');

header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Origin, Access-Control-Allow-Headers,Content-Type, Accept,Access-Control-Allow-Methods, Authorization, X-Requested-With');
header("Access-Control-Allow-Methods: 'GET, POST, DELETE'");


include "autoloader.php";

$method = $_SERVER["REQUEST_METHOD"];
switch ($method) {
    case 'GET':
        $list = new ProductController();
        $list->productList();
        break;
    case 'POST':
        
        $d = new ProductController();
        $d->createProduct();
        break;

    case 'DELETE':
        $d = new ProductDao();
        $d->deleteProducts();
        break;

}


