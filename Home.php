<?php 
	session_start();
	if(isset($_SESSION['email']))
	{
		try {
		include_once("include/rolkeuze.php");
		include_once("classes/Restaurant.class.php");
		
		$restaurant = new Restaurant();
		if (!empty($_POST)) {
			
				$restaurant->Email=$_SESSION['email'];
				$restaurant->Name=$_POST['Name'];
				$restaurant->Categorie=$_POST['Categorie'];
				$restaurant->Discription=$_POST['Discription'];
				$restaurant->Opening=$_POST['Opening'];
				$restaurant->Closing=$_POST['Closing'];
					
				$restaurant->SaveRestaurant();	
		}
		} catch (Exception $e) {

			$error = $e->getMessage();			
		}
	} else {
		header("Location: index.php");
	}




?><!-- ajax --><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>Home</title>
	<link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<!-- restauranthouder -->

	<div id="restauranthouder">
		
		<h1>Restaurant</h1>
		<div class="table-responsive">
           <?php      
		$res = $restaurant->GetAllRestaurants();

                            while($restaurantdetails = $res->fetch_assoc())
                            {
                            echo "<div class='restaurant'><a href='Restaurant.php?id=".$restaurantdetails['ID_Restaurant']."'>";
                            echo "<h1>" .$restaurantdetails['Name'] . "</h1>";
                            echo "<h2>" .$restaurantdetails['Categorie'] . "</h2>";
                            echo "<p>" .$restaurantdetails['Discription'] . "</p>";
 							echo "</div></a>";
                            }

		?>
		</div>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="Name">Name</label>
			<input type="text" name="Name">
			<label for="Categorie">Categorie</label>
			<input type="text" name="Categorie">
			<label for="Discription">Discription</label>
			<input type="textarea" name="Discription">
			<label for="Opening">Opening time</label>
			<input type="time" name="Opening" id="Opening">
			<label for="Closing">Closing time</label>
			<input type="time" name="Closing" id="Closing">
			<input type="submit" name="btnsubmit">
		</form>
<!-- ajax <li> Restaurant toevoegen</li> -->
	</div>


<!-- klant -->
	<div id="user">
		<h1>Klant</h1>
		<?php
		include_once("include/navincludeKlant.php");
		 
		?>
				<div class="table-responsive">
		           <?php   

				$res = $restaurant->GetAllRestaurants();

		                            while($restaurantdetails = $res->fetch_assoc())
		                            {
		                            echo "<div class='restaurant'><a href='Restaurant.php?id=".$restaurantdetails['ID_Restaurant']."'>";
		                            echo "<h1>" .$restaurantdetails['Name'] . "</h1>";
		                            echo "<h2>" .$restaurantdetails['Categorie'] . "</h2>";
		                            echo "<p>" .$restaurantdetails['Discription'] . "</p>";
		 							echo "</div></a>";
		                            }

				?>
				</div>
				
	</div>

	<?php 
		if(isset($error))
		{
			echo $error;
		}


	?>

	
</body>
</html>