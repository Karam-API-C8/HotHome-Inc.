  <?php

include("../connection.php");
include("../includes/classes/Account.php");

 
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

if(isset($_POST['submitButton']))
{
 
  $name=$_POST['name'];
  $property_address = $_POST['property_address'];
  $location = "../upload/";
  $file1=$_FILES['img1']['name'];
  $file_tmp1=$_FILES['img1']['tmp_name'];
  $file2=$_FILES['img2']['name'];
  $file_tmp2=$_FILES['img2']['tmp_name'];
  $file3=$_FILES['img3']['name'];   
  $file_tmp3=$_FILES['img3']['tmp_name'];
  $file4=$_FILES['img4']['name'];
  $file_tmp4=$_FILES['img4']['tmp_name'];
  $data=[];
  $data=[$file1,$file2,$file3,$file4];
  $images=implode(' ',$data);
  $query="INSERT into images (name,images,address) values('$name','$images','$property_address')";
  $fire=mysqli_query($con,$query);
  
  if($fire)
  {
    move_uploaded_file($file_tmp1, $location.$file1);
    move_uploaded_file($file_tmp2, $location.$file2);
    move_uploaded_file($file_tmp3, $location.$file3);
    move_uploaded_file($file_tmp4, $location.$file4);
    echo "success";
  }
  else 
  {
    echo "failed";
  }
} 





  
// Connect to the database
$account = new Account($con);

// Process form submission
if(isset($_POST['submitButton'])) {
  
  // Get form data
  $property_title = $_POST['property_name'];
  $property_type = $_POST['property_type'];
  $property_description = $_POST['property_description'];
  $property_price = $_POST['property_price'];
  $property_address = $_POST['property_address'];
  
  $property_contact = $_POST['property_contact'];
  $name=$_POST['name'];

  $plocation = "../displaypics/";
  $file=$_FILES['img']['name'];
  $file_tmp=$_FILES['img']['tmp_name'];
  $data=[];
  $data=[$file];
  $pimage=implode(' ',$data);
  $status = "NBooked";

$Successful = $account->listing($property_title, $property_type, $property_description, $property_price, $property_address, $pimage, $property_contact, $name, $status);
$plocation = "../displaypics/";
     

      
        
       move_uploaded_file($file_tmp, $plocation.$file);
       
  
      


};

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
                   <h1 id="vanish">List Your Property</h1>

                   <?php

  if($Successful == true) {
    
   
    echo "<script>document.getElementById('vanish').style.display = 'none';</script>";
    echo "<h1>Your Property Has Been Listed</h1>";
  }



?>


              </div>

              <div id="gridViewContainer">
                <form method="post" action="" enctype="multipart/form-data">
  <label for="property_name">Property Name:</label>
  <input type="text" id="property_name" name="property_name"><br>

  <label for="property_type">Property Type:</label>
  <select style="background-color: black;  color: white;" id="property_type" name="property_type">
    <option value="House">House</option>
    <option value="Apartment">Apartment</option>
    <option value="Condo">Condo</option>
  </select><br>


  <label for="property_description">Description:</label><br>
  <textarea style="background-color: white;" id="property_description" name="property_description"></textarea><br>


  <label for="property_price">Price:</label>
  <input type="text" id="property_price" name="property_price"><br>

   <label for="property_price">Address:</label>
  <input type="text" id="property_address" name="property_address"><br>

   <label for="property_price">Display Image:</label>
  <input type="file" id="property_image" name="img"><br>

  <label for="property_price">Contact:</label>
  <input type="text" id="property_contact" name="property_contact"><br>

   <label> Your Name</label>
   <input type="text" name="name" >

  <h1>Add more images</h1>


   <br>
   <label>Upload Image 1</label>
   <input type="file" name="img1" >
   <br>
   <label>Upload Image 2</label>
   <input type="file" name="img2" >
   <br>
   <label>Upload Image 3</label>
   <input type="file" name="img3" >
   <br>
   <label>Upload Image 4</label>
   <input type="file" name="img4" >
   <br>

  <input name="submitButton" id="submitButton" type="submit" value="Submit" style="color: white">


   
  

</form>



             </div>
          
        </div>

            

        </div>

    </div>

    
  



</body>