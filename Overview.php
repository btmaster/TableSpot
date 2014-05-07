<?php 
	session_start(); 
	if(isset($_SESSION['email']))
	{
		try
		{
			$email = $_SESSION['email'];
			include_once("classes/Restauranthouder.class.php");
			$restauranthouder = new Restauranthouder();
			$activeUser = $restauranthouder->Select($email);
			include_once("include/rolkeuze.php");
		}
		catch(Exception $e)
		{

			$error = $e->getMessage();

		}
		

	} else {
		//redirect
		header("Location: index.php");
	}
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>Home</title>
	<link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<!-- restauranthouder -->

	<div id="restauranthouder">
		<p>ja</p>
<!-- ajax <li> Restaurant toevoegen</li> -->
	</div>


<!-- klant -->
	<div id="user">
		<h1>Overzicht reservaties</h1>
		<?php
			echo "activeUser";
		/*try{
			include_once("classes/Restauranthouder.class.php");
			include_once("include/navincludeKlant.php");
			include_once("classes/Reservation.class.php");
			include_once("classes/Restaurant.class.php");
			$restauranthouder = new Restauranthouder();
			$reservation = new Reservation();
			$restaurant = new Restaurant();
			
			$user = $restauranthouder->Select($_SESSION['email']);
			$allreservations = $reservation->SelectReservaties($user['ID_Customer']);

			while ($oneReservation = $allreservations->fetch_assoc())
			{
				$oneRestaurant = $restaurant->getRestaurant($oneReservation["FK_Restaurant_ID"]);
				echo "1 Tafel met " . $oneReservation["AmountPeople"] . " plaatsen bij het restaurant " . $oneRestaurant["Name"] . ".";
			}
		} catch (Exception $e) {

			$error = $e->getMessage();
				
		}
		
		 */
		?>
		
	</div>
	<?php
	if(isset($error))
	{
		echo "<p>$error</p>";
	}
	?>
</body>
</html>