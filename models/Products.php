<?php 
  

  class Products  extends Database{
    // DB stuff
    
    private $table = 'products';

    // Post Properties
    public $id;
    public $sku;
    public $name;
    public $price;
    public $type;
    public $dvd_size;
    public $book_weight;
    public $f_height;
    public $f_width;
    public $f_length;

    // Constructor with DB
   

    // Get products
    public function read() {
      // Create query
      $sql = 'SELECT * From ' . $this->table;
      
      // Prepare statement
      $stmt = $this->connect()->prepare($sql);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    

    // Create product
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET  sku = :sku, name = :name, price = :price ,type = :type ,dvd_size = :dvd_size,book_weight = :book_weight,f_height = :f_height,f_width = :f_width,f_length = :f_length';

          // Prepare statement
          $stmt = $this->connect()->prepare($query);

       
          // Bind data
          $stmt->bindParam(':sku', $this->sku);
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':price', $this->price);
          $stmt->bindParam(':type', $this->type);
          $stmt->bindParam(':dvd_size', $this->dvd_size);
          $stmt->bindParam(':book_weight', $this->book_weight);
          $stmt->bindParam(':f_height', $this->f_height);
          $stmt->bindParam(':f_width', $this->f_width);
          $stmt->bindParam(':f_length', $this->f_length);
         

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

  
    
  }