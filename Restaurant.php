<?php
	
	session_start();

	include_once("include/rolkeuze.php");
	include_once("classes/Restaurant.class.php");

	$restaurant = new Restaurant();
	$restaurant->SelectedId = $_GET['id']; 

$res = $restaurant->GetAllRestaurants();

                            while($restaurantdetails = $res->fetch_assoc())
                            {
                           
                            }
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<!-- Restaurant -->
	<div id="restauranthouder">
<nav>
	<li><a href="Menu.php">Menu</a></li>
	<li><a href="Tables.php">Tables</a></li>
	<li><a href="Overview.php">Tables</a></li>
</nav>
		
		<?php echo $restaurant->SelectedId; ?>
	</div>
	<!-- klant -->
	<div id="user">
		<h1>Klant</h1>
	</div>
</body>
</html>