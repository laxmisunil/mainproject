<?php
include "connection.php";
session_start();

$userID=$_SESSION["loginID"];

if(isset($_POST["submitaddress"]))
{

    $custhousename=$_POST["cushousename"];
    $custpostoffice=$_POST["cuspostoffice"];
    $custlocality=$_POST["cuslocality"];
    $custdistrict=$_POST["cusdistrict"];
    $custtown=$_POST["custtown"];
    $custpincode=$_POST["custpincode"];
    echo $custhousename;
    echo $custpostoffice;
    echo $custlocality;
    echo $custdistrict;
    echo $custtown;
    echo $custpincode;

//echo date('H:i:s Y-m-d');
$updata="UPDATE tbl_userdetails SET userHousename='$custhousename',userPostOffice='$custpostoffice',userLocality='$custlocality',userDistrict='$custdistrict',userTown='$custtown',userPincode='$custpincode' WHERE userID='$userID'";

try
{
    if($conn->query($updata)===true);
    header("location:addcustomeraddress.php?status=1");
}
catch(Exception)
{
    echo "ERROR";
}  
}
    else
    {
        echo "error";
    }

?>