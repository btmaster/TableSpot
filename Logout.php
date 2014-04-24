<?php 
	//uitloggen = sessie stoppen
	
	session_start();
	//unset($_SESSION['username']); -> één item, voor meerdere items duurt het lang
	session_destroy(); //verwijdert heel de sessie in één keer, bijvoorbeeld, gebruikersnaam, mandje,...

	header("Location:index.php")
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Logout</title>
</head>
<body>
	
</body>
</html>