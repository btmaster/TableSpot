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
	<ul id="sortable_list">
		<li id="listitem"  class="clearfix header">
			<div class="listitem_Tafelnummer">TableNumber</div>
			<div class="listitem_Plaatsen">Amount of places</div>
			<div class="listitem_Status">Availability</div>
		</li>
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
					echo "<li id='listitem_". $freespots["ID_Table"] ."' class='clearfix'>";			
					echo "<div class='listitem_Tafelnummer'>". $freespots["ID_Table"] ."</div>";
					echo "<div class='listitem_Plaatsen'>". $freespots["Place"] ."</div>";
					if ($freespots['Status'] == 0)
					{
						echo "<div class='listitem_Status'>" . "Free" ."</div>";
					} else {
						echo "<div class='listitem_Status'>" . "Reserved" ."</div>";
					}
					echo "</li>";
				}
			}
				
			
		} catch (Exception $e)
		{
			$error = $e->getMessage();
		}
		?>
		
	</ul>
	<div>
		<h1>Reservations</h1>
			<ul id="sortable_list">
			<li id="listitem"  class="clearfix header">
				<div class="listitem_Tafelnummer">TableNumber</div>
				<div class="listitem_Plaatsen">Amount of persons</div>
				<div class="listitem_Status">Date</div>
				<div class="listitem_Status">Name</div>
			</li>
			<?php
				include_once("classes/Reservation.class.php");
				include_once("classes/Customer.class.php");
				$reservation = new Reservation();
				$customer = new Customer();
				$res = $reservation->GetAllReservations($_SESSION['restaurant']);

				while($Reservation = $res->fetch_assoc())
			    {
					echo "<li id='listitem_". $Reservation["ID_Resevation"] ."' class='clearfix'>";			
					echo "<div class='listitem_Tafelnummer'>". $Reservation["FK_Table_ID"] ."</div>";
					echo "<div class='listitem_Plaatsen'>". $Reservation["AmountPeople"] ."</div>";
					echo "<div class='listitem_Status'>" . $Reservation["Date"] ."</div>";

					$oneCustomer = $customer->SelectOne($Reservation["FK_Customer_ID"]);
					echo "<div class='listitem_Status'>" . $oneCustomer["Firstname"] . " " . $oneCustomer["Lastname"] ."</div>";
					echo "<div class='listitem_Verwijder'><a href='#' data-id='" . $Reservation["ID_Resevation"] . "' class='delete'>Delete</a>";
					echo "</li>";
				}
			?>
			
		</ul>
	</div>
</div>

<div id="user">
	<?php
	 
	include_once("include/navincludeKlant.php");
	 
	?>
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
	</div>
	<?php
		if(isset($error))
		{
			echo "<p>$error</p>";
		}
		?>
</body>
</html>