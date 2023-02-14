<?php
include "connection.php";
session_start();


$orderID=$_GET["orderID"];


//echo date('H:i:s Y-m-d');
$date=date("Y-m-d"); 




    $updata="UPDATE tbl_order SET deliveredDate='$date',orderStatus=3 WHERE orderID='$orderID'";

    try
    {
        if($conn->query($updata)===true);
      header("location:adminhome.php?status=7");
       
           
    }
    catch(Exception)
    {

       header("location:adminhome.php?status=8");
    }  
    
   


?>