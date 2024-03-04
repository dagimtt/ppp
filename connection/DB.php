<?php
$servername = "localhost";
$username = "root";
$password = "";
$product="online";
// Create connection
$conn = new mysqli($servername, $username, $password,$product ,3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
