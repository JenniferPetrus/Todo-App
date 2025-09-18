<?php

namespace App\database;
use PDO;

class Database{
  private $host = "localhost";
  private $db_name = "todos";
  private $username = "root";
  private $password = "DimPfmS19022001";
  private $conn;

  public function getConnection(){
    $this->conn = null;

    try {
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
      $this->conn->exec("set names utf8");
    } catch (PDOException $exception){
      echo "Database connection error: " . $exception->getMessage();
    }
    return $this->conn;
  }
}