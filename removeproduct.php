<?php
include "connection.php";
session_start();
if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==1)
{                                         

$productid=$_GET["productid"];

$data="UPDATE tbl_productdetails SET productStatus=0 WHERE productID='$productid'";
try
{
    if($conn->query($data)===true);
    
    echo "Product Deleted SUCCESSFULLY!";
    header("location:productlist.php?status3=3");
}
catch(Exception)
{
    echo $mysqli->error();
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