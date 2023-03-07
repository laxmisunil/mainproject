<?php

include "connection.php";
session_start();
if(isset($_POST["submitdata"]))
{
$custname=$_POST["cusname"];
$_SESSION["cn"]=$custname;
//echo $a;
$custemail=$_POST["cusemail"];
$_SESSION["ce"]=$custemail;
//echo $b;
$custphone=$_POST["cusphone"];
$_SESSION["cp"]=$custphone;
//echo $c;
$custpassword=$_POST["cuspassword"];
$_SESSION["cpa"]=$custpassword;

$data="INSERT INTO tbl_userdetails VALUES (NULL,'$custname','$custemail','$custphone','$custpassword','Customer',1)";

if($conn->query($data)===true)
    {
        echo "INSERTED VALUES  SUCCESSFULLY";
    }
    else
    {
        echo "ERROR".$conn->error;
    }
}   
?>