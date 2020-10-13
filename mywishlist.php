<?php 
require 'classes/db.class.php';
include "includes/navigation.inc.php";
include "init.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/mywishlist.css">
    <title>PHP Projekt</title>
</head>

    <div class="main-section">
        <div class="container-title">
            <h1>Add your Wish</h1>
            <p>Erstelle hier deine Wishlist.</p>
        </div>
       <div class="add-section">
          <form action="add.php" method="POST" autocomplete="off">
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
          $wish = $source->query("SELECT * FROM wish ORDER BY id DESC");
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

    <div class="circle1"></div>
    <div class="circle2"></div>

</body>
</html>

<?php
require "./includes/footer.inc.php"
?>