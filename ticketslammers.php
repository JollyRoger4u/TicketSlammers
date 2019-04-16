<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">

	<title>TicketScammers</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/header.css">

</head>
<?php require_once 'includes/includes.php';

?>
<section class="mainShop">
	<h2 class="shopHeader">Currently available events</h2>
	<?php
	$ticketPopulate = new TicketHandler;
	$ticketObject = $ticketPopulate->getAllTickets();

	foreach ($ticketObject as $data) {
		$tID = $data['ticketID'];
		$tName = $data['ticketName'];
		$tDsc = $data['ticketDsc'];
		$tPrice = $data['ticketPrice'];
		$tImg = $data['ticketImg'];
		echo '<form class="eventViewer" method="post">';
		echo '<img class="eventImg" src="img/' . $tImg . '">';
		echo '<h3 class="eventName">' . $tName . '</h3>';
		echo '<h3 class="eventTime">2019-01-01</h3>';
		echo '<p class="eventDesc">' . $tDsc . '</p>';
		echo '<p class="eventPriceLabel">Price:</p>';
		echo '<p class="eventMaxTicketsLabel">Maximum tickets:</p>';
		echo '<p class="eventMaxTickets">placeholder<p>';
		echo '<p class="eventCurrentTicketsLabel">Current tickets:</p>';
		echo '<p class="eventCurrentTickets">991</p>';
		echo '<button class="BuyBtn">Buy a ticket now!</button></form>';
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
	<div class="selectedItemWrap">
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
	</div>
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