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


    if (isset($_GET['term'])) {
    $term = urldecode($_GET['term']);
} else {
    $term = "";
}

// Prepare a SQL query to retrieve properties that match the search term
$sql = "SELECT * FROM properties WHERE  name LIKE '%$term%' OR type LIKE '%$term%' OR title LIKE '%$term%' OR address LIKE '%$term%'";

// Execute the query and get the results
$result = mysqli_query($con, $sql);




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
                 <div class="searchContainer">
                        <h1>Search for Property</h1>
                        <input style="position: center; width: 100%; background-color: black;" type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="type here..." onfocus="this.value = this.value">
                    </div>
              </div>
                   <h1>Remove Property</h1>
              </div>

              <div id="gridViewContainer">
                 <?php
                    $propertyQuery = mysqli_query($con,"SELECT * FROM Properties ORDER BY RAND() LIMIT 20");

                    while($row = mysqli_fetch_array($result)){
                      echo " <div class='gridViewItem'>
                              <a href='adminProperties.php?id=" . $row['id'] . "'>
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
                openPage("adminDelete.php?term=" + val);
            },1000);
        })
    })
</script>



</body>

</html>