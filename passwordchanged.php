<?php
include "connection.php";

$userID=$_GET["userID"];
$cuspassword=$_POST["cuspassword"];
$newpassword=md5($cuspassword);

$fetcholdpassword="SELECT userPassword FROM tbl_userdetails WHERE userID='$userID'";
if ($result=$conn->query($fetcholdpassword))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $oldpassword=$row["userPassword"];
        }                   
        $result->free();
    }
    else
    {
        echo "No Records";
    }
}
else
{    
    echo "ERROR"; 
} 
if($newpassword==$oldpassword)
{
    header("location:changepassword.php?status=3");
}
else
{
$changepassword="UPDATE tbl_userdetails SET userPassword='$newpassword' WHERE userID='$userID'";
try
    {
        if($conn->query($changepassword)===true);
       // header("location:changepassword.php?status=1");
       header("location:passwordlogout.php");
       
           
    }
    catch(Exception)
    {
        header("location:changepassword.php?status=2");
        
    }
}