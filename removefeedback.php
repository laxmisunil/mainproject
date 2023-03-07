<?php
include "connection.php";
session_start();
if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==1)
{                                         

$feedbackid=$_GET["feedbackid"];

$data="UPDATE tbl_feedback SET feedbackStatus=0 WHERE feedbackID='$feedbackid'";
try
{
    if($conn->query($data)===true);
    
    echo "Product Deleted SUCCESSFULLY!";
    header("location:customerfeedbacks.php?status=0");
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