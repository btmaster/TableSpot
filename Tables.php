<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		include_once("include/rolkeuze.php");
		include_once("classes/Restaurant.class.php");

		$restaurant = new Restaurant();	
		$restaurant->SelectedId = $_SESSION['restaurant'];
	} else {
		header("Location: index.php");
	}
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $restaurant->GetTitle(); ?></title>
	<link href="css/Tablespot.css" rel="stylesheet">
</head>
<body>
	<!-- Restaurant -->
	<div id="restauranthouder">
<?php
 
include_once("include/navinclude.php");
 
?><h1>Beheren van tafels</h1>
</div>
</body>
</html>