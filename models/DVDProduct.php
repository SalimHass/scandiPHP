<?php

namespace Scandi\Models;

use Scandi\Dao\{ProductDao};

class DVDProduct extends Product
{
    private $dvd_size;
    public function __construct($sku, $name, $price, $dvd_size)
    {
          parent::__construct($sku, $name, $price);
        $this->dvd_size = $dvd_size;
        $this->setType("DVD");
    }

    public static function fetchByDb($productdb)
    {
        $p = new self($productdb['sku'], $productdb['name'], $productdb['price'], $productdb['dvd_size']);
        $p-> setId($productdb['id']);
        return $p;
    }

    public static function createFromJson($productdb)
    {
        $p = new self($productdb->sku, $productdb->name, $productdb->price, $productdb->dvd_size);
        return $p;
    }





  /**
   * Get the value of dvd_size
   */
    public function getDvdSize()
    {
        return $this->dvd_size;
    }

  /**
   * Set the value of dvd_size
   *
   * @return  self
   */
    public function setDvdSize($dvd_size)
    {
        $this->dvd_size = $dvd_size;
        return $this;
    }
    public function dbBinding($connector)
    {
        $sql = 'INSERT INTO ' . ProductDao::$TABLE . ' SET  sku = :sku, name = :name,
         price = :price ,type = :type ,dvd_size = :dvd_size';
        $stmt = $connector->prepare($sql);
        parent::dbBinding($stmt);
        $stmt->bindParam(':dvd_size', $this->dvd_size);
        return $stmt;
    }

    public function jsonSerialize()
    {
        parent::jsonSerialize();
        $vars = get_object_vars($this);
        return array_merge(parent::jsonSerialize(), $vars);
    }
}
