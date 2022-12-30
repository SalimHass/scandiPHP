<?php 
  class Database {

    /*
    
    private $host = 'localhost';
    private $db_name = 'id20083607_maindb';
    private $username = 'id20083607_salimdb';
    private $password = '';
    */

    // DB Params
    private $host = 'localhost';
    private $db_name = 'scanditest';
    private $username = 'root';
    private $password = '';
    

    // DB Connect
    public function connect() {
      $this->conn = null;

      try { 
        $pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $pdo;
    }
  }