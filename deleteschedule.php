<?php
include "connection.php";
session_start();

$scheduleID=$_GET["scheduleID"];


$del="UPDATE tbl_petschedule SET scheduleStatus=0 WHERE scheduleID='$scheduleID'";
try
{
    if($conn->query($del)===true);
    header("location:addedschedules.php?status3=3");

}
catch(Exception)
{
    echo "ERROR";
} 


?>