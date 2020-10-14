<?php

if(isset($_POST['title'])){
    require '../classes/db_conn.php';

    $title = $_POST['title'];

    if(empty($title)){
        header("Location: ../mywishlist.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO todos(title) VALUE(?)");
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