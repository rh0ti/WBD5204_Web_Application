<?php 
require 'classes/db_conn.php';
include "includes/navigation.inc.php";
include "includes/init.inc.php";
?>

<!--------------------------------------------- WISHLIST HTML ----------------------------------------------->

<!-- WISHLIST CSS -->
<link rel="stylesheet" href="public/css/mywishlist.css">

<div class="container-title">
    <h1>Add your Wish</h1>
    <p>Erstelle hier deine Wishlist.</p>

    <?php if(isset($_SESSION['login_success'])): ?>
            <div class="success">
            <?php echo $_SESSION['login_success']; ?>
            </div>
            <?php endif;?>
        <?php unset($_SESSION['login_success']); ?><br>



</div>
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
          $wishes = $conn->query("SELECT * FROM wishes ORDER BY id DESC");
       ?>
       <div class="show-wish-section">
            <?php if($wishes->rowCount() <= 0){ ?>
                <div class="wish-item">
                    <div class="empty">
                        <img src="public/img/tenor.gif" width="60%" />
                        <h3>Make a wish.</h3>
                    </div>
                </div>
            <?php } ?>
            <?php while($wish = $wishes->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="wish-item">
                    <span id="<?php echo $wish['id']; ?>"
                          class="remove-wish">x</span>
                    <?php if($wish['checked']){ ?> 
                        <input type="checkbox"
                               class="check-box"
                               data-wish-id ="<?php echo $wish['id']; ?>"
                               checked />
                        <h2 class="checked"><?php echo $wish['title'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox"
                               data-wish-id ="<?php echo $wish['id']; ?>"
                               class="check-box" />
                        <h2><?php echo $wish['title'] ?></h2>
                    <?php } ?>
                    <br>
                    <small>created: <?php echo $wish['date_time'] ?></small> 
                </div>
            <?php } ?>
       </div>
    </div>

    <!-- <div class="circle1"></div>
    <div class="circle2"></div> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
</body>
</html>
  

<!--------------------------------------------- JQUERY ----------------------------------------------->
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