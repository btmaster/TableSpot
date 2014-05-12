<nav>
	<li <?php echo (basename($_SERVER['SCRIPT_FILENAME'])=='Home.php'? ' class="active' : '');?>><a href="Home.php">Home</a></li>
	<li <?php echo (basename($_SERVER['SCRIPT_FILENAME'])=='Restaurant.php'? ' class="active"' : '');?>>
		<?php echo "<a href='Restaurant.php?id=" . $_GET['id']. "'>";
			  echo $restaurant->GetTitle() . "</a></li>"; ?>
	<li <?php echo (basename($_SERVER['SCRIPT_FILENAME'])=='Overview.php'? ' class="active"' : '');?>>
		<?php echo "<a href='Overview.php?id=" . $_GET['id']. "'>Overview</a></li>"; ?>
	<li><a href="Logout.php" id="logout">Log out</a></li>
</nav>	