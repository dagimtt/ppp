<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Button with Dynamic Value</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Button with Dynamic Value</h2>
       
<?php
//$db=mysqli_connect($host,$user,$password,$db_name,3306);
  $conn = mysqli_connect('localhost','root','','IMP1',3307);
  if($conn){
    echo "conn suc";
  }    
  else
    die(mysqli_error($conn));
 // Fetch value from database
 $sql = "SELECT product FROM store LIMIT 1"; 
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
     // Output data of each row
     $row = $result->fetch_assoc();
         $itemName = $row["product"];
         echo '<button class="btn btn-primary">' . $itemName . '</button>';
     
 } else {
     echo "0 results";
 }
 $conn->close();
?>
</div>
</body>
</html>