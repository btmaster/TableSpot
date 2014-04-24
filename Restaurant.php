<?php
	
	session_start();

	include_once("include/rolkeuze.php");
	include_once("classes/Restaurant.class.php");

	$restaurant = new Restaurant();	
	$restaurant->SelectedId = $_GET['id'];

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
 
?><div>
	<h1>Open Spot</h1>
		<ul id="sortable_list">
		<li id="listitem"  class="clearfix header">
			<div class="listitem_Tafelnummer">Tafelnummer</div>
			<div class="listitem_Plaatsen">Plaatsen</div>
			<div class="listitem_Status">Status</div>
		</li>
		<?php
		$result = $restaurant->GetAllfreespots();

	while($freespots = $result->fetch_assoc())
	    {
			echo "<li id='listitem_". $freespots["ID_Table"] ."' class='clearfix'>";			
			echo "<div class='listitem_Tafelnummer'>". $freespots["ID_Table"] ."</div>";
			echo "<div class='listitem_Plaatsen'>". $freespots["Place"] ."</div>";
			echo "<div class='listitem_Status'>" . $freespots["Status"] ."</div>";
			echo "</li>";
		}
		?>
		
	</ul>
</div>
<div>
	<h1>Reservations</h1>
		<ul id="sortable_list">
		<li id="listitem"  class="clearfix header">
			<div class="listitem_Tafelnummer">Tafelnummer</div>
			<div class="listitem_Plaatsen">Plaatsen</div>
			<div class="listitem_Status">Status</div>
			<div class="listitem_Status">Status</div>
		</li>
		<?php
		$res = $restaurant->GetAllReservations();

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
		
	</div>
	<!-- klant -->
	<div id="user">
		<h1>Klant</h1>
	</div>
</body>
</html>