<?php
    $active[$current] = "class=active";
?>
<div id="header">
	<ul id="menu">
		<li><a href="index.php" <?php echo $active['home'] ?>>HOME<br><span></span></a></li>   
		<li><a href="about-us.php" <?php echo $active['about'] ?>>ABOUT&nbsp;&nbsp;US<br><span></span></a></li>   
		<li><a href="registration.php" <?php echo $active['registration'] ?>>REGISTRATION<br><span></span></a></li>
		<li><a href="contact-us.php" <?php echo $active['contact'] ?>>CONTACT&nbsp;&nbsp;US<br><span></span></a></li>
	</ul>
</div>