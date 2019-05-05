<!DOCTYPE html>
<html>
<?php
require_once 'includes.php';
include_once 'header.php'
?>

<body>
	<h2 class="adminPanelHeader">Welcome Admin</h2>
	<h2 class="shopHeader">Currently available events</h2>
	<?php
	$handler = new TicketHandler();
	$eventList = $handler->getAllEvents();

	foreach ($eventList as $data) {
		$tID = $data['eventID'];
		$tName = $data['eventName'];
		$tDsc = $data['eventDsc'];
		$tPrice = $data['ticketPrice'];
		$tImg = $data['eventImg'];
		echo '<section class="adminEventWrap">';
		echo '<img class="eventImgThumb" src="../img/' . $tImg . '">';
		echo '<span class="eventName">' . $tName . '</span>';
		echo '<span class="eventTime">2019-01-01</span></br>';
		echo '<span class="eventPriceLabel">Price:</span>';
		echo '<span class="eventPrice">' . $tPrice . '</span></br>';
		echo '<span class="eventMaxTicketsLabel">Maximum tickets:</span>';
		echo '<span class="eventMaxTickets">placeholder<span></br>';
		echo '<span class="eventCurrentTicketsLabel">Current tickets:</span>';
		echo '<span class="eventCurrentTickets">991</span></br>';
		echo '<span class="eventID">Event ID: ' . $tID . '</span>';
		echo '<button type="POST" id="createTicket" name="createTicket">Create Ticket</button></br>';
		echo '</section>';
	}
	if (isset($_POST['createTicket'])) {
		alert('woot');
		$eventID = $_POST['id'];
		$wrTicket = new TicketHandler;
		$wrTicket->writeTicket($eventID);
	}
	echo "</div>";
	echo "</form>";


	?>
	<div class="form-style-2">
		<h2>Create a new Event</h2>
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
					$eventName = trim(htmlspecialchars($_POST['eventName']));
					$eventDate = trim(htmlspecialchars($_POST['eventDate']));
					$ticketPrice = trim(htmlspecialchars($_POST['ticketPrice']));
					$newEventImg = trim(htmlspecialchars($_POST['newEventImg']));
					$eventDescription = trim(htmlspecialchars($_POST['eventDescription']));
					$eventMaxTickets = trim(htmlspecialchars($_POST['eventMaxTickets']));
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