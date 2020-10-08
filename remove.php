<?php

if(isset($_POST['id'])){
    require '../classes/dbh.class.php';

    $id = $_POST['id'];

    if(empty($id)){
       echo 0;
    }else {
        $stmt = $conn->prepare("DELETE FROM wish WHERE id=?");
        $res = $stmt->execute([$id]);

        if($res){
            echo 1;
        }else {
            echo 0;
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../mywishlist.php?mess=error");
}