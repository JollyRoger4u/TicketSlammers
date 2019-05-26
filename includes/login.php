<!DOCTYPE html>
<html lang="en">

<head>
</head>
<?php
require_once 'includes.php';

if (isset($_POST['loginBtn'])) {
	$userMail = $_POST['email'];
	$userPass = $_POST['password'];
	$user = new User();
	$loggedIn = $user->UserLogin($userMail, $userPass);
	var_dump($loggedIn);
	//echo '<meta http-equiv=Refresh content="0;url=login.php?reload=1">';
}


?>


<section id="logInSection">
	<form method="post">
		<!--action="login.php">-->
		<ul class="wrapper">
			<li class="form-row">
				<label for="email">email:</label>
				<input type="text" id="email" name="email" placeholder="email@temp.se">
			</li>
			<li class="form-row">
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" placeholder="password">
			</li>
			<li class="form-row">
				<button type="submit" name="loginBtn">Submit</button>
			</li>
		</ul>
	</form>
</section>
<footer>this is the footer</footer>
<script src="../js/login.js"></script>