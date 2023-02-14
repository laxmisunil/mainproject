<?php
include "connection.php";
session_start();


$orderID=$_GET["orderID"];


//echo date('H:i:s Y-m-d');
$date=date("Y-m-d"); 


    $updata="UPDATE tbl_order SET shippedDate='$date',orderStatus=2 WHERE orderID='$orderID'";

    try
    {
        if($conn->query($updata)===true);
       header("location:adminhome.php?status=5");
       
           
    }
    catch(Exception)
    {
       header("location:adminhome.php?status=6");
    }  
    
   


?>