<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		try
		{
			include_once("include/rolkeuze.php");
			include_once("classes/Restaurant.class.php");
			include_once("classes/Reservation.class.php");
			include_once("classes/Tablespot.class.php");

			$restaurant = new Restaurant();	
			$restaurant->SelectedId = $_GET['id'];
			$_SESSION['restaurant'] = $_GET['id'];

			$reservation = new Reservation();
			$allReservations = $reservation->GetAllReservations($_SESSION['restaurant']);

			if(!empty($allReservations))
			{
				$time = date('H:i:s', time());
				$tablespot = new Tablespot();
				
				while ($oneReservation = $allReservations->fetch_assoc())
				{
					if($oneReservation['Date'] < date("Y-m-d"))
					{
						$tablespotId = $reservation->SelectOne($oneReservation['ID_Resevation']);
						$tablespot->Annulation($tablespotId['FK_Table_ID']);
						$reservation->Delete($oneReservation['ID_Resevation']);
					} else {
						if($oneReservation['Date'] === date("Y-m-d"))
						{
							$reservationTime = date('H:i:s', strtotime($oneReservation['Time'])+3600);

							if ($reservationTime < $time)
							{
								$tablespotId = $reservation->SelectOne($oneReservation['ID_Resevation']);
								$tablespot->Annulation($tablespotId['FK_Table_ID']);
								$reservation->Delete($oneReservation['ID_Resevation']);
							} 
						}
					}
				}
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
 
include_once("include/navincludeHouder.php");
 
?>
<div id="container">
<div class="list_1">
	<h1>Arrangement</h1>
	<h2>Select your arrangement of tables</h2>
	<select name="place" id="place">
		<?php 
		try{
			include_once('classes/Placing.class.php');
			$placing = new Placing();
			$activePlacing = $placing->GetPlace($_SESSION['restaurant']);
			$allPlacing = $placing->GetAllRestaurant($_SESSION['restaurant']);

			while ($onePlacing = $allPlacing->fetch_assoc())
			{
				if ($onePlacing['ID_Placing'] === $activePlacing['ID_Placing'])
				{
					echo "<option value='" . $onePlacing['ID_Placing'] . "' selected>" . $onePlacing['Name'] . "</option>";
				} else {
					echo "<option value='" . $onePlacing['ID_Placing'] . "'>" . $onePlacing['Name'] . "</option>";
				}
			}	
		} catch (Exception $e)
		{
			$error = $e->getMessage();
		}


		?>
	</select>
</div>
	<div class="list_1">
		<h1>Spots</h1>
	<div class="divTable">
		<div class="headRow">
			<div class="divCell">TableNumber</div>
			<div class="divCell">Amount of places</div>
			<div class="divCell">Availability</div>
		</div>
		<?php
		try{
			if ($_SESSION['rol'] == "restaurant_keeper")
			{
				$RestaurantId = $restaurant->SelectedId;
				
				include_once('classes/Placing.class.php');
				$placing = new Placing();
				$onePlacing = $placing->GetPlace($RestaurantId);
				
				include_once('classes/Tablespot.class.php');
				$tablespot = new Tablespot();

				$selectTablespot = $tablespot->GetTablePlace($onePlacing['ID_Placing']);
				while ($freespots = $selectTablespot->fetch_assoc())
				{
					echo "<div id='listitem_". $freespots["ID_Table"] ."' class='divRow'>";			
					echo "<div class='divCell'>". $freespots["ID_Table"] ."</div>";
					echo "<div class='divCell'>". $freespots["Place"] ."</div>";
					if ($freespots['Status'] == 0)
					{
						echo "<div class='divCell'>" . "Free" ."</div>";
					} else {
						echo "<div class='divCell'>" . "Reserved" ."</div>";
					}
					echo "</div>";
				}
			}
				
			
		} catch (Exception $e)
		{
			$error = $e->getMessage();
		}
		?>
		
	</div>
	</div>
	<div class="list_1">
		<h1>Reservations</h1>
			<div class="divTable">
					<div class="headRow">
				<div class="divCell">TableNumber</div>
				<div class="divCell">Amount of persons</div>
				<div class="divCell">Date</div>
				<div class="divCell">Name</div>
				<div class="divCell">Verwijderen</div>
			</div>
			<?php
				include_once("classes/Reservation.class.php");
				include_once("classes/Customer.class.php");
				$reservation = new Reservation();
				$customer = new Customer();
				$res = $reservation->GetAllReservations($_SESSION['restaurant']);

				while($Reservation = $res->fetch_assoc())
			    {
					echo "<div id='listitem_". $Reservation["ID_Resevation"] ."' class='divRow'>";			
					echo "<div class='divCell'>". $Reservation["FK_Table_ID"] ."</div>";
					echo "<div class='divCell'>". $Reservation["AmountPeople"] ."</div>";
					echo "<div class='divCell'>" . $Reservation["Date"] ."</div>";

					$oneCustomer = $customer->SelectOne($Reservation["FK_Customer_ID"]);
					echo "<div class='divCell'>" . $oneCustomer["Firstname"] . " " . $oneCustomer["Lastname"] ."</div>";
					echo "<div class='divCell' id='listitem_Verwijder'><a href='#' data-id='" . $Reservation["ID_Resevation"] . "' class='delete'>Delete</a>";
					echo "</div>";
				}
			?>
			
		</div>
	</div>
</div>
</div>
<div id="user">
<?php
	 
	include_once("include/navincludeKlant.php");
	 
	?>	<div id="container">
	
		<h1>Menukaart</h1>
		<?php 
		try{
			include_once('classes/Menu.class.php');
			$menu = new Menu();
			$oneMenu = $menu->GetLatest($_SESSION['restaurant']);

			if ($oneMenu == "no menu")
			{
				echo "<p>No information of a menu</p>";
			} else {
				echo "<p>" . $oneMenu['Name'] . "</p>";
				echo "<p>" . $oneMenu['Discription'] . "</p>";
			}
			echo "<h2>Dishes</h2>";
		
			include('classes/Gerecht.class.php');
			$gerecht = new Gerecht();
			$allGerecht = $gerecht->GetAll($oneMenu['ID_Menu']);

			while($oneGerecht = $allGerecht->fetch_assoc())
			{
				echo "<p>" . $oneGerecht['Gerecht'] . " : €" . $oneGerecht['Prijs'];
			}
		} catch(Exception $e)
		{
			$error = $e->getMessage();
		}

		if(isset($error))
		{
			echo $error;
		}

		?>


		<h1>Free Tables</h1>
		<label for="amount">Amount of people</label>
		<input type="text" name="amount" id="amount" class="search" data-id="amount" value="2">
		<label for="date">Date of reservation</label>
		<input type="date" name="date" id="date" class="search" data-id="date" value=<?php echo date("Y-m-d") ?>>
		<label for="time">Time</label>
		<input type="time" name="time" id="time" class="search" data-id="time" value="<?php echo date('H:i:s') ?>"><br/>
		<div id="tafels">
		</div>
	
	<?php
		if(isset($error))
		{
			echo "<p>$error</p>";
		}
		?>
	</div>
</div>
</body>
</html>