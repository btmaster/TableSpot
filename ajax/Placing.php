<?php 
try{
	include_once("../classes/Placing.class.php");
	include_once("../classes/Reservation.class.php");
	session_start();
	if(isset($_POST['place'])){
		$reservation = new Reservation();
		$reservation->DeleteAll($_SESSION['restaurant']);
		$placing = new Placing();
		$placing->UpdateAll($_SESSION['restaurant']);
		$placing->UpdateActive($_POST['place']);
		$test['status'] = 'gelukt';
	}

	//header('Content-Type: application/json');
	echo json_encode($test);
} catch (Exception $e)
{
	$error = $e->getMessage();
}
	
?>