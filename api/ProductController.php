<?php
// Headers

header('Access-Control-Allow-Origin: *');

header('Content-Type: application/json');
header("Access-Control-Allow-Methods: 'GET, POST, OPTIONS, PUT, PATCH, DELETE'");

header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

class ProductController
{
  public static function productList()
  {
    $dao = new ProductDao();
    $products_arr = $dao->readAll();
    // Get row count
    if ($products_arr) {



      echo json_encode($products_arr);
    } else {
      // No Posts
      echo json_encode(
        array('message' => 'No products Found')
      );
    }
  }


  public static function createProduct()
  {
    $product = null;
    $dao = new ProductDao();

    $data = json_decode(file_get_contents("php://input"));
    $classname = $data->type . "Product";

    (class_exists($classname)) ? ($product = $classname::CREATE_FROM_JSON($data)) : json_encode(die("Invalid product class"));



    // create Product
    if ($product != null && $dao->create($product)) {
      echo json_encode(
        array(
          'message' => 'Product Created',
          'success' => true
        )
      );
    } else {
      echo json_encode(
        array(
          'message' => 'Product not Created',
          'success' => false
        )
      );
    }
  }
}
