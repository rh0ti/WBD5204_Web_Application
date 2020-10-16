<?php
include "includes/navigation.inc.php";
?>

<!--------------------------------------------- DISCOVER HTML ----------------------------------------------->

<!-- DISCOVER CSS -->
<link rel="stylesheet" href="public/css/discover.css">

<section id="discover-page">
	<div class="container-title">
		<h1>Discover</h1>
		<p>Suche deine Freunde und durchstöbere Ihre Wishliist.</p>
		<input class="search-field"  type="text" name="search_text" id="search_text" placeholder="Search for a name" />
	</div>
	<div id="result"></div>
</section>
<div class="circle1"></div>
<div class="circle2"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

<!--------------------------------------------- JQUERY ----------------------------------------------->

<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"includes/fetch.inc.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>