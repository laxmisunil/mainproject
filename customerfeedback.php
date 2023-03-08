<?php
include "connection.php";

session_start();
$userID=$_SESSION["loginID"];
if(isset($_POST["submitfeedback"]))
{
    
    $custfeedback=$_POST["cusfeedback"];
    $data="INSERT INTO tbl_feedback VALUES (NULL,'$userID','$custfeedback',1)";
    try
{
    if($conn->query($data)===true);
    header("location:contact.php?status=1");
}
catch(Exception)
{
    echo $conn->error;
}         
        }        
?>