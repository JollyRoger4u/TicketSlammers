<!DOCTYPE html>

<head>
</head>
<?php
require_once 'includes.php';
?>
<section id="logoutSection">
	<h2>
		You have been successfully logged out, welcome back another time!
	</h2>
	<img src="../img/bye.jpg">
	<button onclick="window.location.href = '/ticketslammers/ticketslammers.php';">back to startpage</button>

</section>
<?php

session_destroy();
$cookie = new CookieHandler();
$cookie->eatCookie();
if (!isset($_GET['reload'])) {
	echo '<meta http-equiv=Refresh content="0;url=logout.php?reload=1">';
}

?>

<footer>this is the footer</footer>