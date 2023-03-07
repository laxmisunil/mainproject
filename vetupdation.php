<?php
include "connection.php";

session_start();
if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==1)
{

$vetid=$_GET["vetID"];
$vetname=$_POST["proname"];





if(isset($_POST["updatevet"]))
{
$updatevet="UPDATE tbl_userdetails SET userName='$vetname' WHERE userID=$vetid";
try
{
    if($conn->query($updatevet)===true);
    header("location:veterinarydetails4.php?status1=1");
   

}
catch(Exception)
{
    echo "ERROR";
}         
}
}
else
{
    header("location:login.php");
}
}
else
{
    header("location:login.php");
}   



?>



