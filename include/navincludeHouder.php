<nav>
	<li <?php echo (basename($_SERVER['SCRIPT_FILENAME'])=='Home.php'? ' class="active' : '');?>><a href="Home.php">Home</a></li>
	<li <?php echo (basename($_SERVER['SCRIPT_FILENAME'])=='Restaurant.php'? ' class="active"' : '');?>>
		<?php echo "<a href='Restaurant.php?id=" . $_GET['id']. "'>";
			  echo $restaurant->GetTitle() . "</a></li>"; ?>
	<li <?php echo (basename($_SERVER['SCRIPT_FILENAME'])=='Menu.php'? ' class="active"' : '');?>>
		<?php echo "<a href='Menu.php?id=" . $_GET['id']. "'>Menu</a></li>"; ?>
	<li <?php echo (basename($_SERVER['SCRIPT_FILENAME'])=='Tables.php'? ' class="active"' : '');?>>
		<?php echo "<a href='Tables.php?id=" . $_GET['id']. "'>Tables</a></li>"; ?>
	<li><a href="Logout.php" id="logout">Log out</a></li>
</nav>	