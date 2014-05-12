<?php 
try{
	include_once('../classes/Reservation.class.php');
	include_once('../classes/Tablespot.class.php');
	include_once('../classes/Placing.class.php');
	session_start();

		if(isset($_POST['reservationId']))
		{		
			$reservation = new Reservation();
			$tablespotId = $reservation->SelectOne($_POST['reservationId']);
			$tablespot = new Tablespot();
			$tablespot->Annulation($tablespotId['FK_Table_ID']);
			$reservation->Delete($_POST['reservationId']);
			$response['status'] = "gelukt";
		}

		if(isset($_POST['amountval']))
		{
			$placing = new Placing();
			$reservation = new Reservation();
			$onePlacing = $placing->GetPlace($_SESSION['restaurant']);
			$tablespot = new Tablespot();
			$allTable = $tablespot->GetTableFree($onePlacing['ID_Placing'],$_POST['amountval']);
			$Tables = array();

			while ($oneTable = $allTable->fetch_array())
			{
				$allReservation = $reservation->GetAllTables($oneTable['ID_Table']);
				if($allReservation->num_rows === 0)
				{
					$Tables[] = $oneTable;
				} else {
					while ($oneReservation = $allReservation->fetch_assoc())
					{
						
						if($oneReservation['Date'] == $_POST['dateval'])
						{
							if($oneReservation['Time'] <= $_POST['timeval'])
							{
								$reservationTime = date('H:i:s', strtotime($oneReservation['Time'])+3600);
								if($reservationTime >= $_POST['timeval'])
								{

								}
							} 
						} else {
							$Tables[] = $oneTable;
						}
					}	
				}
				
			}
			$response['tables'] = $Tables;

		}


	header('Content-Type: application/json');
	echo json_encode($response);
	}
	catch (Exception $e){
		$error = $e->getMessage();
	}	

?>