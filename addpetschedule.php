<?php
include "connection.php";

$scheduletitle=$_POST["scheduletitle"];
$scheduledescription=$_POST["scheduledescription"];

$data="INSERT INTO tbl_petschedule VALUES (NULL,'$scheduletitle','$scheduledescription',1)";
    try
    {
        if($conn->query($data)===true)
        //echo "Schedule Added successfully!";
        header("location:addedschedules.php?status1=1");
    }
    catch(Exception)
    {
        header("location:addedschedules.php?status2=2");
        //echo $conn->error;
    } 

?>