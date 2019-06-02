<?php
require_once 'includes.php';
?>

<!--Diplays data from database about tickets owned by current user -->
<section id="ticketSection">
	<h1>Your confirmed tickets:</h1>
	<?php

	$ticketHandler = new TicketHandler;
	$currentUser = $_SESSION['userID'];
	$ticketObject = $ticketHandler->allOwnedTickets($currentUser);

	foreach ($ticketObject as $row) {
		$tickEvent = $row['eventID'];
		$event = $ticketHandler->eventIdentifier($tickEvent);
		echo '<p>ticket Serial: ' . htmlspecialchars($row['tickSerial']) . " for event " . htmlspecialchars($event['eventName']) . " Event date: " . htmlspecialchars($event['eventDate']) . "</p><br/>\n";
	}

	?>

	<button onclick="window.location.href = '/ticketslammers/ticketslammers.php';">back to startpage</button>
	<div class="ticketTester">
		<form action="tickettester.php" method="post">
			test ticket serial here for validation: <input type="text" name="ticket"><br>
			<input type="submit" class="testBtn" value="Test">
		</form>
	</div>

</section>
<?php

?>
<footer></footer>