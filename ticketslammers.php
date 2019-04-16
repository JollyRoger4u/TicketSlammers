<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<?php
session_start();
require_once 'includes/includes.php';

if (isset($_SESSION['sessionID']) && $_SESSION['sessionID'] != 999) { } else {
	$_SESSION['sessionID'] = 999;
	echo "welcome guest!";
}
?>
<header>
	<img class="headerImg" src="img/header.jpg">
	<ul class="menuClass logInMenu">
		<?php if ($_SESSION['sessionID'] == 999) { ?>
			<li><a href="includes/login.php">Login</a></li>
			<li><a href="includes/register.php">Register</a></li>
		<?php } ?>
		<?php if (isset($_SESSION['sessionID']) && $_SESSION['sessionID'] != 999) { ?>
			<li><a href="includes/logout.php">Logout</a></li>
			<li><a href="includes/ticketslammers.php">profile</a></li>
			<li><a href="includes/ownedTickets.php">my tickets</a></li>
			<?php if ($_SESSION['sessionID'] < 2) { ?>
				<li><a href="includes/admin.php">Welcome Admin</a></li>
			<?php } ?>
		<?php } ?>

	</ul>
	<div class="headerText">
		<h1>Welcome to Ticketslammers!</h1>
		<h2>Your most trutworthy ticket retailer and reseller!</h2>
		<h3>We provide you the key to unlock unlimited experiences!</h3>
	</div>
</header>
<title>TicketScammers</title>



</head>



<section class="mainShop">


	<!------  this part handles populating the main store from the database by calling      ---------- 
 -------  on the handler located in classes.php and then using for each to go through   ----------
 -------  all entries from the database. It can handle new events without problems.     ----------
 -------  It is atm vulnerable to spam from an uncautious admin. Also incredibly clunky ---------->

	<h2 class="shopHeader">Currently available events</h2>
	<?php
	$eventPopulate = new TicketHandler;
	$ticketObject = $eventPopulate->getAllEvents();
	foreach ($ticketObject as $data) {
		$tID = $data['eventID'];
		$tName = $data['eventName'];
		$tDsc = $data['eventDsc'];
		$tPrice = $data['ticketPrice'];
		$tImg = $data['eventImg'];
		echo '<div class="eventWrapper">';
		echo '<div class="eventViewer">';
		echo '<img class="eventImg" src="img/' . $tImg . '">';
		echo '<h3 class="eventName">' . $tName . '</h3>';
		echo '<h3 class="eventTime">2019-01-01</h3>';
		echo '<p class="eventDesc">' . $tDsc . '</p>';
		echo '<p class="eventPriceLabel">Price:</p>';
		echo '<p class="eventPrice">' . $tPrice . '</p>';
		echo '<p class="eventMaxTicketsLabel">Maximum tickets:</p>';
		echo '<p class="eventMaxTickets">placeholder<p>';
		echo '<p class="eventCurrentTicketsLabel">Current tickets:</p>';
		echo '<p class="eventCurrentTickets">991</p>';
		echo '<button class="buyBtn">Buy a ticket now!</button>';
		echo '</div>';
		echo '</div>';
	}
	?>


</section>
<!--- This code just gives a very tiny blueprint for css to be glued on when JS sends over content	----
 ---- Hopefully noone else will see this part of the message and I have managed to solve the 		----
 ---- horrible looking CSS... Also remember to remove this message... yep..                         ---->

<section class="shoppingCart">
	<div class="shoppingCartHeader">
		<h3 class="shoppingCartTitle">Shopping Cart</h3>
		<p> name </p>
		<p> price </p>
		<p> quantity </p>
	</div>
	<div class="selectedItemWrap"></div>
</section>

<script src="js/mainpage.js"></script>
<footer>this is the footer</footer>
</body>

</html>