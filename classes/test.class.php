<?php

class Test extends Dbh {

    public function getUsers(){
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->query($sql);
        while($row = $stmt->fetch()){
            echo $row['uidUsers']. '<br>';
        }
    }

    public function getUsersStmt($username){
        $sql = "SELECT * FROM users WHERE uidUsers = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $names = $stmt->fetchAll();

        foreach($names as $name){
            echo $name['uidUsers']. '<br>';

        }
    }

    public function setUsersStmt($username, $email, $password){
        $sql = "INSERT INTO users (uidUsers,emailUsers,pwdUsers) VALUES(?,?,?)"; 
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $email, $password]);
    }

}