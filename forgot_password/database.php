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