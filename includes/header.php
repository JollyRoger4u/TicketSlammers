<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/login.css">
</head>
<?php
session_start();



if (isset($_SESSION['sessionID']) && $_SESSION['sessionID'] != 999) { } else {
	$_SESSION['sessionID'] = 999;
	echo "welcome guest!";
}
?>
<header>
	<img class="headerImg" src="../img/header.jpg">
	<ul class="menuClass logInMenu">
		<li><a href="../ticketslammers.php">Home</a>
			<?php if ($_SESSION['sessionID'] == 999) { ?>
			<li><a href="login.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
		<?php } ?>
		<?php if (isset($_SESSION['sessionID']) && $_SESSION['sessionID'] != 999) { ?>
			<li><a href="logout.php">Logout</a></li>
			<li><a href="ticketslammers.php">profile</a></li>
			<li><a href="ownedTickets.php">my tickets</a></li>
			<?php if ($_SESSION['sessionID'] < 2) { ?>
				<li><a href="admin.php">Welcome Admin</a></li>
			<?php } ?>
		<?php } ?>

	</ul>
	<div class="headerText">
		<h1>Welcome to Ticketslammers!</h1>
		<h2>Your most trutworthy ticket retailer and reseller!</h2>
		<h3>We provide you the key to unlock unlimited experiences!</h3>
	</div>
</header>