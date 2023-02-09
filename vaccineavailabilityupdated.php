<?php
include "connection.php";

session_start();

$vaccineID=$_GET["vaccineID"];
$availability=$_POST["availability"];


$sel="SELECT * FROM tbl_vaccinedetails WHERE vaccineID='$vaccineID'";
if($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $remaining=$row["vaccineAvailability"];
        }
        //$result->free();
    }
}


$updatevaccine="UPDATE tbl_vaccinedetails SET vaccineAvailability='$remaining'+'$availability' WHERE vaccineID='$vaccineID'";
try
{
    if($conn->query($updatevaccine)===true)
    header("location:vaccinelist.php?status4=4");
   
    //echo "Profile Updated";
}
catch(Exception)
{
    echo "ERROR";
}         
        


?>
