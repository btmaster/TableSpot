<?php
	
	session_start();
	if(isset($_SESSION['email']))
	{
		try
		{
			include_once("classes/Restaurant.class.php");

			$restaurant = new Restaurant();
			$_GET['id'] = $_SESSION['restaurant'];	
			$restaurant->SelectedId = $_GET['id'];

			if(!empty($_POST['name']))
			{
				include_once("classes/Menu.class.php");
				$menu = new Menu();
				$menu->name = $_POST['name'];
				$menu->description = $_POST['description'];
				$menu->restaurant = $_SESSION['restaurant'];
				$menu->Save();
				echo "<style>
				#menu
				{
					display:none;
				}
				#gerechten
				{
					display:block !important;
				}

				</style>";

			}
		} catch (Exception $e)
		{
			$error = $e->getMessage();
		}
		
	} else {
		header("Location: index.php");
	}
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $restaurant->GetTitle(); ?></title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link href="css/Tablespot.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/index.js" type="text/javascript"></script>
</head>
<body>
	<!-- Restaurant -->
	<div id="restauranthouder">
<?php
 
include_once("include/navincludehouder.php");
 
?>
	<div id="menu">
	<h1>Add a menu</h1>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<label for="name">Name</label><br/>
		<input type="text" name="name" id="name"><br/>
		<label for="description">Description</label><br/>
		<input type="textarea" name="description" id="description"><br/>
		<input type="submit" name="btnVoegtoe" value="Voeg Toe" id="maakMenu"><br/>
	</form>

	</div>
		<div id="gerechten">
		<h1>Add dish</h1>

		<?php
			include_once("classes/Menu.class.php");
			$menu = new Menu();
			$oneMenu = $menu->GetLatest($_SESSION['restaurant']);
			if ($oneMenu == "no menu")
			{echo "test";} else {
				echo "<p>Menu: ".$oneMenu['Name']."</p>";
				echo "<p>Description: ".$oneMenu['Discription']."</p>";
			}
		?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="gerecht">Dish</label><br/>
			<input type="text" name="gerecht" id="gerecht"><br/>
			<label for="prijs">Price</label><br/>
			<input type="textarea" name="prijs" id="prijs"><br/>
			<input type="submit" name="btnVoegtoe" value="Voeg Toe" id="maakGerecht"><br/>
		</form>

		<div id="lijstgerechten">
		</div>
		<p><a href="Home.php" alt="home">Done</a></p>

		</div>

		
		
	</div>
	

	<?php if(isset($error)){echo $error;} ?>
</body>
</html>