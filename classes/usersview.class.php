<?php

//Fetch/Show things
class UsersView extends Users{

public function showUser($name){
    $results = $this->getUser($name);
    echo "Full name:". $results['uidUsers'];
}
}