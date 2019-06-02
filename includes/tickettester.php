<?php
//takes ajax request for checking that a ticket is correct
require_once 'includes.php';
?>
<section id="ticketSection">
	<?php
	$ticketSerial = $_POST['ticket'];

	$ticketHandler =  new TicketHandler;
	$ticketHandler->checkTicket($ticketSerial);
	?>
	<button onclick="window.location.href = '/ticketslammers/includes/mytickets.php';">back to tickets</button>

</section>