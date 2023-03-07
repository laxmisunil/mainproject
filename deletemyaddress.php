<?php
include "connection.php";
session_start();

$userID=$_SESSION["loginID"];

if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==3)
{                                         


$deleteaddress="DELETE userHousename,userPostOffice,userLocality,userDistrict,userTown,userPincode FROM tbl_userdetails WHERE userID=$userID";
try
{
    if($conn->query($deleteaddress)===true);
    
   // echo "Product Removed from cart!";
    header("location:addcustomeraddress.php?status=1");
}
catch(Exception)
{
    //echo $mysqli->error();
}      
}
else
{
    header("location:login.php");
}
}
else
{
    header("location:index.php");
}   
              
?>