<?php


// Establish a connection to the database
$host = "localhost";
$user = "root";
$password = "";
$database = "Portal";

$connection = mysqli_connect($host, $user, $password, $database);

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



if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the search term from the query string
if (isset($_GET['term'])) {
    $term = urldecode($_GET['term']);
} else {
    $term = "";
}

// Prepare a SQL query to retrieve properties that match the search term
$sql = "SELECT * FROM properties WHERE  name LIKE '%$term%' OR type LIKE '%$term%' OR title LIKE '%". $term ."%'";

// Execute the query and get the results
$result = mysqli_query($connection, $sql);

// Display the results in a table


// Close the database connection
mysqli_close($connection);
?>








<html>
<head>
    <title>Welcome to HotHomeINC!</title>

    <link rel="stylesheet" type="text/css" href="style/css/indsx.css">
    <link rel="stylesheet" type="text/css" href="style/css/searchnew.css">

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
                   


                   <div class="searchContainer">
                        <h1>Search for Property</h1>
                        <input style="position: center; width: 100%; background-color: black;" type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="type here..." onfocus="this.value = this.value">
                    </div>
              </div>

              <div id="gridViewContainer">
                <?php
                      

                        while ($row = mysqli_fetch_assoc($result)) {
                                echo " <div class='gridViewItem'>
                                <br><br>
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

    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"></script>

<script type="text/javascript">
    $(".searchInput").focus();     

    function openPage(url) {
        window.location.href = url;
    };

    
    $(function(){
        var timer;

        $(".searchInput").keyup(function(){
            clearTimeout(timer);

            timer = setTimeout(function(){

                var val = $(".searchInput").val();
                openPage("search.php?term=" + val);
            },2000);
        })
    })
</script>


</body>

</html>









