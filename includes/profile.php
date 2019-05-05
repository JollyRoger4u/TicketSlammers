<head>
	<?php
	require_once '../includes/includes.php';
	include_once '../includes/header.php';
	if (!isset($_SESSION['userRole'])) {
		header("location: http://localhost/ticketslammers/ticketslammers.php");
	}
	$uID = $_SESSION['userID'];
	$uFN = $_SESSION['firstName'];
	$uLN = $_SESSION['lastName'];
	$uEmail = $_SESSION['email']
	?>
	<section id="logInSection">


	</section>

	<section id="logInSection">
		<form method="post" action="">
			<div class="registerHeader">
			</div>
			<ul class="wrapper">
				<h2>Welcome <?php echo $uFN ?><h2>
						<li class="form-row">

							<label for="emailReg">Current email: <?php echo $uEmail ?> </label>
							<input type="text" id="emailReg" name="emailReg" placeholder="example@example.se">
						</li>
						<li class="form-row">
							<label for="passwordReg">Change password</label>
							<input type="text" id="passwordReg" name="passwordReg">
						</li>
						<li class="form-row">
							<label for="passwordReg2">Repeat Password: </label>
							<input type="text" id="passwordReg2" name="passwordReg2">
						</li>
						<li class="form-row">
							<label for="firstNameReg">First name: <?php echo $uFN ?> </label>
							<input type="text" id="firstNameReg" name="firstNameReg">
						</li>
						<li class="form-row">
							<label for="lastNameReg">Last name: <?php echo $uLN ?> </label>
							<input type="text" id="lastNameReg" name="lastNameReg">
						</li>
						<li class="form-row">
							<button type="submit" name="changeData">change settings</button>
						</li>

						<?php
						try {
							if (isset($_POST['changeData'])) {
								$emailReg = $_POST['emailReg'];
								$passwordReg = $_POST['passwordReg'];
								$passwordReg2 = $_POST['passwordReg2'];
								$firstNameReg = $_POST['firstNameReg'];
								$lastNameReg = $_POST['lastNameReg'];
								if ($passwordReg == $passwordReg2) {
									$userReg = new User;
									$userReg->editUser($uID, $emailReg, $passwordReg, $firstNameReg, $lastNameReg);
								} else {
									echo "password mismatch, please try harder";
								}
							}
						} catch (Exception $e) {
							echo 'Exception -> ';
							var_dump($e->getMessage());
						}

						?>
		</form>
	</section>