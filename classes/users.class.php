<?php

//only class who interact with database
//handles all the Database interactions from view/controller
class Users extends Dbh{

    protected function getUser($name){
        $sql = "SELECT * FROM users WHERE uidUsers = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);

        $results = $stmt->fetchAll();
        return $results;
    }


    public function setUser($username, $email, $password){
        $sql = "INSERT INTO users (uidUsers,emailUsers,pwdUsers) VALUES(?,?,?)"; 
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $email, $password]);
    }

}

