<?php
include "connection.php";
session_start();
if(isset($_POST["submit"]))
{

$productcategory=$_POST["subject"];

$productsubcategory=$_POST["topic"];

$data="INSERT INTO tbl_category VALUES ('$productcategory','$productsubcategory')";
try
{
    if($conn->query($data)===true);
    echo "Success!";
    //header("location:productlist.php?status=1");
}
catch(Exception)
{
    echo "ERROR";
}         
        }  
else
{
    echo "Error";
}    
?>