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
		<?php
		 
		include_once("include/navincludeHouder.php");
		 
		?>
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
			<label>Name</label><input type="text" name="Name">
			<!--dropdown--> <label>categorie</label><input type="text" name="Categorie">
			<label>discription</label><input type="textarea" name="Discription">
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

	
</body>
</html>