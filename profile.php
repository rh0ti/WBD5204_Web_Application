<?php 
require 'includes/db.inc.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wish List</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    
<section id="home-page">

<div class="navigation">
<img src="img/logo.png" alt="">
<h1 class="logo-title">WISHLIIST.</h1>


<a class="login-button" href="index.php">Home</a>

<a class="signup-button" href="#">Sign Up</a>

</div>




<body>
    <div class="main-section">
       <div class="add-section">
          <form action="app/add.php" method="POST" autocomplete="off">
             <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <input type="text" 
                     name="title" 
                     style="border-color: #ff6666"
                     placeholder="This field is required" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>

             <?php }else{ ?>
              <input type="text" 
                     name="title" 
                     placeholder="Type in your wish." />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>
             <?php } ?>
          </form>
       </div>
       <?php 
          $wish = $conn->query("SELECT * FROM wish ORDER BY id DESC");
       ?>
       <div class="show-wish-section">
            <?php if($wish->rowCount() <= 0){ ?>
                <div class="wish-item">
                    <div class="empty">
                        <img src="img/f.png" width="100%" />
                        <img src="img/Ellipsis.gif" width="80px">
                    </div>
                </div>
            <?php } ?>

            <?php while($wishlist = $wish->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="wish-item">
                    <span id="<?php echo $wishlist['id']; ?>"
                          class="remove-wish">x</span>
                    <?php if($wishlist['checked']){ ?> 
                        <input type="checkbox"
                               class="check-box"
                               data-wish-id ="<?php echo $wishlist['id']; ?>"
                               checked />
                        <h2 class="checked"><?php echo $wishlist['title'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox"
                               data-wish-id ="<?php echo $wishlist['id']; ?>"
                               class="check-box" />
                        <h2><?php echo $wishlist['title'] ?></h2>
                    <?php } ?>
                    <br>
                    <small>created: <?php echo $wishlist['date_time'] ?></small> 
                </div>
            <?php } ?>
       </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.remove-wish').click(function(){
                const id = $(this).attr('id');
                
                $.post("app/remove.php", 
                      {
                          id: id
                      },
                      (data)  => {
                         if(data){
                             $(this).parent().hide(600);
                         }
                      }
                );
            });

            $(".check-box").click(function(e){
                const id = $(this).attr('data-wish-id');
                
                $.post('app/check.php', 
                      {
                          id: id
                      },
                      (data) => {
                          if(data != 'error'){
                              const h2 = $(this).next();
                              if(data === '1'){
                                  h2.removeClass('checked');
                              }else {
                                  h2.addClass('checked');
                              }
                          }
                      }
                );
            });
        });
    </script>
</body>
</html>