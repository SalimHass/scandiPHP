<?php


abstract class Product implements \JsonSerializable
{

  private $id;
  private $sku;
  private $name;
  private $price;
  private $type;
  
  public function __construct($sku, $name, $price)
  {
    $this->sku = $sku;
    $this->name = $name;
    $this->price = $price;
  }

  


  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of sku
   */
  public function getSku()
  {
    return $this->sku;
  }

  /**
   * Set the value of sku
   *
   * @return  self
   */
  public function setSku($sku)
  {
    $this->sku = $sku;

    return $this;
  }

  /**
   * Get the value of name
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of price
   */
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * Set the value of price
   *
   * @return  self
   */
  public function setPrice($price)
  {
    $this->price = $price;

    return $this;
  }

  /**
   * Get the value of type
   */
  public function getType()
  {
    return $this->type;
  }

  /**
   * Set the value of type
   *
   * @return  self
   */
  public function setType($type)
  {
    $this->type = $type;

    return $this;
  }

  public function dbBinding($stmt)
  {
    $stmt->bindParam(':sku', $this->sku);
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':type', $this->type);
    return $stmt;
          
  }

  /**
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

}
