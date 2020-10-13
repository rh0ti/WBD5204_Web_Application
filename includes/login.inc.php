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

          $_SESSION['login_success'] = "Hi ".$name . " You logged in successfully";
          $_SESSION['id'] = $id;
          header("location:../profile.php");
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