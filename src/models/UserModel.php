<?php

require_once("src/models/BaseModel.php");

class UserModel extends BaseModel{

  // Get all users from DB
  public function getUsers(){
    $query = "SELECT * FROM users";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Get a single user from DB
}