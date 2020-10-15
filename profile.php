<?php include "init.php";?>

<?php
$conn = mysqli_connect("localhost", "root", "root", "wish_list");
?>

<?php
include "includes/navigation.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/profile.css">
    <title>PHP Projekt</title>
</head>

<section id="profile-page">

<div class="container-title">
        <h2>W E L C O M E</h2>
        <h1>Jordi</h1>
        <div class="profile-picture"></div>
        <p>Deine Liste.</p>

    <?php if(isset($_SESSION['login_success'])): ?>
      <div class="success">
        <?php echo $_SESSION['login_success']; ?>
      </div>
    <?php endif;?>
    <?php unset($_SESSION['login_success']); ?><br>

</div>  

<div class="container-button">

<button>Drucken</button>
<button>Teilen</button>
</div>

    
<div class="container-item">
    <div class="item">    
        <p>Kamera</p>
    </div>
    <div class="item">    
        <p>Kamera</p>
    </div>
    <div class="item">    
        <p>Kamera</p>
    </div>
    <div class="item">    
        <p>Kamera</p>
    </div>
    <div class="item">    
        <p>Kamera</p>
    </div>
    <div class="item">    
        <p>Kamera</p>
    </div>
    <div class="item">    
        <p>Kamera</p>
    </div>

</div>

</section>

<div class="circle1"></div>
<div class="circle2"></div>

<?php
require "./includes/footer.inc.php"
?>