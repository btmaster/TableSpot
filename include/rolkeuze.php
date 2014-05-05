<?php
if ($_SESSION['rol'] == "restaurant_keeper") {
?>	
	<style type="text/css">
	#user
		{
			display:none;
		}
	</style>
	<?php }

	else
	{
		?>
	<style type="text/css">#restauranthouder{
display:none;
}</style>
<?php
}
?>