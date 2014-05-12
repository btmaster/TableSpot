<?php 
try{
	session_start();
	include_once('../classes/Gerecht.class.php');
	include_once('../classes/Menu.class.php');
	$gerecht = new Gerecht();
	$menu = new Menu();
	$oneMenu = $menu->GetLatest($_SESSION['restaurant']);
	$menuId = $oneMenu['ID_Menu'];

	if(isset($_POST['gerecht']))
	{
		$gerecht->gerecht = $_POST['gerecht'];
		$gerecht->prijs = $_POST['prijs'];
		$gerecht->menu = $menuId;
		$gerecht->Save();
		$response['gerecht'] = $gerecht->gerecht;
		$response['prijs'] = $gerecht->prijs;
	}

	header('Content-Type: application/json');
	echo json_encode($response);
} catch (Exception $e)
{
	$error = $e->getMessage();
}

if(isset($error))
{
	echo $error;
}
?>