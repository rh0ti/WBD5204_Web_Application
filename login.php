<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wish List</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    
<section id="home-page">

<div class="navigation">
<img src="img/logo.png" alt="">
<h1 class="logo-title">Wishliist.</h1>


<a class="login-button" href="index.php">Home</a>

<a class="signup-button" href="#">Sign Up</a>

</div>


<div class="text2">
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

        <div class="box2">
            <form class="form" action="includes/login.inc.php" method="post">
                <input class="username" type="text" name= "mailuid" placeholder="Username/E-Mail...">
                <input class="password"type="password" name= "pwd" placeholder="Password">
                <button class="button" type="submit" name="login-submit">Login</button>
            </form>
          </div>
 </section>


<div class="circle1"></div>
<div class="circle2"></div>




</section>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>
</html>

</section>
            
            

            
            
