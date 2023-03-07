<?php
include "connection.php";
session_start();
$userID=$_SESSION["loginID"];
$appID=$_GET['appointmentID'];


$del="DELETE FROM tbl_appointmentdetails WHERE appointmentID='$appID'";
try
{
    if($conn->query($del)===true);
    //echo mysqli_error($conn);
 
    header("location:myupcomingappointments.php?status=2");

}
catch(Exception)
{
    echo "ERROR";
} 


?>