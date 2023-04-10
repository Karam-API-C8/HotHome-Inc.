

<?php
include("connection.php");
  session_start();
    if(isset($_SESSION['userLoggedIn'])) {
        $userLoggedIn = $_SESSION['userLoggedIn'];
        
        if (isset($_GET['action']) && $_GET['action'] == 'logout') {
            session_destroy();
            header('Location: adminLogin.php');
            exit;
        }
    }
    else {
        header("Location: adminLogin.php");
    } 

    

?>

<html>
<head>
	<title>Welcome to HotHomeINC!</title>

		<link rel="stylesheet" type="text/css" href="../style/css/new.css">
	<link rel="stylesheet" type="text/css" href="../style/css/sellnew.css">
</head>

<body>

	<div id="mainContainer">

		<div id="topContainer">



			<div id="navBarContainer">
				<nav class="navBar">

					<a href="admin.php" class="navItem" class="logo" style="text-decoration: none; font-size: 25px; color: #07d159">
						HotHomeINC.
					</a>


					<div class="group">

						<div class="navItem">
							<a href="search.php" class="navItemLink">Search
								
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
              <a href="adminLogin.php?action=logoout" class="navItemLink">Sign out</a>
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


		
         <div id="mainViewContainer">

              <div id="mainContent">
                   <h1>Mortgage Calculator</h1>
              </div>

              <div id="gridViewContainer">

              	<?php
              				if(isset($_POST['submit'])) {
							$loan_amount = $_POST['loan_amount'];
							$interest_rate = $_POST['interest_rate'];
							$loan_term = $_POST['loan_term'];
							$monthly_interest_rate = ($interest_rate/100)/12;
							$number_of_payments = $loan_term*12;
							$monthly_payment = ($loan_amount*$monthly_interest_rate*pow(1+$monthly_interest_rate,$number_of_payments))/(pow(1+$monthly_interest_rate,$number_of_payments)-1);
							$total_payment = $monthly_payment*$number_of_payments;
							echo "<br><br><h1>Monthly payment: $".number_format($monthly_payment,2)."</h1><br>";
							echo "<h1><Total payment: $".number_format($total_payment,2)."</h1><br>";
							}
              	?>

              	
					<form id="loginForm" method="post" action="">
						<label>Loan amount:</label>
						<input type="number" name="loan_amount" required><br><br>
						<label>Interest rate:</label>
						<input type="number" step="0.01" name="interest_rate" required><br><br>
						<label>Loan term (in years):</label>
						<input type="number" name="loan_term" required><br><br>
						<input type="submit" name="submit" value="Calculate">
					</form>


             </div>
          
        </div>

			

		</div>

	</div>

	


</body>

</html>
