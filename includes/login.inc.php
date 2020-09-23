<?php
session_start();


//wenn submit gedrückt wird
if(isset($_POST['login-submit'])){

    //Connection to Database
    require 'dbh.inc.php';


    //Eingabe von User einholen
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    //Ist etwas leer?
    if(empty($mailuid) || empty($password)){
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    else{//gibt es ein Match im Databank?
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../login.php?error=sqlerror");
            exit();
        }
    else{
        //pass the info
        mysqli_stmt_bind_param($stmt,"ss", $mailuid, $mailuid);
        //result von database
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
            $pwdCheck = password_verify($password, $row['pwdUsers']);
            if ($pwdCheck == false){
                header("Location: ../login.php?error=wrongpwd");
                exit();
            }
            else if ($pwdCheck == true){
                $_SESSION['userId'] = $row['pwdUsers'];
                $_SESSION['userUid'] = $row['uidUsers'];

                header("Location: ../geheim.php?login=success");
                exit();

            }
            else{
                header("Location: ../login.php?error=wrongpwd");
                exit();
            }
        }
        else{
            header("Location: ../login.php?error=nouser");
            exit();
        }
    }
    }
}
else{
    header("Location: ../login.php");
    exit();
}