<?php
include "connection.php";
session_start();
$userID=$_SESSION["loginID"];
$vaccID=$_GET["vaccinebookedID"];
$symptoms=$_POST["symptoms"];




$del="UPDATE tbl_vaccinebooked SET vaccinationReport=1,vaccinationRemarks='$symptoms' WHERE vaccinebookedID='$vaccID'";
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