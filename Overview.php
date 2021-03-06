<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		try
		{
		include_once("include/rolkeuze.php");
		$email = $_SESSION['email'];
		include_once("classes/Restaurant.class.php");
		$restaurant = new Restaurant();	
		$restaurant->SelectedId = $_GET['id'];
		include_once("classes/Customer.class.php");
		$customer = new Customer();
		$activeUser = $customer->Select($email);
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
	<title>Overzicht</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link href="css/Tablespot.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/index.js" type="text/javascript"></script>
</head>
<body>
	<!-- klant -->
	<div id="user">
	<?php
	 
	include_once("include/navincludeKlant.php");
	 
	?>
	<div id="container">
		<div class="menus">
		<h1>Vrije tafels</h1>

			<?php
			try{
				if(!empty($activeUser))
				{
					include_once("include/navincludeKlant.php");
					include_once("classes/Reservation.class.php");
					include_once("classes/Restaurant.class.php");
					$reservation = new Reservation();
					$restaurant = new Restaurant();
					$allreservations = $reservation->SelectReservaties($activeUser['ID_Customer']);

					while ($oneReservation = $allreservations->fetch_assoc())
					{
						$oneRestaurant = $restaurant->getRestaurant($oneReservation["FK_Restaurant_ID"]);
						echo "<p>1 Tafel met " . $oneReservation["AmountPeople"] . " plaatsen bij het restaurant " . $oneRestaurant["Name"] . ".<a href='#' class='annuleren' data-id='" . $oneReservation['ID_Resevation'] . "'>Annuleren</a></p><br/>";
					}
				}
				
			} catch (Exception $e) {

				$error = $e->getMessage();
					
			}
			
			 
			?>
			
		</div>
		</div>
		<?php
		if(isset($error))
		{
			echo "<p>$error</p>";
		}
		?>
		</div>
</body>
</html>