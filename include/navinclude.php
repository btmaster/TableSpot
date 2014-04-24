<?php


?>
<nav>
	<li><a href="Home.php">home</a></li>
	<?php 	echo "<li><a href='Restaurant.php?id= "
				. $_GET['id'] ."'>"; 
			echo $restaurant->GetTitle() . "</a></li>"; ?>
	<?php 	echo "<li><a href='Menu.php?id= "
				. $_GET['id']."'>"; 
			echo "menu</a></li>"; ?>
	<?php 	echo "<li><a href='Tables.php?id= "
				. $_GET['id']."'>"; 
			echo "Tables</a></li>"; ?>
	<?php 	echo "<li><a href='Overview.php?id= "
				. $_GET['id']."'>"; 
			echo "Overview</a></li>"; ?>
	<?php 	echo "<li><a href='Logout.php'>Logout</a></li>";?>

</nav>