<?php
include "includes/header.inc.php";
?>

<?php
if(isset($_SESSION['id'])){
  header("location:../discover.php");
}
if(isset($_POST['signup'])){
  
  $data = [
    'name' => $_POST['uid'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'confirm_password' => $_POST['confirm'],
    'name_error' => '',
    'email_error' => '',
    'password_error' => '',
    'confirm_error' => '',
  ];

   echo $data['email'];

  if(empty($data['name'])){
    $data['name_error'] = "Name is required";
  }

  if(empty($data['email'])){
    $data['email_error'] = "Email is required";
  } else {
    if($source->Query("SELECT * FROM users WHERE email = ?", [$data['email']])){
      if($source->CountRows() > 0){
        $data['email_error'] = "Email already exists";
      }
    }
  }

  if(empty($data['password'])){
    $data['password_error'] = "Password is required";
  } else if(strlen($data['password']) < 5){
    $data['password_error'] = "Password is too short";
  }

  if(empty($data['confirm_password'])){
    $data['confirm_error'] = "Confirm password is required";
  } else if($data['password'] != $data['confirm_password']){
    $data['confirm_error'] = "Confirm password does not match";
  }

  if(empty($data['name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_error'])){
    $password = password_hash($data['password'], PASSWORD_DEFAULT);
    if($source->Query("INSERT INTO users (name,email,password) VALUES (?,?,?)", [$data['name'], $data['email'], $password])){
      $_SESSION['account_created'] = "Du hast dich erfolgreich registriert! Log dich ein.";
      header("location:login.php");
    }
  }

}

?>

<!--------------------------------------------- SIGNUP HTML ----------------------------------------------->

<!-- SIGNUP CSS -->
<link rel="stylesheet" href="public/css/signup.css">
    
<section id="signup-page">
  <div class="navigation">
    <img src="public/img/logo.png" alt="">
    <h1 class="logo-title">WISHLIIST.</h1>
    <a class="login-button" href="index.php">Home</a>
    <a class="signup-button" href="login.php">Login</a>
  </div>
  <div class="box">
      <h1>Registrierung</h1>
      <p>Hast du bereits einen Account? <a class="link-button" href="login.php">Login</a></p>
  </div>

<!--------------------------------------------- SIGNUP FORMULAR ----------------------------------------------->

  <form class="form" action="" method="post">
      <input type="text" name="uid" class="username" placeholder="Enter Name" value="<?php if(!empty($data['name'])): echo $data['name']; endif; ?>">
      <div class="error">
          <?php if(!empty($data['name_error'])): ?>
              <?php echo $data['name_error']; ?>
          <?php endif; ?>
      <br>
      <input type="email" name="email" class="email" placeholder="Enter Email" value="<?php if(!empty($data['email'])): echo $data['email']; endif; ?>">
          <div class="error">
              <?php if(!empty($data['email_error'])): ?>
                  <?php echo $data['email_error']; ?>
              <?php endif; ?>
      <br>
      <input type="password" name="password" class="password" placeholder="Create Password" value="<?php if(!empty($data['password'])): echo $data['password']; endif; ?>">
          <div class="error">
              <?php if(!empty($data['password_error'])): ?>
                  <?php echo $data['password_error']; ?>
              <?php endif; ?>
      <br>
      <input type="password" name="confirm" class="password2" placeholder="Confirm Password" value="<?php if(!empty($data['confirm_password'])): echo $data['confirm_password']; endif; ?>">
          <div class="error">
              <?php if(!empty($data['confirm_error'])): ?>
                  <?php echo $data['confirm_error']; ?>
              <?php endif; ?>
      <br>
      <button class="button" type="submit" name="signup">Signup</button>
  </form>

  <div class="circle1"></div>
  <div class="circle2"></div>
</section>

<?php
require "./includes/footer.inc.php"
?>