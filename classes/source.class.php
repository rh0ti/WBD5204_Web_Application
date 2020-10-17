<?php
class source extends db {

  public $Query;

  public function Query($query, $param = []){
    if(empty($param)){
      $this->Query = $this->db->prepare($query);
      return $this->Query->execute();

    } else {

      $this->Query = $this->db->prepare($query);
      return $this->Query->execute($param);
    }
  }
  public function CountRows(){
    return $this->Query->rowCount();
  }

  public function FetchAll(){
    return $this->Query->FetchAll(PDO::FETCH_OBJ);
  }

  public function Single(){
    return $this->Query->fetch(PDO::FETCH_OBJ);
  }
}

// ?> 