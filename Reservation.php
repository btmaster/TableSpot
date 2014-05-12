<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		if (isset($_SESSION['tablespot']))
		{
			$_GET['id'] = $_SESSION['tablespot'];
			unset($_SESSION['tablespot']);
		}
		if (!empty($_GET['id']))
		{
			try
			{
				
				include_once("include/rolkeuze.php");
				include_once("classes/Tablespot.class.php");
				include_once("classes/Reservation.class.php");
				include_once("classes/Restaurant.class.php");
				include_once("classes/Customer.class.php");
				$customer = new Customer();
				$User = $customer->Select($_SESSION['email']);
				$_SESSION['tablespot'] = $_GET['id'];
				$TablespotId = $_SESSION['tablespot'];
				$restaurant = new Restaurant();
				$RestaurantId = $_SESSION['restaurant'];
				$restaurant->SelectedId = $RestaurantId;

				if(!empty($_POST))
				{
						$reservation = new Reservation();
						$reservation->time = $_POST['time'];
						$reservation->date = $_POST['date'];
						$reservation->amount = $_POST['amount'];
						$reservation->customer = $User['ID_Customer'];
						$reservation->table = $TablespotId;
						$reservation->restaurant = $RestaurantId;
						$reservation->Save();

						$tablespot = new Tablespot();
						$tablespot->Reservation($TablespotId);

				}
			} catch(Exception $e) {
				$error = $e->getMessage();
			}
		} else {
			header("Location: Home.php");
		}
	} else {
		header("Location: index.php");
	}
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reservatie</title>
	<link href="css/Tablespot.css" rel="stylesheet">
</head>
<body>
	<div id="user2">
		<h1>Reserveer nu</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="amount">Aantal personen</label><br/>
			<input type="text" name="amount" id="amount"><br/>
			<label for="lastname">Datum</label><br/>
			<input type="date" name="date" id="date"><br/>
			<label for="time">Tijdstip</label><br/>
			<input type="time" name ="time" id="time"><br/>
			<input type="submit" name="btnVoegToe" value="
			Reserveer" id="reserveer"><br/>
		</form>
			<?php
			if(isset($error))
			{
				echo "<p>$error</p>";
			}
			?>
	</div>
</body>
</html>