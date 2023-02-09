<?php
include "connection.php";

session_start();

$vaccineID=$_GET["vaccineID"];
$vaccinedose=$_POST["dose"];
$vaccinebooster=$_POST["booster"];

$updatevaccine="UPDATE tbl_vaccinedetails SET vaccineDose='$vaccinedose',boosterRecommendation='$vaccinebooster' WHERE vaccineID='$vaccineID'";
try
{
    if($conn->query($updatevaccine)===true)
    header("location:vaccinelist.php?status3=3");
   
    //echo "Profile Updated";
}
catch(Exception)
{
    echo "ERROR";
}         
        


?>
