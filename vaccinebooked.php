<?php
include "connection.php";
session_start();
$userID=$_SESSION["loginID"];

//$customeremail=$_POST["email"];
//$customerphone=$_POST["phone"];


$petname=$_POST["petname"];
$housename=$_POST["housename"];
$customertown=$_POST["town"];
$pincode=$_POST["pincode"];
$vaccinename=$_POST["vaccine"];
$vaccinedate=$_POST["date"];
$vaccinetime=$_POST["time"];


$sel="SELECT * FROM tbl_pet WHERE petName='$petname'";
if($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $petID=$row["petID"];
        }
        $result->free();
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

if($vaccinedose<=$vaccineavailability)
{
    $data="INSERT INTO tbl_vaccinebooked VALUES (NULL,'$userID','$petID','$housename','$customertown','$pincode','$vaccinename','$vaccinedate','$vaccinetime',1)";
try
{
    if($conn->query($data)===true);
   // echo "Product Added SUCCESSFULLY!";
    //header("location:myupcomingvaccinations.php?status2=1");
}
catch(Exception)
{
   // echo mysqli_error($conn);
    
}    
$updata="UPDATE tbl_vaccinedetails SET vaccineAvailability='$vaccineavailability'-'$vaccinedose' WHERE vaccineName='$vaccinename'";
try
{
    if($conn->query($updata)===true);
   // echo "Product Added SUCCESSFULLY!";
    header("location:myupcomingvaccinations.php?status2=1");
}
catch(Exception)
{
   // echo mysqli_error($conn);
    
}   

}
else
{
    header("location:bookforvaccination.php?status=1");
}

?>  
           
?>