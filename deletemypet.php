<?php
include "connection.php";
session_start();
$userID=$_SESSION["loginID"];
$petID=$_GET["petID"];


$del="UPDATE tbl_pet SET petStatus=0 WHERE petID='$petID'";
try
{
    if($conn->query($del)===true);
   //echo mysqli_error($conn);
   header("location:mypets.php?status=2");

}
catch(Exception)
{
    echo "ERROR";
} 


?>