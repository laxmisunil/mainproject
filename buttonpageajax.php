<?php
include "connection.php";
session_start();
$cusid=$_SESSION["userID"];

if(isset($_POST['set_freq'])){ 
    $update_sql="UPDATE tbl_cart SET productQuantity=0 WHERE customerID=$cusid";
    //$update_run=mysqli_query($connection,$update_sql);  
}
?>