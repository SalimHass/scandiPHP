<?php

namespace Scandi\Models;

use Scandi\Dao\{ProductDao};

class FurnitureProduct extends Product
{
    private $height;
    private $width;
    private $length;
    public function __construct($sku, $name, $price, $height, $width, $length)
    {
        parent::__construct($sku, $name, $price);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
        $this->setType("Furniture");
    }



    public static function fetchByDb($productdb)
    {
        $p = new self(
            $productdb['sku'],
            $productdb['name'],
            $productdb['price'],
            $productdb['f_height'],
            $productdb['f_width'],
            $productdb['f_length']
        );
        if ($productdb['id']) {
            $p-> setId($productdb['id']);
        }
        return $p;
    }


    public static function createFromJson($productdb)
    {
        $p = new self(
            $productdb->sku,
            $productdb->name,
            $productdb->price,
            $productdb->f_height,
            $productdb->f_width,
            $productdb->f_length
        );
        return $p;
    }



    /**
     * Get the value of height
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set the value of height
     *
     * @return  self
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * Get the value of width
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set the value of width
     *
     * @return  self
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * Get the value of length
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set the value of length
     *
     * @return  self
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    public function dbBinding($connector)
    {
        $sql = 'INSERT INTO ' . ProductDao::$TABLE . ' SET  sku = :sku, name = :name, price = :price ,
         type = :type , f_height = :f_height, f_width = :f_width, f_length = :f_length';
        $stmt = $connector->prepare($sql);
        parent::dbBinding($stmt);
        parent::dbBinding($stmt);
        $stmt->bindParam(':f_height', $this->height);
        $stmt->bindParam(':f_width', $this->width);
        $stmt->bindParam(':f_length', $this->length);
        return $stmt;
    }

    public function jsonSerialize()
    {
        parent::jsonSerialize();
        $vars = get_object_vars($this);
        return array_merge(parent::jsonSerialize(), $vars);
    }
}
