<?php 

	if (!empty($_POST))
	{
		try{
			include_once("classes/RestaurantHouder.class.php");
			$restaurant = new RestaurantHouder();
			$restaurant->Email=$_POST['email'];
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
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/Tablespot.css">

</head>
<body>
	<header><h1>Table Spot</h1></header>

	<div id="container">
		<div class="form-bg">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	
	<h2>Login</h2>

		<input type="email" name="email" id="email" placeholder="Email">
		<input type="password" name="password" id="password" placeholder="Password">
		<a id="Registratie" href="Registratie.php" alt="registratie">Registreer</a>
		<input type="submit" name="btnLogin" value="Login" id="button" alt="login"/>
		
	</form>

	
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