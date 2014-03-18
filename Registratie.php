<?php 
	
	if(!empty($_POST))
	{
		try
		{
			include_once("classes/Restaurant.class.php");
			$restaurant = new Restaurant();
			$restaurant->Restaurant=$_POST['restaurant'];
			$restaurant->Username=$_POST['username'];
			$restaurant->Password=$_POST['password'];
			$restaurant->Passwordcheck=$_POST['passwordcheck'];
			$restaurant->Save();
		} catch(Exception $e){
			$error = $e->getMessage();
		}
	}

 ?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TableSpot</title>
</head>
<body>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<label for="restaurant">Restaurant</label>
		<input type="text" name="restaurant" id="restaurant">
		<label for="username">Gebruikersnaam</label>
		<input type="text" name="username" id="username">
		<label for="password">Wachtwoord</label>
		<input type="password" name="password" id="password">
		<label for="passwordcheck">Herhaal het wachtwoord</label>
		<input type="password" name="passwordcheck" id="passwordcheck">
		<input type="submit" name="btnRegistreer" value="Registreer">
	</form>
		<?php
		if(isset($error))
		{
			echo "<p>$error</p>";
		}
		?>

</body>
</html>