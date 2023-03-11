<?php
  include("connection.php");
  include("includes/classes/Account.php");
// Connect to the database
$account = new Account($con);

// Process form submission
if(isset($_POST['submitButton'])) {
  
  // Get form data
  $property_title = $_POST['property_name'];
  $property_type = $_POST['property_type'];

  $property_description = $_POST['property_description'];

  $property_price = $_POST['property_price'];

  $property_contact = $_POST['property_contact'];

  // Get image data
  //$image_name = $_FILES['image']['name'];
  //$image_data = addslashes(file_get_contents($_FILES['image']['tmp_name']));
   //$image_type = $_FILES['image']['type'];
$Successful = $account->listing($property_title, $property_type, $property_description, $property_price, $property_contact);
 


if($Successful == true) {
    
    echo "<h1>Your Property Has Been Listed</h1>";
  }
}  

// Close the database connection

?>

<!-- HTML form -->
<form method="post" action="" enctype="multipart/form-data">
  <label for="property_name">Property Name:</label>
  <input type="text" id="property_name" name="property_name"><br>

  <label for="property_type">Property Type:</label>
  <select id="property_type" name="property_type">
    <option value="House">House</option>
    <option value="Apartment">Apartment</option>
    <option value="Condo">Condo</option>
  </select><br>


  <label for="property_description">Description:</label><br>
  <textarea id="property_description" name="property_description"></textarea><br>


  <label for="property_price">Price:</label>
  <input type="text" id="property_price" name="property_price"><br>

  <label for="property_price">Contact:</label>
  <input type="text" id="property_contact" name="property_contact"><br>

  <label for="image">Image:</label>
  <input type="file" id="image" name="image"><br>

  <input name="submitButton" id="submitButton" type="submit" value="Submit">
</form>