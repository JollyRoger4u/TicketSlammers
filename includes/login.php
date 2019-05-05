<!DOCTYPE html>
<html lang="en">

<head>
</head>
<?php
require_once 'includes.php';

if (isset($_POST['loginBtn'])) {
	$userName = $_POST['userName'];
	$userPass = $_POST['password'];
	$user = new User();
	$loggedIn = $user->UserLogin($userName, $userPass);
	if ($loggedIn == false) {
		echo "<h1>LOGGED IN, GOOD BOY!</h1>";
	}
}

?>


<section id="logInSection">
	<form method="post">
		<!--action="login.php">-->
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
<footer>this is the footer</footer>
<script src="../js/login.js"></script>