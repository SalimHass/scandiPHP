<?php 
  class Database {

    
    
    private $host = 'localhost';
    private $db_name = 'id20083607_scanditest';
    private $username = 'id20083607_salimhass';
    private $password = 'ZO4g/riCWj{3!>*9';
    

    // DB Params
    /*
    private $host = 'localhost';
    private $db_name = 'scanditest';
    private $username = 'root';
    private $password = '';
    */

    // DB Connect
    public function connect() {

      try { 
        $pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $pdo;
    }
  }