<?php
include "connection.php";
session_start();

$userID=$_SESSION["loginID"];
$vaccID=$_GET['vaccinebookedID'];


$sel="SELECT * FROM tbl_vaccinebooked WHERE vaccinebookedID='$vaccID'";
if($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $vaccinename=$row["vaccineName"];
        }
        //$result->free();
    }
}


$sel2="SELECT vaccineAvailability,vaccineDose FROM tbl_vaccinedetails WHERE vaccineName='$vaccinename'";
if($result2=$conn->query($sel2))
{
    if($result2->num_rows>0)
    {
        while($row=$result2->fetch_array())
        {
            $vaccinedose=$row["vaccineDose"];
            $vaccineavailability=$row["vaccineAvailability"];


        }
        //$result->free();
    }
}






$del="UPDATE tbl_vaccinebooked SET vaccinebookedStatus=3 WHERE vaccinebookedID='$vaccID'";
try
{
    if($conn->query($del)===true);
 
   // header("location:myupcomingvaccinations.php?status=2");

}
catch(Exception)
{
    echo "ERROR";
}

$updata="UPDATE tbl_vaccinedetails SET vaccineAvailability='$vaccineavailability'+'$vaccinedose' WHERE vaccineName='$vaccinename'";
try
{
    if($conn->query($updata)===true);
   // echo "Product Added SUCCESSFULLY!";
    header("location:myupcomingvaccinations.php?status=2");
}
catch(Exception)
{
   // echo mysqli_error($conn);
    
} 


?>