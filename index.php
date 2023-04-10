<?php
include("connection.php");

//session_destroy(); LOGOUT

	/*session_start();
    if(isset($_SESSION['userLoggedIn'])) {
        $userLoggedIn = $_SESSION['userLoggedIn'];
        
        if (isset($_GET['action']) && $_GET['action'] == 'logout') {
            session_destroy();
            header('Location: register.php');
            exit;
        }
    }
    else {
        header("Location: register.php");
    }*/

?>

<html>
<head>
	<title>Welcome to HotHomeINC!</title>

	 
    <link rel="stylesheet" type="text/css" href="style/css/new.css">
  
</head>

<body>

	<div id="mainContainer">

		<div id="topContainer">



			<div id="navBarContainer">
				<nav class="navBar">

					<a href="index.php" class="navItem" class="logo" style="text-decoration: none; font-size: 25px; color: #07d159">
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
							<a href="sell.php" class="navItemLink">Sell</a>
						</div>

            <div class="navItem">
              <a href="explore.php" class="navItemLink">Explore</a>
            </div>

						

            <div class="navItem">
              <a href="register.php?action=logout" class="navItemLink">Sign out</a>
            </div>
            <div class="navItem">
              <a href="ContactUs.php" class="navItemLink">Contact Us</a>
            </div>
             <div class="navItem">
              <a href="mortgage.php" class="navItemLink">Mortgage Calculator</a>
            </div>

					</div>




				</nav>

      
			

		  </div>


		
         <div id="mainViewContainer">

              <div id="mainContent">
                   <h1>Properties you might like</h1>
              </div>

              <div id="gridViewContainer">
                 <?php
                    $propertyQuery = mysqli_query($con,"SELECT * FROM Properties ORDER BY RAND() LIMIT 20");

                    while($row = mysqli_fetch_array($propertyQuery)){
                      echo " <div class='gridViewItem'>
                              <a href='properties.php?id=" . $row['id'] . "'>
                                <img src ='displaypics/" . $row['pimage'] . "'>

                                <div class='gridViewInfo'>"
                                    . $row['title'] . 
                                "</div>
                              </a>  

                              </div>";

                    }
                 ?>

             </div>
          
        </div>

			

		</div>

	</div>

	


</body>

</html>