<?php 
/*
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  class ProductsList extends Products {
    public function productList(){
     // get products list
     $result = $this->read();
     // Get row count
     $num = $result->rowCount();

    // Check if any products
    if($num > 0) {
    
    $products_arr = array();
    $products_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $product = array(
        'id' => $id,
        'sku' => $sku,
        'name' => $name,
        'price' => $price,
        'type' => $type,
        'dvd_size' => $dvd_size,
        'book_weight' => $book_weight,
        'f_height' => $f_height,
        'f_width' => $f_width,
        'f_length' => $f_length
        
      );

      // Push to "data"
      array_push($products_arr['data'], $product);
      
    }

    
    echo json_encode($products_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }

    } 
    



  }



  