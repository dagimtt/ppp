<?php
$servername = "localhost";
$username = "root";
$password = "";
$product = "production";

// Create connection
$conn = new mysqli($servername, $username, $password, $product);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productid = "";
$producttype = "";
$quantity = "";
$date = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['productid'])) {
        header("location: /IMSP/productManager/product.html");
        exit;
    }

    $productid = $_GET['productid'];
    $sql = "SELECT productid, producttype, quantity, date FROM newproducts WHERE productid=$productid";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    if (!$row) {
        header("location:/IMSP/productManager/product.html");
        exit;
    }

    $producttype = $row["producttype"];
    $quantity = $row["quantity"];
    $date = $row["date"];
} else {
    $productid = $_POST['productid'];
    $producttype = $_POST["producttype"];
    $quantity = $_POST["quantity"];
    $date = $_POST["date"];

    do {
        if (empty($productid) || empty($producttype) || empty($quantity) || empty($date)) {
            $errorMessage = "All fields are required";
            break;
        }

        $sql = "UPDATE newproducts SET producttype='$producttype', quantity='$quantity', date='$date' WHERE productid=$productid";
        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }

        $successMessage = "Product updated successfully";
        header("location:/IMSP/productManager/product.html");
        exit;
    } while (false);
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product.css">
    <title>Product</title>
</head>
<body>
    <h1 class="header">Product </h1>
    <p class="para">please fill the field to <br>register </p>
   <div class="product-box">
   
    <form action="newproduct.php" method="post">
        <input type="text" name="productid" id="productid" class="productid" placeholder="ProductId" onkeyup="validateProductId()"  >
        <span id="pro1"></span>
        
        <span id="pro2"></span>
        <select name="producttype"  class="producttype" id="producttype" onkeyup="validateTypeProduct()" >
            <option >enter types of product</option>
            <option value="1l">0.5L</option>
            <option value="1l">1L</option>
            <option value="2l">2L</option>
            <option value="10l">10L</option>
        
            <option value=" 20l">20l</option>
            </select>
            <span id="pro3"></span>
            <input type="text" name="quantity" id="quantity" class="quantity" placeholder="quantity" onkeyup="quantity()">
            <span id="quan"></span>
            <input type="date" name="date" id="date" class="date">
            <input type="submit" name="submit" id="submit" class="btn" value="save" return onclick="validateForm()">
            <span id="pro4"></span>
    </form>
   </div> 
   <script defer src="validation/product.js"></script>
</body>
</html>


