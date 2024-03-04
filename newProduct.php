


<?php
include("./connection/DB.php");

 //Get Update id and status  
 if (isset($_GET['productid']) && isset($_GET['status'])) {  
     $productid=$_GET['productid'];  
     $status=$_GET['status'];  
     mysqli_query($conn,"update newproducts set status='$status' where productid='$productid'");  
     header("location:newProduct.php");  
     die();
 }

/*
$tableSql = "CREATE TABLE IF NOT EXISTS newproducts(
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

/*

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
*/

$sql=mysqli_query($conn,"select * from newproducts");  
?>  
<!DOCTYPE html>  
<html>  
<head>  
     <meta charset="utf-8">  
     <meta name="viewport" content="width=device-width, initial-scale=1">  
     <title>New Product</title>  
     <style type="text/css">  
          *{  
               padding: 0;  
               margin: 0;  
               box-sizing: border-box;  
          }  
          body{  
               background: #ccc;  
               display: flex;  
               justify-content: center;  
          }  
          .container{  
               width: 100%;  
               max-width: 900px;  
               margin: 10rem auto;  
          }  
          .container table{  
               width: 100%;  
               margin: auto;  
               border-collapse: collapse;  
               font-size: 2rem;  
          }  
          .container table th{  
               background: red;  
               color: #fff;  
          }  
          select{  
               width: 100%;  
               padding: 0.5rem 0;  
               font-size: 1rem;  
          }  
     </style>  
</head>  
<body>  
<div class="container">  
     <table border="1">  
          <tr>  
               <th>id. No.</th>  
               <th>Type</th>  
               <th>Quantity</th>  
               <th>Date</th> 
               <th>Status</th>  
               <th>Action</th>  
          </tr>  
          <?php  
          $i=1;  
          if (mysqli_num_rows($sql)>0) {  
                while ($row=mysqli_fetch_assoc($sql)) { ?>  
                <tr>  
                     <td><?php echo $row['productid'] ?></td>  
                     <td><?php echo $row['producttype'] ?></td>  
                     <td><?php echo $row['quantity'] ?></td>  
                     <td><?php echo $row['date'] ?></td>  
                     <td>  
                          <?php  
                          if ($row['status']==1) {  
                               echo "Pending";  
                          }if ($row['status']==2) {  
                               echo "Accept";  
                          }if ($row['status']==3) {  
                               echo "Reject";  
                          }  
                          ?>  
                     </td>  
                     <td>  
                          <select onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['productid'] ?>')">  
                               <option value="">Update Status</option>  
                               <option value="1">Pending</option>  
                               <option value="2">Accept</option>  
                               <option value="3">Reject</option>  
                          </select>  
                     </td>  
                </tr>       
          <?php      }  
           } ?>  
     </table>  
</div>  

<script type="text/javascript">  
      function status_update(value,productid){  
      //     alert(productid);  
           let url = "http://127.0.0.1/inventorySystem/newProduct.php";  
           window.location.href= url+"?productid="+productid+"&status="+value;  
      }  
 </script> 
 
    <!--bootsrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
 

