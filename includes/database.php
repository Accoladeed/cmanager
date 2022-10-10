<?php
$servername = "localhost";
$database = "store";
$username = "root";
$password = "";

// Create connection -CHALLENGE: Use try and catch to handle the databast connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
