<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="/ticketslammers/css/normalize.css">
	<link rel="stylesheet" href="/ticketslammers/css/header.css">
	<link rel="stylesheet" href="/ticketslammers/css/login.css">
	<title>TicketSlammers</title>
</head>
<?php
session_start();

$currentUserRole = 0;
$cookie = new CookieHandler();
if (!isset($_COOKIE['cookiesAccepted'])) {
	?>
	<section id="cookieWarning">
		<h3>This site uses cookies</h3>
		<p>The ticketslammers site uses cookie to track certain information for website functionality.</p>
		<p>This allows you to stay logged in and for the website to remember your shopping cart</p>
		<p>We do not share any information with third parties</p>
		<p>By continuing to use the site you agree that this is acceptable to you</p>
		<button id="okToCookiesBtn">ok, thanks for the heads up</button>
	</section>
<?php
} else if (isset($_COOKIE['TSUser'])) {
	$cookieHash = $_COOKIE['TSUser'];
	$cookie->checkCookie($cookieHash);
	$currentUserRole = $_SESSION['userRole'];
} ?>



<header>
	<!--<img class="headerImg" src="img/header.jpg">-->
	<ul class="menuClass logInMenu">
		<li><a href="/ticketslammers/ticketslammers.php">HOME</a> </li>
		<?php
		if (!isset($_SESSION['userRole'])) {
			?> <li><a href="/ticketslammers/includes/login.php">Login</a></li>
			<li><a href="/ticketslammers/includes/register.php">Register</a></li><?php } ?>
		<?php
		?>
		<?php if (isset($_SESSION['userRole'])) { ?>
			<li><a href="/ticketslammers/includes/logout.php">Logout</a></li>
			<li><a href="/ticketslammers/includes/profile.php">profile</a></li>
			<li><a href="/ticketslammers/includes/ownedTickets.php">my tickets</a></li>
			<?php if ($_SESSION['userRole'] == "Admin") { ?>
				<li><a href="/ticketslammers/includes/admin.php">Welcome Admin</a></li>
			<?php } ?>
		<?php } ?>
	</ul>
	<div class="headerText">
		<h1>Welcome to Ticketslammers!</h1>
		<h2>Your most trustworthy ticket retailer and reseller!</h2>
		<h3>We provide you the key to unlock unlimited experiences!</h3>
	</div>
</header>