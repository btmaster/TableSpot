<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		include_once("include/rolkeuze.php");
		include_once("classes/Restaurant.class.php");

		$restaurant = new Restaurant();	
		$_GET['id'] = $_SESSION['restaurant'];
		$restaurant->SelectedId = $_SESSION['restaurant'];

		if(!empty($_POST['name']))
		{
			include_once("classes/Placing.class.php");
			$placing = new Placing();
			$placing->name = htmlspecialchars($_POST['name']);
			$placing->actif = 0;
			$placing->restaurant = $_SESSION['restaurant'];
			$placing->Save();
			$latestPlacing = $placing->GetLatest();	
			$_SESSION['placingId'] = $latestPlacing['ID_Placing'];
		}

		if(!empty($_POST['amount1']))
		{
			include_once("classes/Tablespot.class.php");
			$tablespot = new Tablespot();
			for ($i = 1; $i<=$_SESSION['amount'];$i++)
			{
				$tablespot->status = 0;
				$tablespot->place = htmlspecialchars($_POST["amount".$i]);
				$tablespot->placing = $_SESSION['placingId'];
				$tablespot->Save();
			}
			unset($_SESSION['amount']);
			unset($_SESSION['placingId']);
		}
	} else {
		header("Location: index.php");
	}
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $restaurant->GetTitle(); ?></title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link href="css/Tablespot.css" rel="stylesheet">
</head>
<body>
	<!-- Restaurant -->
	<div id="restauranthouder">
<?php
 
include_once("include/navincludeHouder.php");

 
?>
<div id="container">
<div class="menus">
	<div id="opstelling">
	<h1>Make a arrangement of tables</h1>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<label for="name">Name of arrangement</label><br/>
	<input type="text" name="name" id="name"><br/>
	<label for="amounttabels">Amount of tables</label><br/>
	<input type="text" name="amounttabels" id="amounttabels"><br/>
	<input type="submit" name="btnVoegtoe" value="Add" class="btn"><br/>
	</form>
	</div>
</div>
	<?php 

		if (!empty($_POST['amounttabels']))
		{
			$_SESSION['amount'] = $_POST['amounttabels'];
			echo "<div id='tafels' class='menus'><h1>Add tables</h1>";
	?>
			<form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method='post'>
	<?php 
			for ($i = 1; $i<=$_SESSION['amount']; $i++)
			{
				echo "<p>Tafel " . $i . "<label for='amount".$i."'>Amount of places</label><br/>
					<input type='text' name='amount" . $i . "' id='amount" . $i ."'><br/>";
			}

			echo "<input type='submit' name='btnVoegtoe' value='Add' class='btn'><br/></form></div>";
			echo "<style type='text/css'>
				#opstelling{
					display:none;
				}
			</style>";

		}

	?>
	</div>
</div>
</body>
</html>