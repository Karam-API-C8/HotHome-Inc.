<?php
	include("connection.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<html>
<head>
	<title>Welcome to findhome</title>
	<link rel="stylesheet" type="text/css" href="style/css/register.css">
	<script   src="https://code.jquery.com/jquery-3.6.3.js"   integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="   crossorigin="anonymous"></script>
	<script type="text/javascript" src="style/js/register.js"></script>
</head>
<body>

	<?php
		if(isset($_POST['registerButton'])){
			echo '<script>
						$(document).ready(function() {
								$("#loginForm").hide();
								$("#registerForm").show();
						});	

				  </script>';
		}else{
			echo '<script>
						$(document).ready(function() {
								$("#loginForm").show();
								$("#registerForm").hide();
						});	

				  </script>';
		}
	?>
		<div id="background">

				<div id="loginContainer">

						<div id="inputContainer">


								<!--<form id="adminForm" action="register.php" method="POST">
									<h2>Admin Login</h2>
										<p>
											<?php echo $account->getError(Constants::$adminFailed); ?>
											<label for="adminUsername">Username</label>
											<input id="adminUsername" name="adminUsername" type="text" placeholder="Your username" required>
										</p>
										<p>
											<label for="adminPassword">Password</label>
											<input id="adminPassword" name="adminPassword" type="password" placeholder="Your password" required>
										</p>

									<button type="submit" name="adminButton">LOG IN</button>
									
								</form>-->

								<form id="loginForm" action="register.php" method="POST">
									<h2>Login to your account</h2>
										<p>
											<?php echo $account->getError(Constants::$loginFailed); ?>
											<label for="loginUsername">Username</label>
											<input id="loginUsername" name="loginUsername" type="text" placeholder="Your username" required>
										</p>
										<p>
											<label for="loginPassword">Password</label>
											<input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
										</p>

									<button type="submit" name="loginButton">LOG IN</button>
									
									<div class="hasAccount">
										<span id="hideLogin">Don't have an account yet? Sign up.</span>
									</div>
								</form>



							<form id="registerForm" action="register.php" method="POST">
								<h2>Create account</h2>
								<p>
									<?php echo $account->getError(Constants::$usernameCharacters); ?>
									<?php echo $account->getError(Constants::$usernameTaken); ?>
									<label for="username">Username</label>
									<input id="username" name="username" type="text" placeholder="Your username" value="<?php getInputValue('username') ?>" required>
								</p>

								<p>
									<?php echo $account->getError(Constants::$firstNameCharacters); ?>
									<label for="firstName">First name</label>
									<input id="firstName" name="firstName" type="text"  value="<?php getInputValue('firstName') ?>" required>
								</p>

								<p>
									<?php echo $account->getError(Constants::$lastNameCharacters); ?>
									<label for="lastName">Last name</label>
									<input id="lastName" name="lastName" type="text"  value="<?php getInputValue('lastName') ?>" required>
								</p>

							


								<p>
									<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
									<?php echo $account->getError(Constants::$emailTaken); ?>
									<label for="email">Email</label>
									<input id="email" name="email" type="email" placeholder="XYZ@gmail.com" value="<?php getInputValue('email') ?>" required>
								</p>

								<p>
									<label for="email2">Confirm email</label>
									<input id="email2" name="email2" type="email" placeholder="XYZ@gmail.com" value="<?php getInputValue('email2') ?>" required>
								</p>

								<p>
									<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
									
									<?php echo $account->getError(Constants::$passwordCharacters); ?>
									<label for="password">Password</label>
									<input id="password" name="password" type="password" placeholder="Your password" required>
								</p>

								<p>
									<label for="password2">Confirm password</label>
									<input id="password2" name="password2" type="password" placeholder="Your password" required>
								</p>

								<button type="submit" name="registerButton">SIGN UP</button>

								<div class="hasAccount">
										<span id="hideRegister">Already have an account? Login here.</span>
									</div>
								
							</form>


						</div>
							<div id="rightContent">
									<div id="loginText">
									<h1>Findhome.com</h1>
									<!--<h2>Real Estate made easy</h2>
									<ul>
										<li>Buying and Selling on fingertips.</li>
										<li>Search the largest collection of luxury homes.</li>
									</ul>-->
									</div>

									<div id="loginImg">
										<h1>Explore</h1>
										<img src="style/images/1.jpg">
										<img src="style/images/2.jpg">
										<img src="style/images/3.jpg">
										<img src="style/images/4.jpg">
									</div>


							</div>

						
				</div>		


		</div>
</body>
</html>