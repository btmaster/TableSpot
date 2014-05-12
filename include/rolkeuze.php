<?php
if ($_SESSION['rol'] == "restaurant_keeper") {
	echo "
	<style type='text/css'>

	#user{
			display:none;
	}

	</style>";
	} else {
	echo "
	<style type='text/css'>

	#restauranthouder{
		display:none;
	}

	</style>";
}?>