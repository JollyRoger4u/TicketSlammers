<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">

	<title>TicketScammers</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/header.css">

</head>
<?php require_once 'includes/includes.php';
require_once 'includes/header.php';


?>
<section class="mainShop">

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
		//</form>';
		echo '</div>';
		echo '</div>';
	}
	?>


</section>


<section class="shoppingCart">
	<div class="shoppingCartHeader">
		<h3 class="shoppingCartTitle">Shopping Cart</h3>
		<p> name </p>
		<p> price </p>
		<p> quantity </p>
	</div>
	<!--	<div class="selectedItemWrap">
		<img class="ticketImg" src="img\Voltaire.jpg" alt="Voltaire image">
		<p class="ticketName">asaopaaa</p>
		<p class="ticketPrice">$55</p>
		<p class="ticketAmount">1</p>
	</div>
	<div class="selectedItemWrap">
		<img class="ticketImg" src="img\sabaton.jpg" alt="Sabaton image">
		<p class="ticketName">asaopaaa</p>
		<p class="ticketPrice">$55</p>
		<p class="ticketAmount">1</p>
	</div>
	<div class="selectedItemWrap">
		<img class="ticketImg" src="img\placeholder.jpg" alt="Placeholder image">
		<p class="ticketName">asaopaaa</p>
		<p class="ticketPrice">$55</p>
		<p class="ticketAmount">1</p>
	</div> -->
</section>
<section>
	<h1> Todo: </h1>
	<ul>
		<li>general design</li>
		<li>database</li>
		<li>functions</li>
	</ul>
</section>
<script src="js/mainpage.js"></script>
</body>

</html>