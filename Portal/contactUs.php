<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Add code to store or send the form data
    
    echo "Thank you for your message, $name. We will get back to you soon.";
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Contact Us</title>
  </head>
  <body>
    <h1>Contact Us</h1>
    <form action="submit.php" method="post">
      <p>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
      </p>
      <p>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
      </p>
      <p>
        <label for="message">Message:</label>
        <textarea id="message" name="message"></textarea>
      </p>
      <p>
        <input type="submit" value="Submit">
      </p>
    </form>
  </body>
</html>x