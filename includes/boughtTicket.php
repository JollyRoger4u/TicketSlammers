<?php
require_once("classes.php");

$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$eventID = $_POST['eventID'];
$nr = $_POST['amount'];
$userID = $_POST['userID'];
$purchaseHandler = new TicketHandler;
$testPost = $purchaseHandler->boughtTicket($eventID, $nr, $userID);
echo "ticket request sent \n";
if ($testPost) {
	echo "tickets created";
}
