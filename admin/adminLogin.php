<?php

	include("../connection.php");
	include("../includes/classes/Account.php");
	include("../includes/classes/Constants.php");
	$akount = new Account($con);
	
	






	if(isset($_POST['adminButton'])) { 
	$adminUsername = $_POST['adminUsername'];
	$adminPassword = $_POST['adminPassword'];

	$isAdmin = $akount->adminLogin($adminUsername ,$adminPassword);
	
	if($isAdmin == true){
		
		$_SESSION['userLoggedIn'] = $adminUsername;
		header("Location: admin.php");
	}


}
?>


<html>
<head>
	<title>Admin login</title>
		<link rel="stylesheet" type="text/css" href="../style/css/regisster.css">
		<link rel="stylesheet" type="text/css" href="../style/css/new.css">
	<link rel="stylesheet" type="text/css" href="../style/css/sellnew.css">
</head>
<body>

	<div id="background">



			<div id="mainContainer">

    <div id="topContainer">



      <div id="navBarContainer">
        <nav class="navBar">

          <a href="admin.php" class="navItem" class="logo" style="text-decoration: none; font-size: 25px; color: #07d159">
            HotHomeINC.
          </a>


          <div class="group">

            <div class="navItem">
              <a href="adminSearch.php" class="navItemLink">Search
                
              </a>
            </div>

          </div>

          <div class="group">
            <div class="navItem">
              <a href="adminEdit.php" class="navItemLink">Edit</a>
            </div>

            <div class="navItem">
              <a href="adminList.php" class="navItemLink">List</a>
            </div>

            <div class="navItem">
              <a href="adminDelete.php" class="navItemLink">Delete</a>
            </div>

            

            <div class="navItem">
              <a href="adminLogin.php?action=logout" class="navItemLink">Sign out</a>
            </div>
            
             <div class="navItem">
              <a href="amortgage.php" class="navItemLink">Mortgage Calculator</a>
            </div>
            <div class="navItem">
              <a href="booked.php" class="navItemLink">Booked Properties</a>
            </div>

          </div>




        </nav>

      
      

      </div>





			<div id="loginContainer">

						


				<div id="inputContainer">


						<form style="text-align: center;" id="adminForm" action="adminLogin.php" method="POST">
							<h2>Admin Login</h2>
								<p>
									<?php echo $akount->getError(Constants::$adminFailed); ?>
									<label for="adminUsername">Username</label>
									<input id="adminUsername" name="adminUsername" type="text" placeholder="Your username" required>
								</p>
								<p>
									<label for="adminPassword">Password</label>
									<input id="adminPassword" name="adminPassword" type="password" placeholder="Your password" required>
								</p>

							<button class="bookNowButton" type="submit" name="adminButton">Admin Sign In</button>

							<div class="hasAccount">
										<br><a style=" color: black; text-decoration: none;  " href="../register.php">Click to go back to normal sign in</a>
							</div>
							
						</form>
				</div>		

				<div id="loginText">
							
							
							
						</div>
						
								

							
			</div>
	</div>
</div>
</div>


</body>
</html>