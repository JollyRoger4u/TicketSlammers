<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>SuperDuper Tickets</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/header.css">

</head>

<?php
/*
if (isset($_SESSION['sessionID']) && $_SESSION['sessionID'] != 999) {
    echo "Logged in as user number" . $_SESSION['sessionID'];
} else {
    $_SESSION['sessionID'] = 999;
    echo "welcome guest!";
}*/
$connect = new DatabaseConnect();

$connect->openConnection();

?>



<body>
    <header>
        <ul class="menuClass logInMenu">
            <!-- <?php if ($_SESSION['sessionID'] == 999) { ?>-->
            <li><a href="ticketslammers.html">Login</a></li>
            <li><a href="ticketslammers.html">Register</a></li>
            <!--<?php } ?>

             <!--<?php if ($_SESSION['sessionID'] != 999) { ?>-->
            <li><a href="ticketslammers.html">Logout</li>
            <li><a href="ticketslammers.html">profile</li>
            <!--<?php } ?>-->

            <li><a href="ticketslammers.html">shopping cart</a></li>
        </ul>
        <div class="headerText">
            <h1>Welcome to Ticketslammers!</h1>
            <h2>Your most trutworthy ticket retailer and reseller!</h2>
            <h3>We provide you the key to unlock unlimited experiences!</h3>
        </div>
        <ul class="menuClass mainNav">
            <li><a href="ticketslammers.html">home</a></li>
            <li><a href="ticketslammers.html">about</a></li>
            <li><a href="ticketslammers.html">shopping cart</a></li>
        </ul>
    </header>