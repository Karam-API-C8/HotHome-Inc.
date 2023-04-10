<?php
// Replace with your MySQL database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Portal";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $basePrice = $_POST['property_price'];
  $tenPercent = 0.1;
  $totalPrice = $basePrice * $tenPercent;

  // Insert the totalPrice value into a table named 'table_name'
  $sql = "INSERT INTO table_name (price) VALUES ('$totalPrice')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Page</title>
</head>
<body>
  <form method="POST">
    <label for="property_price">Property Price:</label>
    <input type="text" name="property_price" id="property_price">
    <button type="submit" id="submit">Submit</button>
  </form>

  <script>
    const btn = document.getElementById("submit");

    btn.addEventListener("click", event => {
      const basePrice = document.getElementById("property_price").value;
      const tenPercent = 0.1;
      const totalPrice = basePrice * tenPercent;

      // Display the totalPrice value in an alert
      alert(totalPrice);
    });
  </script>
</body>
</html>
