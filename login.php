<?php include "init.php";?>
<?php if(isset($_SESSION['id'])): ?>
  <?php header("location:profile.php"); ?>
<?php endif; ?>

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


<!--------------------------------------------------- Login Formular --------------------------------------------------------->    

    <form action="includes/login.inc.php" method="POST">

        <?php 
            if(isset($_SESSION['account_created'])):?>
            <div class="success">
                <?php echo $_SESSION['account_created']; ?>
            </div>
            <?php endif; ?>
        <?php unset($_SESSION['account_created']); ?>

        <input type="email" name="email" class="username" placeholder="Enter Email" value="<?php if(!empty($data['email'])): echo $data['email']; endif; ?>">
        <div class="error">
            <?php if(!empty($data['email_error'])): ?>
            <?php echo $data['email_error']; ?>
            <?php endif; ?>
        </div>
        <br>
        <input type="password" name="password" class="password" placeholder="Enter Password" value="<?php if(!empty($data['password'])): echo $data['password']; endif; ?>">
        <div class="error">
            <?php if(!empty($data['password_error'])): ?>
            <?php echo $data['password_error']; ?>
            <?php endif; ?>
        </div>
        <br>
        <input type="submit" name="login" class="button" value="Login">
    </form>




<div class="circle1"></div>
<div class="circle2"></div>


</body>
</html>

</section>
            
            
<?php
require "./includes/footer.inc.php"
?>
            
            
