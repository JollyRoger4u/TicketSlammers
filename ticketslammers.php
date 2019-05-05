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
		$tID = $data['eventID'];
		$tName = $data['eventName'];
		$tDsc = $data['eventDsc'];
		$tPrice = $data['ticketPrice'];
		$tImg = $data['eventImg'];
		echo '<div class="eventWrapper">';
		echo '<div class="eventViewer">';
		echo '<img class="eventImg" src="img/' . $tImg . '">';
		echo '<h2 class="eventName">' . $tName . '</h2></br>';
		echo '<h3 class="eventTime">2019-01-01</h3>';
		echo '<p class="eventDesc">' . $tDsc . '</p>';
		echo '<p class="eventPriceLabel">Price:</p>';
		echo '<p class="eventPrice">' . $tPrice . '</p>';
		echo '<p class="eventMaxTicketsLabel">Maximum tickets:</p>';
		echo '<p class="eventMaxTickets">placeholder<p>';
		echo '<p class="eventCurrentTicketsLabel">Current tickets:</p>';
		echo '<p class="eventCurrentTickets">991</p>';
		echo '<button class="buyBtn">Buy a ticket now!</button>';
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
	<div id="shoppingCartWrap"></div>
	<div class="shoppingCartHeader">
		<p>total no. items: </p>
		<p class="totalItems">0</p>
		<p>total cost: </p>
		<p class="totalCost">0</p>
		<button class="buyBtnFinal">Purchase</button>
	</div>

</section>

<script src="js/mainpage.js"></script>
<footer>this is the footer</footer>
</body>

</html>