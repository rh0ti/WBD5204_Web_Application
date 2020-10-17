<?php

if(isset($_POST['title'])){
    require '../includes/db_conn.inc.php';

    $title = $_POST['title'];

    if(empty($title)){
        header("Location: ../mywishlist.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO wishes(title) VALUE(?)");
        $res = $stmt->execute([$title]);

        if($res){
            header("Location: ../mywishlist.php?mess=success"); 
        }else {
            header("Location: ../mywishlist.php");
        }
         $conn = null;
        exit();
    }
}else {
    header("Location: ../mywishlist.php?mess=error");
}