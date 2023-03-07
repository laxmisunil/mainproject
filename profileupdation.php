<?php
include "connection.php";
session_start();

$userID=$_SESSION["loginID"];


if(isset($_POST["updatedata"]))
{
    $custname=$_POST["custoname"];
    $custemail=$_POST["custoemail"];
    $custphone=$_POST["custophone"];
//echo date('H:i:s Y-m-d');
    $updata="UPDATE tbl_userdetails SET userName='$custname',userEmail='$custemail', userPhone='$custphone' WHERE userID='$userID'";

    try
    {
        if($conn->query($updata)===true);
        header("location:myprofile.php?status=1");
       
           
    }
    catch(Exception)
    {
        header("location:myprofile.php?status=3");
    }  
    
   

} 

?>