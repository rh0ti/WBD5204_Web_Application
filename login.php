<?php
session_start();
?>

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
    <link rel="stylesheet" href="public/css/login.css">
    <title>PHP Projekt</title>
</head>

 <!--------------------------------------------- PHP - Navigation ----------------------------------------------->   
    
<section id="home-page">

    <div class="navigation">
    <img src="img/logo.png" alt="">
    <h1 class="logo-title">WISHLIIST.</h1>

    <a class="login-button" href="index.php">Home</a>

    <a class="signup-button" href="signup.php">Sign Up</a>

    </div>


<div class="box">
    <h1>Login</h1>
    <p>Noch kein Account? <a href="signup.php">Signup</a></p>
</div>

 <!--------------------------------------------- PHP - Meldung beim Einlogen ----------------------------------------------->      
<?php
    if(isset($_SESSION['userId'])){
        echo '<p class="info" > Du hast dich erfolgreich eingeloggt!</p>';
    }
    else{
        echo '<p class="info" >Log dich ein!</p>';
    }
?>
<!--------------------------- PHP - ERROR Meldung, wenn etwas nicht korrekt ausgefüllt ist! ------------------------------->
        <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == "emptyfields"){
                    echo '<p class="error2">Bitte alle Felder ausfüllen!</p>';
                }
                else if($_GET['error'] == "sqlerror"){
                    echo '<p class="error2">Die Angaben sind falsch!</p>';
                }
                else if($_GET['error'] == "wrongpwd"){
                    echo '<p class="error2">Passwort ist falsch!</p>';
                }  
                else if($_GET['error'] == "nouser"){
                    echo '<p class="error2">Username nicht vorhanden!</p>';
                }
            }
        ?>
<!--------------------------------------------------- Login Formular --------------------------------------------------------->    

    <form class="form" action="includes/login.inc.php" method="post">
        <input class="username" type="text" name= "mailuid" placeholder="Username/E-Mail..."> 
        <br>
        <input class="password"type="password" name= "pwd" placeholder="Password">
        <br>
        <button class="button" type="submit" name="login-submit">SUBMIT</button>
    </form>




<div class="circle1"></div>
<div class="circle2"></div>


</body>
</html>

</section>
            
            
<?php
require "./includes/footer.inc.php"
?>
            
            
