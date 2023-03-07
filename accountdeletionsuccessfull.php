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

$sel="SELECT petStatus FROM tbl_pet WHERE customerID=$userID";
if($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $petstatus=$row["petStatus"];
            if($petstatus!=0)
            {
                $uppet="UPDATE tbl_pet SET petStatus=0 WHERE customerID='$userID'";
                try
            {
                if($conn->query($uppet)===true);
               
                //header("location:index.php");
            }
            catch(Exception)
            {
                echo "ERROR";
            } 

            }
            else
            {
                
            }
           
        }
        //$result->free();
    }
}

    
   
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