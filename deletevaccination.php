<?php
include "connection.php";
session_start();
$userID=$_SESSION["loginID"];
$vaccID=$_GET["vaccinebookedID"];


$del="DELETE FROM tbl_vaccinebooked WHERE vaccinebookedID='$vaccID'";
try
{
    if($conn->query($del)===true);
    header("location:myvaccinationhistory.php?status=3");

}
catch(Exception)
{
    echo "ERROR";
} 


?>