<?php

include "includes/autoloader.inc.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/home.css">
    <title>Wish List</title>
</head>
<body>

<?php

$usersObj1 = new UsersView();
$usersObj1->showUser("Daniel");

$usersObj2 = new UsersContr();
$usersObj2->createUser('Jane', "joe@hhd.com", "12323");

?>
    
<section id="home-page">

<div class="navigation">
<img src="img/logo.png" alt="">
<h1 class="logo-title">WISHLIIST.</h1>

<a class="login-button" href="login.php">Login</a>

<a class="signup-button" href="signup.php">Get Started</a>

</div>
<h1>Create your own <br> wishlist.</h1>
<p>And share it with your friends.</p>

<a class="create-button" href="signup.php">Create your free profile >></a>

<img class="gift-girl" src="public/img/girl.png" alt="Girl with Gift">

<div class="circle1"></div>
<div class="circle2"></div>




</section>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</body>
</html>