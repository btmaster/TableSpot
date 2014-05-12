<?php 
	session_start();
	if(isset($_SESSION['email']))
	{
		try {
		include_once("include/rolkeuze.php");
		include_once("classes/Restaurant.class.php");
		
		$restaurant = new Restaurant();
		if (!empty($_POST)) {
			
				$restaurant->Email=$_SESSION['email'];
				$restaurant->Name=htmlspecialchars($_POST['Name']);
				$restaurant->Categorie=htmlspecialchars($_POST['Categorie']);
				$restaurant->Discription=htmlspecialchars($_POST['Discription']);

				
				if (!empty($_POST['geslotenMaandag'])) 
				{
					$restaurant->geslotenMaandag=htmlspecialchars($_POST['geslotenMaandag']);
				} else {$restaurant->geslotenMaandag=0;}
				$restaurant->OpeningMaandag=htmlspecialchars($_POST['Openingmaandag']);
				$restaurant->ClosingMaandag=htmlspecialchars($_POST['ClosingMaandag']);
				 /*if (
				 $restaurant->OpeningMaandag < $restaurant->ClosingMaandag)
				 {
				 	echo "hannes";
				 }*/
				if (!empty($_POST['geslotenDinsdag'])) 
				{$restaurant->geslotenDinsdag=htmlspecialchars($_POST['geslotenDinsdag']);}
				else {$restaurant->geslotenDinsdag=0;}
				$restaurant->OpeningDinsdag=htmlspecialchars($_POST['OpeningDinsdag']);
				$restaurant->ClosingDinsdag=htmlspecialchars($_POST['ClosingDinsdag']);

				if (!empty($_POST['geslotenWoensdag'])) 
				{$restaurant->geslotenWoensdag=htmlspecialchars($_POST['geslotenWoensdag']);}
				else {$restaurant->geslotenWoensdag=0;}
				$restaurant->OpeningWoensdag=htmlspecialchars($_POST['OpeningWoensdag']);
				$restaurant->ClosingWoensdag=htmlspecialchars($_POST['ClosingWoensdag']);

				if (!empty($_POST['geslotenDonderdag'])) 
				{$restaurant->geslotenDonderdag=htmlspecialchars($_POST['geslotenDonderdag']);}
				else {$restaurant->geslotenDonderdag=0;}
				$restaurant->OpeningDonderdag=htmlspecialchars($_POST['OpeningDonderdag']);
				$restaurant->ClosingDonderdag=htmlspecialchars($_POST['ClosingDonderdag']);

				if (!empty($_POST['geslotenVrijdag'])) 
				{$restaurant->geslotenVrijdag=htmlspecialchars($_POST['geslotenVrijdag']);}
				else {$restaurant->geslotenVrijdag=0;}
				$restaurant->OpeningVrijdag=htmlspecialchars($_POST['OpeningVrijdag']);
				$restaurant->ClosingVrijdag=htmlspecialchars($_POST['ClosingVrijdag']);

				if (!empty($_POST['geslotenZaterdag'])) 
				{$restaurant->geslotenZaterdag=htmlspecialchars($_POST['geslotenZaterdag']);}
				else {$restaurant->geslotenZaterdag=0;}
				$restaurant->OpeningZaterdag=htmlspecialchars($_POST['OpeningZaterdag']);
				$restaurant->ClosingZaterdag=htmlspecialchars($_POST['ClosingZaterdag']);

				if (!empty($_POST['geslotenZondag'])) 
				{$restaurant->geslotenZondag=htmlspecialchars($_POST['geslotenZondag']);}
				else {$restaurant->geslotenZondag=0;}
				$restaurant->OpeningZondag=htmlspecialchars($_POST['OpeningZondag']);
				$restaurant->ClosingZondag=htmlspecialchars($_POST['ClosingZondag']);

					
				$restaurant->SaveRestaurant();	
		}
		} catch (Exception $e) {

			$error = $e->getMessage();			
		}
	} else {
		header("Location: index.php");
	}




?><!-- ajax --><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/Tablespot.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/index.js" type="text/javascript"></script>
</head>
<header><h1>Table Spot</h1><a href="Logout.php" alt="logout" id="logout">Logout</a></header>
<body>
<!-- restauranthouder -->
<div id="container">

	<div id="restauranthouder">

		<div class="collum_1">
