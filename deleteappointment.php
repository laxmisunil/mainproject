<?php
include "connection.php";
session_start();
$userID=$_SESSION["loginID"];
$appID=$_GET["appointmentID"];


$del="DELETE FROM tbl_appointmentdetails WHERE appointmentID='$appID'";
try
{
    if($conn->query($del)===true);
    header("location:myappointmenthistory.php?status=3");

}
catch(Exception)
{
    echo "ERROR";
} 


?>