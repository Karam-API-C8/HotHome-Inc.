<?php

	include("connection.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	$account = new Account($con);
	include("includes/handlers/login-handler.php");


	if(isset($_POST['adminButton'])) { 
	$adminUsername = $_POST['adminUsername'];
	$adminPassword = $_POST['adminPassword'];

	$isAdmin = $account->adminLogin($adminUsername ,$adminPassword);
	
	if($isAdmin == true){
		header("Location: admin.php");
	}


}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
		<link rel="stylesheet" type="text/css" href="style/css/register.css">
</head>
<body>

	<div id="background">

			<div id="loginContainer">

						


				<div id="inputContainer">


						<form id="adminForm" action="register.php" method="POST">
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

							<div class="hasAccount">
										<a href="register.php">Click to go back to normal sign in</a>
							</div>
							
						</form>
				</div>		

				<div id="loginText">
							<h1>Findhome.com</h1>
							<h2>Admin Login</h2>
							<ul>
								<li></li>
								<li></li>
								<li></li>

							</ul>
						</div>
			</div>
	</div>


</body>
</html>