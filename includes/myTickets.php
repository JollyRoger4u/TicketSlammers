<?php
require_once 'includes.php';
?>
<section id="ticketSection">
	<h1>Your confirmed tickets:</h1>
	<p> A numerical 0 means your ticket is not used yet</p>
	<?php

	$ticketHandler = new TicketHandler;
	$currentUser = $_SESSION['userID'];
	$ticketObject = $ticketHandler->allOwnedTickets($currentUser);

	foreach ($ticketObject as $row) {

		echo 'ticket Serial: ' . $row['tickSerial'] . ' is ticket used: ' . $row['used'] . "<br />\n";
	}

	?>
	<button onclick="window.location.href = '/ticketslammers/ticketslammers.php';">back to startpage</button>






	<form action="tickettester.php" method="post">
		test ticket serial here for validation: <input type="text" name="ticket"><br>
		<input type="submit">
	</form>

</section>
<?php

?>
<footer>this is the footer</footer>