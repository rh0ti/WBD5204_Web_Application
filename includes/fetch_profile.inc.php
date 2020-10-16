<?php
$conn = mysqli_connect("localhost", "root", "root", "wish_list");
?>

<?php

	$output = '';

		if(isset($_POST["query"]))
		{
			$search = mysqli_real_escape_string($conn, $_POST["query"]);
			$query = "
			SELECT * FROM users ORDER BY user_id";
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
					<a href="guest-profile.php" style="color:#707070; font-size: 23px; text-decoration: none; ">'.$row["name"].'</a></div>
				</div>

				';
			}
			echo $output;
		}
		else
		{
			echo 'No wish yet!';
		}
?>