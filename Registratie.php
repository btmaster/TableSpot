<?php 
	
	if(!empty($_POST))
	{
		try
		{
			if ($_POST['rol'] == 'RestaurantOwner')
			{
				include_once("classes/RestaurantHouder.class.php");
				$restaurant = new RestaurantHouder();
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
	<link rel="stylesheet" type="text/css" href="css/Tablespot.css">
	<script src="js/index.js" type="text/javascript"></script> 
</head>
<header><h1>Table Spot</h1></header>
<body>
	<div id="container">
		<div class="form-bg">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

		<h2>Registration</h2>


		<div id="radioboxes">	
		<label for="rol">Function:</label>

			<input type="radio" name="rol" class="rol" id="rol" value="Customer" onclick="show();" checked><label>Klant</label>
			<input type="radio" name="rol" class="rol" id="rol" value="RestaurantOwner" onclick="hide();" ><label>RestaurantHouder</label> 
		</div>


		<input type="text" name="firstname" id="firstname" placeholder="Firstname">
		<input type="text" name="lastname" id="lastname"  placeholder="Lastname">
		<input type="email" name="email" id="email" placeholder="Email">
		<input type="password" name="password" id="password"  placeholder="Password">
		<input type="password" name="passwordcheck" id="passwordcheck" placeholder="Repeat password">
		<input type="text" name="phone" id="phone" placeholder="Mobile Phone">
		<a id="login" href="index.php" alt="terug naar login">Login</a>
		<input type="submit" name="btnRegistreer" value="Register" id="button">
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