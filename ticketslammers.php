<!DOCTYPE html>
<html lang="en">

<head>
	<title>TicketScammers</title>
</head>
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/ticketslammers/includes/includes.php";
include_once($path);
$currentUserRole = 0;
?>

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
		$tID = htmlspecialchars($data['eventID']);
		$tName = htmlspecialchars($data['eventName']);
		$tDsc = htmlspecialchars($data['eventDsc']);
		$tPrice = htmlspecialchars($data['ticketPrice']);
		$tImg = htmlspecialchars($data['eventImg']);
		$tMax = htmlspecialchars($data['maxTickets']);
		$tSold = htmlspecialchars($data['soldTickets']);
		$tRemain = $tMax - $tSold;
		echo '<div class="eventWrapper">';
		echo '<div class="eventViewer row">';
		echo '<h1 class="eventID" style="display: none">' . $tID . '</h1>';
		echo '<div class="col col-1">';
		echo '<img class="eventImg" src="img/' . $tImg . '">';
		echo '</div>';
		echo '<div class="col col-2">';
		echo '<h2 class="eventName">' . $tName . '</h2>';
		echo '<h3 class="eventTime eventText">2019-01-01</h3>';
		echo '<p class="eventDesc eventText">' . $tDsc . '</p>';
		echo '<p class="eventPriceLabel eventText">Price:</p>';
		echo '<p class="eventPrice eventText">' . $tPrice . '</p>';
		echo '<p class="eventMaxTicketsLabel eventText">max Tickets</p>';
		echo '<p class="eventMaxTickets eventText">' . $tMax . '</p>';
		echo '<p class="eventCurrentTicketsLabel eventText">Available tickets:</p>';
		echo '<p class="eventCurrentTickets eventText">' . $tRemain . '</p>';
		echo '<button class="buyBtn">Buy a ticket now!</button>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	/**********  made obsolete by admin page               */

	/*if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'Admin') {
			$buttonID = $tID;
			echo '<button name="createTicket" type="submit" value="' . $buttonID . '">
			Create a ticket for this event
			</button>';
			SpecTicket($buttonID);
			echo "button id: " . $buttonID;
		}
		echo '</div>';
		echo '</div>';
	}

	function SpecTicket($buttID)
	{
		try {
			if (isset($_POST['createTicket'])) {
				$buttonID = $buttID;
				echo $buttonID;
				$wrTicket = new TicketHandler;
				$wrTicket->writeTicket($buttonID);
				echo "Ticket created for event " . $buttonID;
			}
		} catch (Exception $e) {
			echo 'Exception -> ';

			var_dump($e->getMessage());
		}
	}*/
	?>


</section>
<!--- This code just gives a very tiny blueprint for css to be glued on when JS sends over content ---->

<section class="shoppingCart">
	<div class="shoppingCartHeader">
		<h3 class="shoppingCartTitle">Shopping Cart</h3>
		<p> name </p>
		<p> price </p>
		<p> quantity </p>
	</div>
	<div id="shoppingCartWrap"></div>
	<div class="shoppingCartHeader">
		<p>total no. items: </p>
		<p class="totalItems">0</p>
		<p>total cost: </p>
		<p class="totalCost">0</p>
		<button class="buyBtnFinal" method="post">Purchase</button>
	</div>

</section>

<script src="js/mainpage.js"></script>
<script src="js/cookies.js"></script>
<footer class="shopFooter"></footer>

</body>

</html>