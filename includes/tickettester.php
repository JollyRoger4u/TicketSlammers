<?php

require_once 'includes.php';
?>
<section id="ticketSection">
	<?php
	$filterData = filter_input(INPUT_POST, FILTER_SANITIZE_STRING);
	$ticketSerial = $_POST['ticket'];
	$ticketHandler =  new TicketHandler;
	$ticketHandler->checkTicket($ticketSerial);
	?>
	<button onclick="window.location.href = '/ticketslammers/ticketslammers.php';">back to startpage</button>

</section>