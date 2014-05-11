<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		include_once("include/rolkeuze.php");
		include_once("classes/Restaurant.class.php");

		$restaurant = new Restaurant();	
		$restaurant->SelectedId = $_GET['id'];
		$_SESSION['restaurant'] = $_GET['id'];

	} else {
		header("Location: index.php");
	}
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $restaurant->GetTitle(); ?></title>
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
	<h1>Open Spot</h1>
	<select name="place" id="place">
		<?php 
			include_once('classes/Placing.class.php');
			$placing = new Placing();
			$allPlacing = $placing->GetAllRestaurant($_SESSION['restaurant']);

			while ($onePlacing = $allPlacing->fetch_assoc())
			{
				echo "<option value='" . $onePlacing['ID_Placing'] . "'>" . $onePlacing['Name'] . "</option>";
			}


		?>
	</select>
	<ul id="sortable_list">
		<li id="listitem"  class="clearfix header">
			<div class="listitem_Tafelnummer">Tafelnummer</div>
			<div class="listitem_Plaatsen">Plaatsen</div>
			<div class="listitem_Status">Status</div>
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
					echo "<div class='listitem_Status'>" . $freespots["Status"] ."</div>";
					echo "</li>";
				}
			}
				
			
		} catch (Exception $e)
		{
			$error = $e->getMessage();
		}
		?>

		<?php
		if(isset($error))
		{
			echo "<p>$error</p>";
		}
		?>
		
	</ul>
</div>
<div>
	<h1>Reservations</h1>
		<ul id="sortable_list">
		<li id="listitem"  class="clearfix header">
			<div class="listitem_Tafelnummer">Tafelnummer</div>
			<div class="listitem_Plaatsen">Aantal personen</div>
			<div class="listitem_Status">Date</div>
			<div class="listitem_Status">Klant</div>
		</li>
		<?php
			include_once("classes/Reservation.class.php");
			$reservation = new Reservation();
			$res = $reservation->GetAllReservations();

			while($Reservation = $res->fetch_assoc())
		    {
				echo "<li id='listitem_". $Reservation["ID_Resevation"] ."' class='clearfix'>";			
				echo "<div class='listitem_Tafelnummer'>". $Reservation["FK_Table_ID"] ."</div>";
				echo "<div class='listitem_Plaatsen'>". $Reservation["AmountPeople"] ."</div>";
				echo "<div class='listitem_Status'>" . $Reservation["Date"] ."</div>";
				echo "<div class='listitem_Status'>" . $Reservation["FK_Customer_ID"] ."</div>";
				echo "</li>";
			}
		?>
		
	</ul>
</div>
	<!-- klant -->
	<div id="user">
	<?php
	 
	include_once("include/navincludeKlant.php");
	 
	?>
		<h1>Vrije tafels</h1>

		<?php 
			if($_SESSION['rol'] === "customer")
			{
				$RestaurantId = $restaurant->SelectedId;
				include_once('classes/Placing.class.php');
				$placing = new Placing();
				$allPlacing = $placing->GetPlace($RestaurantId);

				include_once('classes/Tablespot.class.php');
				$tablespot = new Tablespot();

				while ($onePlacing = $allPlacing->fetch_assoc())
				{
					$selectTablespot = $tablespot->GetTableFree($onePlacing['ID_Placing']);
					while ($Tablespot = $selectTablespot->fetch_assoc())
					{
						echo "Vrije Tafels:<br/>". "<a href='Reservation.php?id=" . $Tablespot['ID_Table'] . "'>Aantal personen: " . $Tablespot['Place'] . "</a><br/><br/>";
					}	
				}
				
			}
		?>
	</div>
</body>
</html>