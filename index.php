<?php
include "includes/header.inc.php";
?>

<?php
if(isset($_SESSION['id'])){
  header("location:profile.php");
}
?>

<!-- Home CSS -->
<link rel="stylesheet" href="public/css/home.css">
    
  <section id="home-page">
    <div class="navigation">
      <img src="public/img/logo.png" alt="">
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
</body>
</html>

<?php
require "./includes/footer.inc.php"
?>