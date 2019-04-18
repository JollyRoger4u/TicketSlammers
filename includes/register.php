<head>
	<?php
	require_once 'includes.php';
	include_once 'header.php'; ?>
	<section id="logInSection">
		<form method="post" action="">
			<div class="registerHeader">
				<h2>Welcome to ticketslammers!</h2>
				<h3>Please fill in the registration form</h3>
			</div>
			<ul class="wrapper">
				<li class="form-row">
					<label for="emailReg">email (also your login): </label>
					<input type="text" id="emailReg" name="emailReg" placeholder="example@example.se">
				</li>
				<li class="form-row">
					<label for="passwordReg">Password: </label>
					<input type="text" id="passwordReg" name="passwordReg">
				</li>
				<li class="form-row">
					<label for="passwordReg2">Password again: </label>
					<input type="text" id="passwordReg2" name="passwordReg2">
				</li>
				<li class="form-row">
					<label for="firstNameReg">First name: </label>
					<input type="text" id="firstNameReg" name="firstNameReg">
				</li>
				<li class="form-row">
					<label for="lastNameReg">Last name: </label>
					<input type="text" id="lastNameReg" name="lastNameReg">
				</li>
				<li class="form-row">
					<button type="submit" name="registerBtn">Submit</button>
				</li>
				<label for="yeahYeah">I understand that my data will be stored with ticketslammers and I agree with this</label>
				<input type="checkbox" name="yeahYeah" required>

				<?php
				try {
					if (isset($_POST['registerBtn'])) {
						$emailReg = $_POST['emailReg'];
						$passwordReg = $_POST['passwordReg'];
						$passwordReg2 = $_POST['passwordReg2'];
						$firstNameReg = $_POST['firstNameReg'];
						$lastNameReg = $_POST['lastNameReg'];
						if ($passwordReg == $passwordReg2) {
							$userReg = new User;
							$userReg->newUser($emailReg, $passwordReg, $firstNameReg, $lastNameReg);
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