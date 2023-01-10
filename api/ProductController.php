<?php

namespace Scandi\Api;

use Scandi\Dao\{ProductDao};

class ProductController
{
    public static function productList()
    {
        $dao = new ProductDao();
        $products_arr = $dao->readAll();

        if ($products_arr) {
            echo json_encode($products_arr);
        } else {
        // No Products
                echo json_encode(array('message' => 'No products Found'));
        }
    }


    public static function createProduct()
    {
        $product = null;
        $dao = new ProductDao();
        $data = json_decode(file_get_contents("php://input"));
        $classname = "Scandi\\Models\\" . $data->type . "Product";
        (class_exists($classname)) ? ($product = $classname::createFromJson($data)) :
         json_encode(die("Invalid product class"));
        // create Product
        if ($product != null && $dao->create($product)) {
            echo json_encode(array(
            'message' => 'Product Created',
            'success' => true
            ));
        } else {
            echo json_encode(array(
                  'message' => 'Product not Created',
                  'success' => false
            ));
        }
    }

    public static function deleteProducts()
    {
        $dao = new ProductDao();
        $data = json_decode(file_get_contents("php://input"));
        if ($dao->deleteProducts($data)) {
            echo json_encode(array('message' => 'Product(s) Deleted', 'success' => true));
        } else {
            echo json_encode(array('message' => 'Product(s) Not Deleted', 'success' => false));
        }
    }
}
