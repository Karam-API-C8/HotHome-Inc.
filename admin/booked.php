<?php
include("../connection.php");

//session_destroy(); LOGOUT

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
                   <h1>Booked Properties</h1>
              </div>

              <div id="gridViewContainer">
                 <?php
                    $propertyQuery = mysqli_query($con,"SELECT * FROM Properties WHERE status='booked' ORDER BY RAND() LIMIT 20");

                    while($row = mysqli_fetch_array($propertyQuery)){
                      echo " <div class='gridViewItem'>
                              <a href='adminPropertiesView.php?id=" . $row['id'] . "'>
                                <img src ='../displaypics/" . $row['pimage'] . "'>

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
