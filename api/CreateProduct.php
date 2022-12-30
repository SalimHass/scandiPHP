<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
   
  class CreateProduct extends Products {
    public function createProduct(){
    $data = json_decode(file_get_contents("php://input"));
    $this->sku = $data->sku;
    $this->name = $data->name;
    $this->price = $data->price;
    $this->type = $data->type;
    $this->dvd_size = $data->dvd_size;
    $this->book_weight = $data->book_weight;
    $this->f_height = $data->f_height;
    $this->f_width = $data->f_width;
    $this->f_length = $data->f_length;
    
    
    // create Product
    if($this->create()) {
        echo json_encode(
          array('message' => 'Post Created')
        );
      } else {
        echo json_encode(
          array('message' => 'Post Not Created')
        );
      }


    


  }
}



 
