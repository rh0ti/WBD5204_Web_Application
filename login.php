<?php include "includes/header.inc.php";?>


<?php if(isset($_SESSION['id'])): ?>
  <?php header("location:profile.php"); ?>
<?php endif; ?>

<?php
if(isset($_POST['login'])){
  $data = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'email_error' => '',
    'password_error' => ''
  ];

  if (empty($data['email'])){
    $data['email_error'] = "Email is required";
  }

  if(empty($data['password'])){
    $data['password_error'] = "Password is required";
  }

  if(empty($data['email_error']) && empty($data['password_error'])){
    if($source->Query("SELECT * FROM users WHERE email = ?", [$data['email']])){
      if($source->CountRows() > 0){
        $row = $source->Single();
        $id = $row->id;
        $db_password = $row->password;
        $name = $row->name;
        if(password_verify($data['password'], $db_password)){

          $_SESSION['profile'] = " " .$name . " ";
          $_SESSION['login_success'] = "Hi ".$name . " You logged in successfully";
          $_SESSION['id'] = $id;
          header("location:profile.php");
        } else {
          $data['password_error'] = "Please enter correct password";
        }
      } else {
        $data['email_error'] = "Please enter correct email";
      }
    }
  }

}
?>

<!-- LOGIN CSS -->
<link rel="stylesheet" href="public/css/login.css">

 <!--------------------------------------------- PHP - Navigation ----------------------------------------------->   
    
<section id="login-page">

    <div class="navigation">
      <img src="public/img/logo.png" alt="">
      <h1 class="logo-title">WISHLIIST.</h1>
      <a class="login-button" href="index.php">Home</a>
      <a class="signup-button" href="signup.php">Sign Up</a>
    </div>
    <div class="box">
        <h1>Login</h1>
        <p>Noch kein Account? <a href="signup.php">Signup</a></p>
    </div>

<!--------------------------------------------------- Login Formular --------------------------------------------------------->    

    <form class="login-form" action="" method="POST">
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

        <?php 
            if(isset($_SESSION['account_created'])):?>
            <div class="success">
                <?php echo $_SESSION['account_created']; ?>
            </div>
            <?php endif; ?>
        <?php unset($_SESSION['account_created']); ?>
    </form>
</section>

<div class="circle1"></div>
<div class="circle2"></div>
    
<?php
require "./includes/footer.inc.php"
?>
            
            
