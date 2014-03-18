<?php 

	if (!empty($_POST))
	{
		try{
			include_once("classes/Restaurant.class.php");
			$restaurant = new Restaurant();
			$restaurant->Username=$_POST['username'];
			$restaurant->Password=$_POST['password'];
			$restaurant->Login(); 

		} catch(Exception $e)
		{
			$error = $e->getMessage();
		}
	}
	

 ?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tablespot</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<label for="username">Username</label>
	<input type="text" name="username" id="username">
	<label for="password">Password</label>
	<input type="password" name="password" id="password">
	<input type="submit" name="btnLogin" value="Sign in"/>
	</form>
	<a href="Registratie.php" alt="registratie">Registreer</a>
	<?php
		if(isset($error))
		{
			echo "<p>$error</p>";
		}
	?>

</body>
</html>