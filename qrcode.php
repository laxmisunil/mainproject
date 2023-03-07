<?php
require_once("phpqrcode/qrlib.php");
include "connection.php";
//$item = "ID 23456";
$petid=$_GET["petid"];


$sel="SELECT tbl1.*,tbl2.* FROM tbl_pet AS tbl1 INNER JOIN tbl_userdetails AS tbl2 ON tbl2.userID=tbl1.customerID WHERE tbl1.petID='$petid'";
if($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $username=$row["userName"];
            $userphone=$row["userPhone"];
            $useremail=$row["userEmail"];
            $petname=$row["petName"];
            $petage=$row["petAge"];
            $petgender=$row["petGender"];
            $petlicensenumber=$row["petLicenseNumber"];
            $petbreed=$row["petBreed"];
        }
        //$result->free();
    }
}

QRcode::png("Name : ".$petname." (".$petage."months) ".
" || "."  Owner : ".$username.
" || "."  License Number : ".$petlicensenumber.
" || "."  Animal Breed : ".$petbreed.
" || "."  Gender : ".$petgender.
" || "."  Phone : +91 ".$userphone.
" || "."  Email : ".$useremail

);

?>

    