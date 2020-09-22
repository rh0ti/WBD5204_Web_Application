<?php

if(isset($_POST['title'])){
    require '../includes/db.inc.php';

    $title = $_POST['title'];

    if(empty($title)){
        header("Location: ../profile.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO wish(title) VALUE(?)");
        $res = $stmt->execute([$title]);

        if($res){
            header("Location: ../profile.php?mess=success"); 
        }else {
            header("Location: ../profile.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../profile.php?mess=error");
}