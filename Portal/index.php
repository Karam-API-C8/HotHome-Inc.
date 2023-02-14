<?php
include("connection.php");

//session_destroy(); LOGOUT

if(isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: register.php");
}

?>

<html>
<head>
	<title>Welcome to Findhome.com!</title>

	<link rel="stylesheet" type="text/css" href="style/css/index.css">
</head>

<body>

	<div id="mainContainer">

		<div id="topContainer">



			<div id="navBarContainer">
				<nav class="navBar">

					<a href="index.php" class="navItem" class="logo" style="text-decoration: none; font-size: 25px; color: #07d159">
						FindHome
					</a>


					<div class="group">

						<div class="navItem">
							<a href="search.php" class="navItemLink">Search
								<img src="assets/images/icons/search.png" class="icon" alt="Search">
							</a>
						</div>

					</div>

					<div class="group">
						<div class="navItem">
							<a href="buy.php" class="navItemLink">Buy</a>
						</div>

						<div class="navItem">
							<a href="sell.php" class="navItemLink">Sell</a>
						</div>

            <div class="navItem">
              <a href="explore.php" class="navItemLink">Explore</a>
            </div>

						<div class="navItem">
							<a href="profile.php" class="navItemLink">Kunal Sharma</a>
						</div>

            <div class="navItem">
              <a href="register.php" class="navItemLink">Sign out</a>
            </div>
					</div>




				</nav>

      
			

		  </div>


		
         <div id="mainViewContainer">

              <div id="mainContent">
                   <h1>Properties you might like</h1>
              </div>

              <div id="gridViewContainer">
                  <div class="gridViewItem">
                     <img src="style/images/prop1.jpg">
                     <p>Luxary house</p>
                   </div> 
                    <div class="gridViewItem">
                      <img src="style/images/prop3.jpg">
                      <p>Bunglow </p>
                    </div>
                     <div class="gridViewItem">
                       <img src="style/images/prop2.jpg">
                       <p>2 bedroom condo appartment</p>
                     </div>  
                   <div class="gridViewItem">  
                    <img src="style/images/prop4.jpg">
                    <p>3 bedroom condo appartment</p>
                  </div>

                     <div id="gridViewContainer">
                  <div class="gridViewItem">
                     <img src="style/images/prop1.jpg">
                     <p>Luxary house</p>
                   </div> 
                    <div class="gridViewItem">
                      <img src="style/images/prop3.jpg">
                      <p>Bunglow </p>
                    </div>
                     <div class="gridViewItem">
                       <img src="style/images/prop2.jpg">
                       <p>2 bedroom condo appartment</p>
                     </div>  
                   <div class="gridViewItem">  
                    <img src="style/images/prop4.jpg">
                    <p>3 bedroom condo appartment</p>
                  </div>

             </div>
         
        </div>

			

		</div>

	</div>

	


</body>

</html>