<?php
$servername = "localhost";
$username = "root";
$password = "";
$product="production";
// Create connection
$conn = new mysqli($servername, $username, $password,$product);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*
$sql = "CREATE TABLE requestitem (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  userid VARCHAR(255) NOT NULL,
  quantity INT NOT NULL,
  date DATE NOT NULL,
  description TEXT NOT NULL
)";

// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "Table 'requestitem' created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
*/


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $username = $_POST["username"];
  $userid = $_POST["userid"];
  $quantity = $_POST["quantity"];
  $date = $_POST["date"];
  $description = $_POST["description"];

  // SQL query to insert data into the 'requestitem' table
  $sql = "INSERT INTO requestitem (username, userid, quantity, date, description) VALUES ('$username', '$userid', '$quantity', '$date', '$description')";

  // Execute the query
  if ($conn->query($sql) === TRUE) {
      echo "Data inserted successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
// Close the connection
$conn->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/request.css">
    <title>Request Item</title>
</head>
<body>
<h1 class="header" style="color: white;">REQUEST ITEM HERE</h1>

    <p class="para" style="color: white;">please fill the field below <br>to request item </p>
  <div class="request-box">
    <form action="" method="post">
        <input type="text" name="username" id="username" class="username" placeholder="userName" onkeyup="validateUserName()"> <br>
        <span id="req1"></span>
        <input type="text" name="userid" id="userid" class="userid" placeholder="userID" onkeyup="validateUserId()" > <br>
    <span id="req2"></span>
    <input type="text" name="quantity" id="quantity" class="quantity" placeholder="quantity" onkeyup="validateQuantity()"> <br>
    <span id="req3"></span>
    <input type="date" name="date" id="date" class="date"> <br>
    <textarea name="description" class="description" id="description" onkeyup="validateDescription()" placeholder="description"></textarea></br>
    <span id="req4"></span>
    <input type="submit" name="submit" id="submit" class="btn" value="requestItem" return onclick="validateForm()"> 
    <span id="req5"></span>
    </form>
  </div>  
</body>
<script defer src="validation/request.js"></script>
</html>