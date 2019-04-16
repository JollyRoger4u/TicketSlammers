<!DOCTYPE html>
<html>
<?php
require_once 'includes.php';
include_once 'header.php'
?>

<body>
	<div class="form-style-2">
		<div class="form-style-2-heading">Provide your information</div>
		<form class="form-style-2" name="addNewEventForm" action="" method="post" id="addEventForm">
			<label class=".form-style-2 label" for="eventName">Name of event:</label>
			<input type="text" class="eventInput" name="eventName" placeholder="Placeholderspalooza" required>
			<label class=".form-style-2 label" for="eventDate">Date of event:</label>
			<input type="text" class="eventDate" name="eventDate" placeholder="2019-12-24" required>
			<label class=".form-style-2 label" for="ticketPrice">Price per ticket:</label>
			<input type="text" class="" name="ticketPrice" placeholder="$$$$$" required>
			<label class=".form-style-2 label" for="eventTickets">Number of tickets for the event:</label>
			<input type="text" class="" name="eventMaxTickets" placeholder="25" required>
			<label class=".form-style-2 label" for="newEventImg">Name of the image file</label>
			<input type="text" class="" name="newEventImg" placeholder="Really_Badass_Image.jpg" required>
			<label class=".form-style-2 label" for="eventDescription"></label>
			<textarea name="eventDescription" class="eventDesc" rows="20" cols="60" placeholder="the fun place to be"></textarea>
			<button type="submit" class="subBtn" name="subBtn" value="Submit" id="subBtn">Submit</button>
		</form>
	</div>


	<?php
	if (isset($_post['subBtn'])) {
		$eventName = $_POST['eventName'];
		$eventDate = $_POST['eventDate'];
		$ticketPrice = $_POST['ticketPrice'];
		$newEventImg = $_POST['newEventImg'];
		$eventDescription = $_POST['eventDescription'];
		$eventMaxTickets = $_POST['eventMaxTickets'];
		$wrTicket = new TicketHandler;
		$wrTicket->writeEvent($eventName, $eventDate, $ticketPrice, $newEventImg, $eventDescription, $eventMaxTickets);
	}


	?>