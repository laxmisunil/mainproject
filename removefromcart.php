<?php
include "connection.php";
session_start();
if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==3)
{                                         

$cartid=$_GET["cartid"];

$data="DELETE FROM tbl_cart WHERE cartID='$cartid'";
try
{
    if($conn->query($data)===true);
    
   // echo "Product Removed from cart!";
    header("location:mycart.php?status=0");
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