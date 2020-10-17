<?php

if(isset($_POST['id'])){
    require '../includes/db_conn.inc.php';

    $id = $_POST['id'];

    if(empty($id)){
       echo 'error';
    }else {
        $wishes = $conn->prepare("SELECT id, checked FROM wishes WHERE id=?");
        $wishes->execute([$id]);

        $wish = $wishes->fetch();
        $uId = $wish['id'];
        $checked = $wish['checked'];

        $uChecked = $checked ? 0 : 1;

        $res = $conn->query("UPDATE wishes SET checked=$uChecked WHERE id=$uId");

        if($res){
            echo $checked;
        }else {
            echo "error";
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../mywishlist.php?mess=error");
}