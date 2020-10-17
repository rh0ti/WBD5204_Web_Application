<?php 
include "includes/init.inc.php";
include "includes/navigation.inc.php";
?>


<!--------------------------------------------- PROFILE HTML ----------------------------------------------->


<!-- PROFILE CSS -->
<link rel="stylesheet" href="public/css/profile.css">


<section id="profile-page">
    <div class="container-title">

  

        <h2>W E L C O M E</h2>
        <h1><?php echo $_SESSION['profile']; ?></h1>

        <img class="profile-picture" src="public/img/cat1.jpg" alt="">
        <p>Deine Liste.</p>

        <?php if(isset($_SESSION['login_success'])): ?>
            <div class="success">
            <?php echo $_SESSION['login_success']; ?>
            </div>
            <?php endif;?>
        <?php unset($_SESSION['login_success']); ?><br>
    </div>  
    <div class="container-button">
        <button onclick="window.print()">Drucken</button>
        <script>
    function getURL() {
        alert("The URL of this page is: " + window.location.href);
    }
    </script>
     
    <button type="button" onclick="getURL();">Teilen</button>
        
    </div>

    <br>

    <div class="container-item">

    <?php
    $conn = mysqli_connect("localhost", "root", "root", "wish_list");
    ?>

        <?php

            $sql = ("SELECT * FROM wishes");
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                echo "<div class='item' style='color:#707070;font-size: 23px;' >";
                echo $row['title'];
                echo "</div>";
                }
            }else{
                echo "<p style='font-size:23px; width:500px; position:relative; left:100px; top:10px; z-index:8;' >";
                echo "Du hast noch keine wishes hinzugefügt.";
                echo "</p>";
            };

        ?>



</section>

<div class="circle1"></div>
<div class="circle2"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

<!-- <?php
require "includes/footer.inc.php"
?> -->



