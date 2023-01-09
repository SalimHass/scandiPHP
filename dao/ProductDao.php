<?php
class ProductDao extends Database
{
  public static  $TABLE = 'products';

  public   function readAll()
  {
    // Create query
    $sql = 'SELECT * From ' . ProductDao::$TABLE;

    // Prepare statement
    $stmt = $this->connect()->prepare($sql);

    // Execute query
    $stmt->execute();

    $num = $stmt->rowCount();

    // Check if any products
    if ($num > 0) {

      $products_arr = array();


      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $productdb = array(
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
        $classname = $type . "Product";
        (class_exists($classname)) ? ($product = $classname::FETCH_BY_DB($productdb)) : null;


        // Push to "data"
        array_push($products_arr, $product);
      }
      return $products_arr;
    }
    return null;
  }


  // Create product
  public function create(Product $product)
  {
    // Bind data
    $stmt = $product->dbBinding($this->connect());



    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }


  // Delete
  public static function deleteProducts()
  {
    $data = json_decode(file_get_contents("php://input"));
    $products_id = implode(",", $data->delete_ids);

    $sql = "DELETE FROM " . ProductDao::$TABLE . " WHERE id IN($products_id)";
    $db = new Database;
    $stmt = $db->connect()->prepare($sql);

    // Delete Products Received 
    if ($data->delete_ids && $stmt->execute()) {
      echo json_encode(
        array('message' => 'Product(s) Deleted', 'success' => true)
      );
    } else {
      echo json_encode(
        array('message' => 'Product(s) Not Deleted', 'success' => false)
      );
    }
  }
}
