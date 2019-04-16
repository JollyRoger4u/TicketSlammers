<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/login.css">
</head>
<?php
include_once 'header.php';
require_once 'includes.php';

if (isset($_POST['loginBtn'])) {
	$userName = $_POST['userName'];
	$userPass = $_POST['password'];
	$user = new User();
	$user->UserLogin($userName, $userPass);
	header('Location:../ticketslammers.php');
}


?>
<section id="logInSection">
	<form method="post" action="login.php">
		<ul class="wrapper">
			<li class="form-row">
				<label for="userName">Username:</label>
				<input type="text" id="userName" name="userName">
			</li>
			<li class="form-row">
				<label for="password">Password:</label>
				<input type="password" id="password" name="password">
			</li>
			<li class="form-row">
				<button type="submit" name="loginBtn">Submit</button>
			</li>
		</ul>
	</form>
</section>