<?php
class BookProduct extends Product{
    private $book_weight;
    public function __construct($sku, $name, $price,$book_weight)
    {

        parent::__construct($sku,$name,$price);
        $this->book_weight=$book_weight;
        $this->setType("Book");
        

        
    }

    public static function FETCH_BY_DB($productdb) {
        $p= new self($productdb['sku'],$productdb['name'],$productdb['price'],$productdb['book_weight']);
        $p-> setId($productdb['id']);
     
        return $p;

    }


    public static function CREATE_FROM_JSON($productdb) {
        
        $p= new self($productdb->sku,$productdb->name,$productdb->price,$productdb->book_weight);
       
        return $p;

    }
   


    /**
     * Get the value of book_weight
     */ 
    public function getBook_weight()
    {
        return $this->book_weight;
    }

    /**
     * Set the value of book_weight
     *
     * @return  self
     */ 
    public function setBook_weight($book_weight)
    {
        $this->book_weight = $book_weight;

        return $this;
    }

    public function dbBinding($connector)
    {
        
        $sql = 'INSERT INTO ' . ProductDao::$TABLE . ' SET  sku = :sku, name = :name, price = :price ,type = :type , book_weight = :book_weight';
        $stmt = $connector->prepare($sql);
        parent::dbBinding($stmt);
        $stmt->bindParam(':book_weight', $this->book_weight);

        return $stmt;

    
      
    }

    public function jsonSerialize()
    {
        parent::jsonSerialize();
        $vars = get_object_vars($this);
        

        return array_merge(parent::jsonSerialize(),$vars);
    }

    
    
}