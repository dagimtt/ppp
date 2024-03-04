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
/*$tableSql = "CREATE TABLE IF NOT EXISTS newproducts(
    productid INT  PRIMARY KEY,
   
    producttype VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    date DATE NOT NULL,
    status VARCHAR(255)
   
)";

if ($conn->query($tableSql) === TRUE) {
    echo "Table 'newproducts' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productid = mysqli_real_escape_string($conn, $_POST["productid"]);
  
    $producttype = mysqli_real_escape_string($conn, $_POST["producttype"]);
    $quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);

$insertSql = "INSERT INTO newproducts (productid,  producttype, quantity, date)
VALUES ('$productid',  '$producttype', $quantity, '$date')";

if ($conn->query($insertSql) === TRUE) {
echo "Record inserted successfully";
} else {
echo "Error adding record: " . $conn->error;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Product Table</title>
</head>
<body>

<div class="container mt-5">
    <h2>Product Table</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Type</th>
            <th>Quantity</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
            <?php
            // Assuming you have a database connection established

            // Replace your_table_name with the actual table name
            $sql = "SELECT productid, producttype, quantity, date, status FROM newproducts";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['productid']}</td>";
                echo "<td>{$row['producttype']}</td>";
                echo "<td>{$row['quantity']}</td>";
                echo "<td>{$row['date']}</td>";
                echo "<td>{$row['status']}</td>";
                echo "<td>
                <a btn btn-primary btn-sm href='editproduct.php?productid=$row[productid]'>edit</a>
                </td>";
                echo "</tr>";
            }

            // Close the database connection
            mysqli_close($conn);
          ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
