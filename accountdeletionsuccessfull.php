<?php
include "connection.php";
session_start();
if($_SESSION["loginStatus"])
{
    if ($_SESSION["loginStatus"]==3)
    {

$userID=$_SESSION["loginID"];
    }
}

    //$userID=$_SESSION["loginID"];
   
    $updata="UPDATE tbl_userdetails SET userStatus=2 WHERE userID='$userID'";
    
try
{
    if($conn->query($updata)===true);
   
    header("location:index.php");
}
catch(Exception)
{
    echo "ERROR";
} 




?>