<?php 
	include_once('../classes/Reservation.class.php');
	include_once('../classes/Tablespot.class.php');
	
		if(isset($_POST['reservationId']))
		{		
			$reservation = new Reservation();
			$tablespotId = $reservation->SelectOne($_POST['reservationId']);
			$tablespot = new Tablespot();
			$tablespot->Annulation($tablespotId['FK_Table_ID']);
			$reservation->Delete($_POST['reservationId']);
			$response['status'] = "gelukt";

		}

	header('Content-Type: application/json');
	echo json_encode($response);	
?>