<head>
	<?php
	require_once 'includes.php';
	include_once 'header.php'; ?>
	<section style="display: none" id="thankYou">
		<h1>Thank you for registering!</h1>
		<p>All of us here at ticketslammers wish you a rocking experience!</p>
		<img src="../img/thanks.jpg">
		<button onclick="window.location.href = '/ticketslammers/ticketslammers.php';">to store</button>
	</section>
	<!-- Lets user register to database for later login. -->
	<section id="logInSection">
		<form method="post" action="">
			<div class="registerHeader">
				<h2>Welcome to ticketslammers!</h2>
				<h3>Please fill in the registration form</h3>
			</div>
			<ul class="wrapper">
				<li class="form-row">
					<label for="emailReg">email (also your login): </label>
					<input type="email" id="emailReg" name="emailReg" placeholder="example@example.se" required>
				</li>
				<li class="form-row">
					<label for="passwordReg">Password: </label>
					<input type="text" id="passwordReg" name="passwordReg" required>
				</li>
				<li class="form-row">
					<label for="passwordReg2">Password again: </label>
					<input type="text" id="passwordReg2" name="passwordReg2" required>
				</li>
				<li class="form-row">
					<label for="firstNameReg">First name: </label>
					<input type="text" id="firstNameReg" name="firstNameReg" required>
				</li>
				<li class="form-row">
					<label for="lastNameReg">Last name: </label>
					<input type="text" id="lastNameReg" name="lastNameReg" required>
				</li>

				<label for="yeahYeah">I understand that my data will be stored with ticketslammers and I agree with this</label>
				<input type="checkbox" name="yeahYeah" required>
				<li class="form-row">
					<button type="submit" name="registerBtn">Submit</button>
				</li>

				<?php
				// gathers data from input and trims it, also checks that both passwordfields are correct
				try {
					if (isset($_POST['registerBtn'])) {
						$emailReg = $_POST['emailReg'];
						$passwordReg = $_POST['passwordReg'];
						$passwordReg2 = $_POST['passwordReg2'];
						$firstNameReg = $_POST['firstNameReg'];
						$lastNameReg = $_POST['lastNameReg'];


						if ($passwordReg == $passwordReg2) {
							$emailReg = trim(htmlspecialchars($_POST['emailReg']));
							$passwordReg = $_POST['passwordReg'];
							$passwordReg2 = $_POST['passwordReg2'];
							$firstNameReg = trim(htmlspecialchars($_POST['firstNameReg']));
							$lastNameReg = trim(htmlspecialchars($_POST['lastNameReg']));
							$userReg = new User;
							$userReg->newUser($emailReg, $passwordReg, $firstNameReg, $lastNameReg);
							?>
							<script>
								let thanks = document.getElementById('thankYou');
								let registerDone = document.getElementById('logInSection');
								thanks.style.display = "flex";
								registerDone.style.display = "none";
							</script>
						<?php
					} else {
						echo "password mismatch, please try again";
					}
				}
			} catch (Exception $e) {
				echo 'Exception -> ';
				var_dump($e->getMessage());
			}

			?>
		</form>
	</section>
	<footer></footer>