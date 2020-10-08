<?php 

class Dbh{
private $sName = "localhost";
private $uName = "root";
private $pass = "root";
private $db_name = "wish_list";

protected function connect(){
  $conn = 'mysql:host=' . $this->sName . ';db_name=' . $this->db_name;
  $pdo = new PDO($conn, $this->uName, $this->pass);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  return $pdo;
  }
}