<?php
include "connection.php";
$email=$_GET["email"];
$resettoken=$_GET["reset_token"];
$newpassword=$_POST["cuspassword"];
$encrypassword=md5($newpassword);

$updatepassword="UPDATE tbl_userdetails SET userPassword='$encrypassword' WHERE userEmail='$email' AND resettoken='$resettoken'";
try
    {
        if($conn->query($updatepassword)===true);
        header("location:login.php?status=5");
       
           
    }
    catch(Exception)
    {
        echo"<script>alert('Error');</script>";
        
    }



?>