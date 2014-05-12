<nav>
	<li <?php echo (basename($_SERVER['SCRIPT_FILENAME'])=='Home.php'? 'class="active' : '');?>><a href="Home.php">home</a></li>
	<?php 	echo "<li" ;
	        echo (basename($_SERVER['SCRIPT_FILENAME'])=='Restaurant.php'? 'class="active' : '');  
	        echo "><a href='Restaurant.php?id= " . $_GET['id'] ."'>"; 
			echo $restaurant->GetTitle() . "</a></li>"; ?>
	<?php 	echo "<li ";
			echo (basename($_SERVER['SCRIPT_FILENAME'])=='Menu.php'? 'class="active' : '');  
			echo "><a href='Menu.php?id= ". $_GET['id']."'>"; 
			echo "menu</a></li>"; ?>
	<?php 	echo "<li ";
			echo (basename($_SERVER['SCRIPT_FILENAME'])=='Tables.php'? 'class="active' : '');  
			echo "><a href='Tables.php?id= ". $_GET['id']."'>"; 
			echo "Tables</a></li>"; ?>
	<?php 	echo "<li ";
			echo (basename($_SERVER['SCRIPT_FILENAME'])=='Overview.php'? 'class="active' : '');  
			echo "><a href='Overview.php?id= ". $_GET['id']."'>"; 
			echo "Overview</a></li>"; ?>
	<?php 	echo "<li><a href='Logout.php'>Logout</a></li>";?>
	<li><a href="Logout.php">Log out</a></li>

</nav>