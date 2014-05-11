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
				$restaurant->Name=$_POST['Name'];
				$restaurant->Categorie=$_POST['Categorie'];
				$restaurant->Discription=$_POST['Discription'];

				$restaurant->geslotenMaandag=$_POST['geslotenMaandag'];
				$restaurant->Openingmaandag=$_POST['Openingmaandag'];
				$restaurant->ClosingMaandag=$_POST['ClosingMaandag'];

				$restaurant->geslotenDinsdag=$_POST['geslotenDinsdag'];
				$restaurant->OpeningDinsdag=$_POST['OpeningDinsdag'];
				$restaurant->ClosingDinsdag=$_POST['ClosingDinsdag'];

				$restaurant->geslotenWoensdag=$_POST['geslotenWoensdag'];
				$restaurant->OpeningWoensdag=$_POST['OpeningWoensdag'];
				$restaurant->ClosingWoensdag=$_POST['ClosingWoensdag'];

				$restaurant->geslotenDonderdag=$_POST['geslotenDonderdag'];
				$restaurant->OpeningDonderdag=$_POST['OpeningDonderdag'];
				$restaurant->ClosingDonderdag=$_POST['ClosingDonderdag'];

				$restaurant->geslotenVrijdag=$_POST['geslotenVrijdag'];
				$restaurant->OpeningVrijdag=$_POST['OpeningVrijdag'];
				$restaurant->ClosingVrijdag=$_POST['ClosingVrijdag'];

				$restaurant->geslotenZaterdag=$_POST['geslotenZaterdag'];
				$restaurant->OpeningZaterdag=$_POST['OpeningZaterdag'];
				$restaurant->ClosingZaterdag=$_POST['ClosingZaterdag'];

				$restaurant->geslotenZondag=$_POST['geslotenZondag'];
				$restaurant->OpeningZondag=$_POST['OpeningZondag'];
				$restaurant->ClosingZondag=$_POST['ClosingZondag'];

					
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
					<H2>Restauranthouder</H2>
					<H3>Naam en Achternaam</H3>
					<p>Email</p>				
				</div>
			</div>
			<div class="sectie_2">
				<div class="form-reg">

						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							<input type="text" name="Name" placeholder="Naam">
							<input type="text" name="Categorie" placeholder="Categorie">
							<textarea name="Discription" placeholder="Discription"></textarea>

						<div class="dag"><label class="daglabel">Maandag</label>
							<p>
								<label>Gesloten:</label><input type="checkbox" name="geslotenMaandag" value="1">
								<label>Opening:</label><input type="time" name="Openingmaandag" class="Opening">
								<label>Sluiting:</label><input type="time" name="ClosingMaandag" class="Closing">

							</p>
						</div>
						<div class="dag"><label class="daglabel">Dinsdag</label>
							<p>
								<label>Gesloten:</label><input type="checkbox" name="geslotenDinsdag" value="1">
								<label>Opening:</label><input type="time" name="OpeningDinsdag" class="Opening">
								<label>Sluiting:</label><input type="time" name="ClosingDinsdag" class="Closing">
							</p>	
						</div>
						<div class="dag"><label class="daglabel">Woensdag</label>
							<p>
								<label>Gesloten:</label><input type="checkbox" name="geslotenWoensdag" value="1">
								<label>Opening:</label><input type="time" name="OpeningWoensdag" class="Opening">
								<label>Sluiting:</label><input type="time" name="ClosingWoensdag" class="Closing">
							</p>	
						</div>
						<div class="dag"><label class="daglabel">Donderdag</label>
							<p>
								<label>Gesloten:</label><input type="checkbox" name="geslotenDonderdag" value="1">
								<label>Opening:</label><input type="time" name="OpeningDonderdag" class="Opening">
								<label>Sluiting:</label><input type="time" name="ClosingDonderdag" class="Closing">
							</p>
						</div>
						<div class="dag"><label class="daglabel">Vrijdag</label>
							<p>
								<label>Gesloten:</label><input type="checkbox" name="geslotenVrijdag" value="1">
								<label>Opening:</label><input type="time" name="OpeningVrijdag" class="Opening">
								<label>Sluiting:</label><input type="time" name="ClosingVrijdag" class="Closing">
							</p>
						</div>
						<div class="dag"><label class="daglabel">Zaterdag</label>
							<p>
								<label>Gesloten:</label><input type="checkbox" name="geslotenZaterdag" value="1">
								<label>Opening:</label><input type="time" name="OpeningZaterdag" class="Opening">
								<label>Sluiting:</label><input type="time" name="ClosingZaterdag" class="Closing">
							</p>
						</div>
						<div class="dag"><label class="daglabel">Zondag</label>
							<p>
								<label>Gesloten:</label><input type="checkbox" name="geslotenZondag" value="1">
								<label>Opening:</label><input type="time" name="OpeningZondag" class="Opening">
								<label>Sluiting:</label><input type="time" name="ClosingZondag" class="Closing">
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
		<h1>Klant</h1>
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