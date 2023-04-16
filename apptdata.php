<?php
include "connection.php";
session_start();

$userID=$_SESSION["loginID"];
$username="SELECT userName FROM tbl_userdetails WHERE userID='$userID'";
$useremail="SELECT userEmail FROM tbl_userdetails WHERE userID='$userID'";
$userphone="SELECT userPhone FROM tbl_userdetails WHERE userID='$userID'";
//echo "hi";


if(isset($_POST["booknow"]))
{
    $petname=$_POST["petname"];
    $apptdate=$_POST["date"];
    $appttime=$_POST["timepick"];
    $petconcern=$_POST["concern"];
    
    $sel="SELECT * FROM tbl_pet WHERE petName='$petname' AND customerID='$userID'";
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            ?><script>alert("Hi"); </script><?php          
            echo $row["petID"];
        
            $petID=$row["petID"];

   $data="INSERT INTO tbl_appointmentdetails VALUES (NULL,'$userID','$petID','$petconcern','$apptdate','$appttime',NULL,NULL,0)";
    try
    {
        if($conn->query($data)===true);
        header("location:myupcomingappointments.php?status=1");
    

}
catch(Exception)
{
    echo $conn->error;
}         
}
        
//$result->free();
}
else
{
//echo "You haven't registered any pet yet";
}
}
else
{
echo $conn->error;
} 
}
exit;

?>