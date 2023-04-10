<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $property_type = $_POST['property_type'];
  $property_address = $_POST['property_address'];
  $property_description = $_POST['property_description'];

  $errors = array();

  if (empty($name)) {
    $errors[] = 'Please enter your name.';
  }

  if (empty($email)) {
    $errors[] = 'Please enter your email.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
  }

  if (empty($phone)) {
    $errors[] = 'Please enter your phone number.';
  }

  if (empty($property_type)) {
    $errors[] = 'Please select a property type.';
  }

  if (empty($property_address)) {
    $errors[] = 'Please enter the property address.';
  }

  if (empty($property_description)) {
    $errors[] = 'Please enter the property description.';
  }

  if (empty($errors)) {
    $host = 'localhost';
    $user = 'username';
    $password = 'password';
    $database = 'database_name';
    $db = mysqli_connect($host, $user, $password, $database);

    $query = "INSERT INTO properties (name, email, phone, property_type, property_address, property_description) VALUES ('$name', '$email', '$phone', '$property_type', '$property_address', '$property_description')";
    mysqli_query($db, $query);

    mysqli_close($db);

    header('Location: success.php');
    exit();
  }
}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>">
  <br>

  <label for="email">Email:</label>
  <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
  <br>

  <label for="phone">Phone:</label>
  <input type="tel" name="phone" id="phone" value="<?php echo htmlspecialchars($phone); ?>">
  <br>

  <label for="property_type">Property Type:</label>
  <select name="property_type" id="property_type">
    <option value="">--Select--</option>
    <option value="house" <?php if ($property_type == 'house') echo 'selected'; ?>>House</option>
    <option value="apartment" <?php if ($property_type == 'apartment') echo 'selected'; ?>>Apartment</option>
    <option value="condo" <?php if ($property_type == 'condo') echo 'selected'; ?>>Condo</option>
  </select>
  <br>

  <label for="property_address">Property Address:</label>
  <input type="text" name="property_address" id="property_address" value="<?php echo htmlspecialchars($property_address); ?>">
  <br>

  <label for="property_description">Property Description:</label>
  <textarea name="property_description" id="property_description"><?php echo htmlspecialchars($property_description); ?></textarea>
  <br>

  <input type="submit" value="Submit">
</form>