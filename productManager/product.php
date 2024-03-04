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
// Create database
$sql = "CREATE DATABASE IF NOT EXISTS production";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$tableSql = "CREATE TABLE IF NOT EXISTS products (
    productid INT  PRIMARY KEY,
    productname VARCHAR(255) NOT NULL,
    producttype VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    date DATE NOT NULL
)";

if ($conn->query($tableSql) === TRUE) {
    echo "Table 'product' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productid = mysqli_real_escape_string($conn, $_POST["productid"]);
  
    $producttype = mysqli_real_escape_string($conn, $_POST["producttype"]);
    $quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);

    // Update quantity based on matching conditions
    $updateSql = "UPDATE products SET 
                    quantity = quantity + $quantity
                  WHERE productid = '$productid' 
                     
                    AND producttype = '$producttype'";

    if ($conn->query($updateSql) === TRUE) {
        echo "Quantity updated successfully";
    } else {
        echo "Error updating quantity: " . $conn->error;
    }

    // If no rows were affected (no matching record), insert a new one
    if ($conn->affected_rows === 0) {
        $insertSql = "INSERT INTO products (productid,  producttype, quantity, date)
                      VALUES ('$productid',  '$producttype', $quantity, '$date')";

        if ($conn->query($insertSql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error adding record: " . $conn->error;
        }
    }

    header('location:transfer.php'); // Redirect to another page after the operation
}
*/
$conn->close();
?>
