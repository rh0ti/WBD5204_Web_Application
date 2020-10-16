<?php 
include "includes/init.inc.php";
include "includes/navigation.inc.php";
?>

<?php
$conn = mysqli_connect("localhost", "root", "root", "wish_list");
?>

<!--------------------------------------------- PROFILE HTML ----------------------------------------------->


<!-- PROFILE CSS -->
<link rel="stylesheet" href="public/css/profile.css">

<section id="profile-page">
    <div class="container-title">
        <h2>W E L C O M E</h2>
        <h1>Jordi</h1>
        <div class="profile-picture"></div>
        <p>Deine Liste.</p>

        <?php if(isset($_SESSION['login_success'])): ?>
            <div class="success">
            <?php echo $_SESSION['login_success']; ?>
            </div>
            <?php endif;?>
        <?php unset($_SESSION['login_success']); ?><br>
    </div>  
    <div class="container-button">
        <button>Drucken</button>
        <button>Teilen</button>
    </div>

    <div class="container-item">
        <div class="item">    
            <p>Kamera</p>
        </div>
        <div class="item">    
            <p>Kamera</p>
        </div>
        <div class="item">    
            <p>Kamera</p>
        </div>
        <div class="item">    
            <p>Kamera</p>
        </div>
        <div class="item">    
            <p>Kamera</p>
        </div>
        <div class="item">    
            <p>Kamera</p>
        </div>
        <div class="item">    
            <p>Kamera</p>
        </div>
    </div>
</section>

<div class="circle1"></div>
<div class="circle2"></div>

<?php
require "includes/footer.inc.php"
?>