<?php echo 'HEADER LOADED'; ?>

<!DOCTYPE html>
<html lang="en">
<!--<link rel="stylesheet" href="../css/normalize.css">
<link rel="stylesheet" href="../css/header.css">-->

<?php
session_start();



if (isset($_SESSION['sessionID']) && $_SESSION['sessionID'] != 999) {
	echo "Logged in as user number" . $_SESSION['sessionID'];
} else {
	$_SESSION['sessionID'] = 999;
	echo "welcome guest!";
}
?>
<header>
	<ul class="menuClass logInMenu">
		<?php if ($_SESSION['sessionID'] == 999) { ?>
			<li><a href="includes/login.php">Login</a></li>
			<li><a href="includes/register.php">Register</a></li>
		<?php } ?>
		<?php if (isset($_SESSION['sessionID']) && $_SESSION['sessionID'] != 999) { ?>
			<li><a href="includes/logout.php">Logout</li>
			<li><a href="ticketslammers.php">profile</li>
		<?php } ?>
	</ul>
	<div class="headerText">
		<h1>Welcome to Ticketslammers!</h1>
		<h2>Your most trutworthy ticket retailer and reseller!</h2>
		<h3>We provide you the key to unlock unlimited experiences!</h3>
	</div>
	<ul class="menuClass mainNav">
		<li><a href="ticketslammers.php">home</a></li>
		<li><a href="ticketslammers.php">about</a></li>
		<li><a href="ticketslammers.php">shopping cart</a></li>
	</ul>
</header>