<?php 
	
	if(!empty($_POST))
	{
		try
		{
			if ($_POST['rol'] == 'RestaurantHouder')
			{
				include_once("classes/RestaurantHouder.class.php");
				$restaurant = new Restaurant();
				$restaurant->Firstname=$_POST['firstname'];
				$restaurant->Lastname=$_POST['lastname'];
				$restaurant->Email=$_POST['email'];
				$restaurant->Password=$_POST['password'];
				$restaurant->Passwordcheck=$_POST['passwordcheck'];
				$restaurant->Save();
			} else {
				include_once("classes/Customer.class.php");
				$customer = new Customer();
				$customer->Firstname=$_POST['firstname'];
				$customer->Lastname=$_POST['lastname'];
				$customer->Email=$_POST['email'];
				$customer->Password=$_POST['password'];
				$customer->Passwordcheck=$_POST['passwordcheck'];
				$customer->Phone=$_POST['phone'];
				$customer->Save();
			}
			
		} catch(Exception $e){
			$error = $e->getMessage();
		}
	}

 ?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TableSpot</title>

	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
	<script src="js/index.js" type="text/javascript"></script> 
</head>
<body>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<label for="rol">Functie</label><br/>
		<input type="radio" name="rol" id="rol" value="Klant" onclick="show();" checked>Klant <br/>
		<input type="radio" name="rol" id="rol" value="RestaurantHouder" onclick="hide();" >
		RestaurantHouder<br/>
		<label for="firstname">Voornaam</label><br/>
		<input type="text" name="firstname" id="firstname"><br/>
		<label for="lastname">Achternaam</label><br/>
		<input type="text" name="lastname" id="lastname"><br/>
		<label for="email">Email</label><br/>
		<input type="email" name="email" id="email"><br/>
		<label for="password">Wachtwoord</label><br/>
		<input type="password" name="password" id="password"><br/>
		<label for="passwordcheck">Herhaal het wachtwoord</label><br/>
		<input type="password" name="passwordcheck" id="passwordcheck"><br/>
		<label for="phone" id="lblphone">Phone</label><br/>
		<input type="text" name="phone" id="phone"><br/>
		<input type="submit" name="btnRegistreer" value="Registreer"><br/>
	</form>
		<?php
		if(isset($error))
		{
			echo "<p>$error</p>";
		}
		?>

</body>
</html>