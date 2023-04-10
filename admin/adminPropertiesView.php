<?php

include("../connection.php");

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

   
?>
<html>
<head>
    <title>Welcome to HotHomeINC!</title>
       
      <link rel="stylesheet" type="text/css" href="../style/css/propnew.css">
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
                   
              </div>

              <div id="gridViewContainer">
                 <?php
                    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
         echo "<h1>ID: " . $id . "</h1><br>";
        // Display the property details
        echo "<h1>" . $row['title'] . "</h1>";
        echo "<p> Description: " . $row['description'] . "</p>";
        echo "<p>Address: " . $row['address'] . "</p>";
        echo "<p>Price: $" . $row['Price'] . "</p>";
        
        // Retrieve the images for the property from the database
        $address = $row['address'];
        $sql2 = "SELECT * FROM images WHERE address = '$address'";
        $result2 = mysqli_query($conn, $sql2);

        // Display the images
        while ($row2 = mysqli_fetch_assoc($result2)) {
               $images = explode(' ', $row2['images']);
    foreach($images as $image) {
      echo "<img src='../upload/" . $image . "' alt='Property Image' class='gridViewItem' style='height:250px;' onclick='openFullscreen(this)'>";

      echo "<script>
        function openFullscreen(img) {
            var elem = img;
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) { /* Safari */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { /* IE11 */
                elem.msRequestFullscreen();
            }
        }
      </script>";
    }

        }
    } else {
        echo "No property found with ID " . $id;
    }
} else {
    echo "No property ID provided";
}

// Close the database connection
mysqli_close($conn);
                 ?>

             </div>
             <br><br><br>

            
          
        </div>

        
        </div>

    </div>

    


</body>

</html>