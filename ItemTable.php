<?php
include("./connection/DB.php");

/*
$tableSql = "CREATE TABLE IF NOT EXISTS itemtable(
    itemname VARCHAR(255) NOT NULL ,
   
    itemid INT  PRIMARY KEY ,
    itemtype VARCHAR(255) NOT NULL ,
    itemquantity INT NOT NULL,
    date DATE NOT NULL
    
   
)";

if ($conn->query($tableSql) === TRUE) {
    echo "Table 'itemtable' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

*/

if(isset($_POST['submitt'])){
   
    $itemname=$_POST['ItemName'];
    $itemid=$_POST['ItemId'];
    $itemtype=$_POST['ItemType'];
     $itemquantity=$_POST['ItemQuantity'];
     $registrationDate = $_POST['ItemDate'];

      $select = "SELECT * FROM itemtable WHERE itemid = '$itemid'";
      $result = mysqli_query($conn,$select);
     if(mysqli_num_rows($result)>0){
      $row = mysqli_fetch_array($result);
      $quantity2= $row['itemquantity'];
      
      $quantity =  $quantity2+ $itemquantity;

      $sql = "UPDATE itemtable SET date='$registrationDate',itemquantity='$quantity' WHERE itemid='$itemid'";

      $result = mysqli_query($conn,$sql);
      if($result){
       // echo "updated succ";
        header('location:itemRegister.html');
      }
      else{
        die(mysquli_error($conn));
      }
     }else{
        
      $sql = "INSERT INTO itemtable (itemname,itemid,itemtype,itemquantity,date)
      values('$itemname','$itemid','$itemtype','$itemquantity','$registrationDate')";
  
      $result = mysqli_query($conn,$sql);
      if($result){
      //  echo "inserted succ";
        header('location:itemRegister.html');
      }
      else{
        die(mysquli_error($conn));
      }
     }
   
    }

?>