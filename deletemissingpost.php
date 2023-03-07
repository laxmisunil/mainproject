<?php
include "connection.php";
session_start();
$userID=$_SESSION["loginID"];
$petID=$_GET["petID"];
$lostandfoundID=$_GET["lostandfoundid"];


$upd="UPDATE tbl_pet SET petStatus=1 WHERE petID='$petID'";
try
{
    if($conn->query($upd)===true);

}
catch(Exception)
{
    echo "ERROR";
} 



$del="UPDATE tbl_lostandfound SET lostandfoundStatus=0 WHERE lostandfoundID='$lostandfoundID'";
try
{
    if($conn->query($del)===true);
    header("location:lostandfound.php?status=4");

}
catch(Exception)
{
    echo "ERROR";
} 




?>