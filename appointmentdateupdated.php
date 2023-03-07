<?php
include "connection.php";
session_start();

$userID=$_SESSION["loginID"];
$appointmentID=$_GET["appointmentID"];
$newdate=$_POST["date"];
$newtime=$_POST["timepick"];



    $updata="UPDATE tbl_appointmentdetails SET consultationDate='$newdate',consultationTime='$newtime' WHERE appointmentID='$appointmentID'";

    try
    {
        if($conn->query($updata)===true);
        header("location:myupcomingappointments.php?status=1");
       
           
    }
    catch(Exception)
    {
        header("location:myupcomingappointments.php?status=3");
    }  
    
   


?>