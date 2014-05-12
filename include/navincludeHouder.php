<nav>
	<li <?php echo (basename($_SERVER['SCRIPT_FILENAME'])=='Home.php'? ' class="active' : '');?>><a href="Home.php">home</a></li>
	<li <?php echo (basename($_SERVER['SCRIPT_FILENAME'])=='Restaurant.php'? ' class="active' : '');?>><a href="Restaurant.php">Restaurant</a></li>
	<li <?php echo (basename($_SERVER['SCRIPT_FILENAME'])=='Menu.php'? ' class="active' : '');?>><a href="Menu.php?id="<?php echo $_GET['id']; ?>"">Menu</a></li>
	<li <?php echo (basename($_SERVER['SCRIPT_FILENAME'])=='Tables.php'? ' class="active' : '');?>><a href="Tables.php">Tables</a></li>
	<?php 	echo "<li" ;
	        echo (basename($_SERVER['SCRIPT_FILENAME'])=='Restaurant.php'? ' class="active' : '');  
	        echo "><a href='Restaurant.php?id= " . $_GET['id'] ."'>"; 
			echo $restaurant->GetTitle() . "</a></li>"; ?>	
	<li><a href="Logout.php">Log out</a></li>

</nav>