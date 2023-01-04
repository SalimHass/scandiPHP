<?php
include "autoloader.php";
$method = $_SERVER["REQUEST_METHOD"];
switch ($method) {
    case "GET":
        $list = new ProductController();
        $list->productList();
        break;
    case "POST":
        
        $d = new ProductController();
        $d->createProduct();
        break;

    case "DELETE":
        $d = new ProductDao();
        $d->deleteProducts();
        break;

}

