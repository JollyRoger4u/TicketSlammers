<?php
require_once("includes.php");


$eventID = $_POST['eventID'];
$nr = $_POST['amount'];
$userID = $_POST['userID'];
$purchaseHandler = new TicketHandler;
$testPost = $purchaseHandler->boughtTicket($eventID, $nr, $userID);
echo $testPost;
