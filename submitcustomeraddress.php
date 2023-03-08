<?php
include "connection.php";

session_start();
if(isset($_POST["submitaddress"]))
{
$userID=$_SESSION["loginID"];
$cushousename=$_POST["cushousename"];
//$_SESSION["cus"]=$custname;
//echo $a;
$cuspostoffice=$_POST["cuspostoffice"];
//$_SESSION["ce"]=$custemail;
//echo $b;
$cuslocality=$_POST["cuslocality"];
//$_SESSION["cp"]=$custphone;
//echo $c;
$cusdistrict=$_POST["cusdistrict"];
//$_SESSION["cpa"]=$custpassword;
$custown=$_POST["custtown"];
//$_SESSION["cp"]=$custphone;
//echo $c;
$cuspincode=$_POST["custpincode"];


$data="UPDATE tbl_userdetails SET userHousename='$cushousename',userPostOffice='$cuspostoffice',userLocality='$cuslocality',userDistrict='$cusdistrict',userTown='$custown',userPincode='$cuspincode' WHERE userID='$userID'";
try
{
    if($conn->query($data)===true)
    {
    header("location:addcustomeraddress.php?status=2");
    }
}
catch(Exception)
{
    echo "ERROR";
} 
}
