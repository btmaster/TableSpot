<?php
	
	session_start();
	if(isset($_SESSION['email']))
	{
		include_once("include/rolkeuze.php");
		include_once("classes/Restaurant.class.php");

		$restaurant = new Restaurant();
		$_GET['id'] = $_SESSION['restaurant'];	
		$restaurant->SelectedId = $_GET['id'];

		if(!empty($_POST))
		{
			include_once("classes/Menu.class.php");
			$menu = new Menu();
			$menu->name = $_POST['name'];
			$menu->description = $_POST['description'];
			$menu->restaurant = $_SESSION['restaurant'];
			$menu->Save();

		}
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
 
?>
	<h1>Menu toevoegen</h1>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<label for="name">Naam</label><br/>
		<input type="text" name="name" id="name"><br/>
		<label for="description">Beschrijving</label><br/>
		<input type="text" name="description" id="description"><br/>
		<input type="submit" name="btnVoegtoe" value="Voeg Toe"><br/>
	</form>
		
	</div>
	<!-- klant -->
	<div id="user">
		<h1>Klant</h1>
	</div>
</body>
</html>