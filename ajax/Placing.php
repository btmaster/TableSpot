<?php 
try{

	include_once("../classes/Placing.class.php");
	$_SESSION['restaurant'] = 2;
	if(isset($_POST['place'])){
		$placing = new Placing();
		$placing->UpdateAll($_SESSION['restaurant']);
		$respons['getal'] = $_SESSION['restaurant'];
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