<?php 
include "includes/init.inc.php";
include "includes/navigation.inc.php";
?>


<!--------------------------------------------- PROFILE HTML ----------------------------------------------->


<!-- PROFILE CSS -->
<link rel="stylesheet" href="public/css/profile.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

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


<!--------------------------------------------- JQUERY ----------------------------------------------->


<?php
$conn = mysqli_connect("localhost", "root", "root", "wish_list");
	$output = '';

		if(isset($_POST["query"]))
		{
			$search = mysqli_real_escape_string($conn, $_POST["query"]);
			$query = "
			SELECT * FROM users 
			WHERE name LIKE '%".$search."%'
			OR email LIKE '%".$search."%' 
			";
		}
		else
		{
			$query = "
			SELECT * FROM wishes ";
		}
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0)
		{
			$output .= '';
			while($row = mysqli_fetch_array($result))
			{
				$output .= '

				<div style="width:550px; ">
					<div class="profile-pic" style="float:left; margin:15px; display:flex; justify-content:center; align-items:center; position:relative; " >
					<a href="guest-profile.php" style="color:#707070; font-size: 23px; text-decoration: none; ">'.$row["title"].'</a></div>
				</div>

				';
			}
			echo $output;
		}
		else
		{
			echo 'Data Not Found';
		}
?>