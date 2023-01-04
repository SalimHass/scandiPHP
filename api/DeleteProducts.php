<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  /*
  class DeleteProducts extends Products{
    public function deleteProducts(){

        $data = json_decode(file_get_contents("php://input"));
        // Set ID to update
        $this->id = $data->id;

        // Delete post
        if($this->delete()) {
          echo json_encode(
            array('message' => 'Post Deleted')
          );
        } else {
          echo json_encode(
            array('message' => 'Post Not Deleted')
          );
        }
    }
  }
 


