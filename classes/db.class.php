<?php

//Klasse definieren
class db {

  //Eigenschaft definieren
  private $host = "localhost";
  private $username = "root";
  private $password = "root";
  private $database = "wish_list";
  protected $db;

  //Konstruktor aufrufen
  public function __construct(){
    try {

        $this->db = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
        // echo "Connection has been created successfully";

    } catch(PDOException $e){
      echo "Connection Problem: ". $e->getMessage();

    }
  }
}



?>