<!-- gevens uitprinten restauranthouder -->
			
			<div class="sectie_1">
				<div class="profiel">
					<H2>Restaurant owner</H2>
					<H3>Name and firstname</H3>
					<p>E-mail</p>
				</div>
				<div id="maak">
					<p><a href="#" id="maakAan">Add Restaurant</a></p>				
				</div>
			</div>
			<div class="sectie_2">
				<div id="form" class="form-reg">

						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							<input type="text" name="Name" placeholder="Naam">
							<input type="text" name="Categorie" placeholder="Categorie">
							<textarea name="Discription" placeholder="Discription"></textarea>

						<div class="dag"><label class="daglabel">Maandag</label>
							<p>
								<label>Gesloten:</label><input type="checkbox" name="geslotenMaandag" value="1">
								<label>Opening:</label><input type="time" name="Openingmaandag" class="Opening" value="11:30:00">
								<label>Sluiting:</label><input type="time" name="ClosingMaandag" class="Closing" value="18:00:00">

							</p>
						</div>
						<div class="dag"><label class="daglabel">Dinsdag</label>
							<p>
								<label>Gesloten:</label><input type="checkbox" name="geslotenDinsdag" value="1">
								<label>Opening:</label><input type="time" name="OpeningDinsdag" class="Opening" value="11:30:00">
								<label>Sluiting:</label><input type="time" name="ClosingDinsdag" class="Closing" value="18:00:00">
							</p>	
						</div>
						<div class="dag"><label class="daglabel">Woensdag</label>
							<p>
								<label>Gesloten:</label><input type="checkbox" name="geslotenWoensdag" value="1">
								<label>Opening:</label><input type="time" name="OpeningWoensdag" class="Opening" value="11:30:00">
								<label>Sluiting:</label><input type="time" name="ClosingWoensdag" class="Closing" value="18:00:00">
							</p>	
						</div>
						<div class="dag"><label class="daglabel">Donderdag</label>
							<p>
								<label>Gesloten:</label><input type="checkbox" name="geslotenDonderdag" value="1">
								<label>Opening:</label><input type="time" name="OpeningDonderdag" class="Opening" value="11:30:00">
								<label>Sluiting:</label><input type="time" name="ClosingDonderdag" class="Closing" value="18:00:00">
							</p>
						</div>
						<div class="dag"><label class="daglabel">Vrijdag</label>
							<p>
								<label>Gesloten:</label><input type="checkbox" name="geslotenVrijdag" value="1">
								<label>Opening:</label><input type="time" name="OpeningVrijdag" class="Opening" value="11:30:00">
								<label>Sluiting:</label><input type="time" name="ClosingVrijdag" class="Closing" value="18:00:00">
							</p>
						</div>
						<div class="dag"><label class="daglabel">Zaterdag</label>
							<p>
								<label>Gesloten:</label><input type="checkbox" name="geslotenZaterdag" value="1">
								<label>Opening:</label><input type="time" name="OpeningZaterdag" class="Opening" value="11:30:00">
								<label>Sluiting:</label><input type="time" name="ClosingZaterdag" class="Closing" value="18:00:00">
							</p>
						</div>
						<div class="dag"><label class="daglabel">Zondag</label>
							<p>
								<label>Gesloten:</label><input type="checkbox" name="geslotenZondag" value="1">
								<label>Opening:</label><input type="time" name="OpeningZondag" class="Opening" value="11:30:00">
								<label>Sluiting:</label><input type="time" name="ClosingZondag" class="Closing" value="18:00:00">
							</p>	
						</div>
							<input type="submit" name="btnsubmit" id="aanmaken" value="Aanmaken">
						</form>
				</div>
			</div>
		</div>
<!-- ajax <li> Restaurant toevoegen</li> -->
	<div class="collum_2">
		<h1>Restaurants</h1>
		<div class="sectie_1">
           <?php      
			$res = $restaurant->GetAllRestaurants();

                            while($restaurantdetails = $res->fetch_assoc())
                            {
                            echo "<div class='restaurant'><a href='Restaurant.php?id=".$restaurantdetails['ID_Restaurant']."'>";
                            echo "<h1>" .$restaurantdetails['Name'] . "</h1>";
                            echo "<h2>" .$restaurantdetails['Categorie'] . "</h2>";
                            echo "<p>" .$restaurantdetails['Discription'] . "</p>";
 							echo "</div></a>";
                            }

		?>
		</div>
	</div>
</div>
<!-- klant -->
	<div id="user">
		<h1>Choose a restaurant to make a reservation.</h1>
		<?php
		include_once("include/navincludeKlant.php");
		 
		?>
				<div class="table-responsive">
		           <?php   

				$res = $restaurant->GetAllRestaurants();

		                            while($restaurantdetails = $res->fetch_assoc())
		                            {
		                            echo "<div class='restaurant'><a href='Restaurant.php?id=".$restaurantdetails['ID_Restaurant']."'>";
		                            echo "<h1>" .$restaurantdetails['Name'] . "</h1>";
		                            echo "<h2>" .$restaurantdetails['Categorie'] . "</h2>";
		                            echo "<p>" .$restaurantdetails['Discription'] . "</p>";
		 							echo "</div></a>";
		                            }

				?>
				</div>
				
	</div>

	<?php 
		if(isset($error))
		{
			echo $error;
		}


	?>
</div>
	
</body>
</html>