<?php
include "connection.php";
session_start();
$userID=$_SESSION["loginID"];
$appID=$_SESSION["appID"];


$del="DELETE FROM tbl_productdetails WHERE productID='$appID'";
try
{
    if($conn->query($del)===true);
    echo "PRODUCT DELETED SUCCESSFULLY!";
}
catch(Exception)
{
    echo "ERROR";
} 


?>