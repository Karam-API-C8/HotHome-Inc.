<?php
//include("includes/classes/Account.php");
 include("maill.php");
session_start();
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
}

// Establish a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Portal";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if a property ID was provided in the URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Retrieve the property details from the database
    $sql = "SELECT * FROM properties WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $propertyId = $row['id'];
        $propertyTitle = $row['title'];
        $propertyPrice = $row['Price'];
        $propertyAddress = $row['address'];
         

    }

                  if(isset($_POST['submitbn'])){
            // Retrieve the form data
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $dates = $_POST['date'];
                    

                    // Insert the booking into the database
                    $sql3 = "INSERT INTO bookings VALUES (null,'$name', '$email','$phone','$dates','$propertyId')";
                    $result3 = mysqli_query($conn, $sql3);

                    //Changing status 

                     $sql4 = "UPDATE properties SET status='booked' WHERE id='$propertyId'";
                     $result4 = mysqli_query($conn, $sql4);

                    // Check if the booking was successfully added
                        
                             
                        
          
        }
}




mysqli_close($conn);
?>
<html>
<head>
      <title>Book Now - <?php echo $propertyTitle; ?></title>

    <link rel="stylesheet" type="text/css" href="style/css/new.css">
     <link rel="stylesheet" type="text/css" href="style/css/sellnew.css">

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


                         <h1>Book Now - <?php echo $propertyTitle; ?></h1>
        <h2 style="text-align: center;">Enter your details to confirm the booking.</h2>


          
              </div>

              <div id="gridViewContainer">

         
                      <form style="text-align: center;" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required><br>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required><br>

       
            <input type="submit" name="submitbn" value="Book Now">
        </form>
                      <?php

             
                         if ($result3) {
                           echo "<h1>Booking successful</h1>";
                             } else {
                         
                            echo "Error adding booking: " . mysqli_error($conn);
                        }   

                        ?>
        
   
               


             </div>
             <br><br><br>

        
  

          
        </div>

        
        </div>

    </div>

    


</body>

</html>