<?php 
include "includes/init.inc.php";
include "includes/navigation.inc.php";
?>


<!--------------------------------------------- PROFILE HTML ----------------------------------------------->


<!-- GUEST PROFILE CSS -->
<link rel="stylesheet" href="public/css/profile.css">

<section id="profile-page">
    <div class="container-title">
        <h2>W I S H L I S T</h2>
        <h1>Marco</h1>

        <img class="profile-picture" src="public/img/cat2.jpg" alt="">

        <?php if(isset($_SESSION['login_success'])): ?>
            <div class="success">
            <?php echo $_SESSION['login_success']; ?>
            </div>
            <?php endif;?>
        <?php unset($_SESSION['login_success']); ?><br>
    </div>  

    <div class="container-item">
        <div class="item">    
            <p>Camera</p>
        </div>
        <div class="item">    
            <p>Book</p>
        </div>
        <div class="item">    
            <p>Iphone</p>
        </div>
        <div class="item">    
            <p>Kamera</p>
        </div>
        <div class="item">    
            <p>Laptop</p>
        </div>
        <div class="item">    
            <p>TV</p>
        </div>
    </div>
</section>

<div class="circle1"></div>
<div class="circle2"></div>

<?php
require "includes/footer.inc.php"
?>