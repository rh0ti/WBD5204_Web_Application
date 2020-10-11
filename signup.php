<?php
include "includes/autoloader.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/signup.css">
    <title>PHP Projekt</title>
</head>
    
<section id="signup-page">

<div class="navigation">
<img src="img/logo.png" alt="">
<h1 class="logo-title">WISHLIIST.</h1>


<a class="login-button" href="index.php">Home</a>

<a class="signup-button" href="login.php">Login</a>

</div>

<div class="box">
    <h1>Registrierung</h1>
    <p>Hast du bereits einen Account? <a class="link-button" href="login.php">Login</a></p>
</div>

<!--------------------------------------------- ERROR MELDUNGEN ----------------------------------------------->
                <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == "emptyfields"){
                        echo '<p class="error">Bitte alle Felder ausfüllen!</p>';
                    }
                    else if($_GET['error'] == "invaliduidmail"){
                        echo '<p class="error">Username oder Email ist falsch!</p>';
                    }
                    else if($_GET['error'] == "invaliduid"){
                        echo '<p class="error">Der Username ist falsch!</p>';
                    }  
                    else if($_GET['error'] == "invalidmail"){
                        echo '<p class="error">Die Email ist falsch!</p>';
                    }
                    else if($_GET['error'] == "passwordcheck"){
                        echo '<p class="error">Dein Passwort stimmt nicht überrein!</p>';
                    }             
                    else if($_GET['error'] == "usertaken"){
                        echo '<p class="error">Dieser Username oder Email wird bereits benutzt!</p>';
                    }   
                    else if($_GET["error"] == "success"){
                        echo '<p class="success">Registrierung erfolgreich! Jetzt kannst du dich einloggen.</p>';
                    }
                }
            ?>
<!--------------------------------------------- SIGNUP FORMULAR ----------------------------------------------->

        <form class="form" action="includes/signup.inc.php" method="post">
            <input class="username" type="text" name="uid" placeholder= "Username" autofocus>
            <br>
            <input class="email" type="text" name="mail" placeholder= "E-Mail">
            <br>
            <input class="password" type="password" name="pwd" placeholder= "Password">
            <br>
            <input class="password2" type="password" name="pwd-repeat" placeholder= "Repeat password">
            <br>
            <button class="button" type="submit" name=signup-submit>Signup</button>
        </form>



<div class="circle1"></div>
<div class="circle2"></div>

</section>

<?php
require "./includes/footer.inc.php"
?>