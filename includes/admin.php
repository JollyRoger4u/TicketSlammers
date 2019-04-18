<!DOCTYPE html>
<html>
<?php
require_once 'includes.php';
include_once 'header.php'
?>

<body>
	<h2 class="adminPanelHeader">Welcome Admin, would you like to play a game?</h2>
	<h2 class="shopHeader">Currently available events</h2>
	<?php
	echo '<form class="eventWrapper" method="POST">';
	echo '<div class="eventViewer">';
	echo "<p>Create a ticket <br></p>";
	echo "for event: ";
	echo '<input type="text" name="id"></input>';
	echo '<button type="submit" name="createTicket">Create Ticket</button>';

	if (isset($_POST['createTicket'])) {
		$eventID = $_POST['id'];
		echo $eventID;
		$wrTicket = new TicketHandler;
		$wrTicket->writeTicket(1);
	}
	echo "</div>";
	echo "</form>";


	?>
	<div class="form-style-2">
		<div class="form-style-2-heading">Event Information</div>
		<form class="form-style-2" name="addNewEventForm" method="post" id="addEventForm">
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
			<button type="submit" name="eventSubmit">Submit</button>
			<?php
			try {
				if (isset($_POST['eventSubmit'])) {
					$eventName = $_POST['eventName'];
					$eventDate = $_POST['eventDate'];
					$ticketPrice = $_POST['ticketPrice'];
					$newEventImg = $_POST['newEventImg'];
					$eventDescription = $_POST['eventDescription'];
					$eventMaxTickets = $_POST['eventMaxTickets'];
					$wrTicket = new TicketHandler;
					$wrTicket->writeEvent($eventName, $eventDate, $ticketPrice, $newEventImg, $eventDescription, $eventMaxTickets);
				}
			} catch (Exception $e) {
				echo 'Exception -> ';

				var_dump($e->getMessage());
			}
			?>
		</form>
	</div>