<?php
include "connection.php";
$selecteddate=$_POST["selecteddate"];
$userid=$_POST["userid"];


$query="SELECT count(*) as countrow FROM tbl_appointmentdetails WHERE consultationDate='".$selecteddate."' AND customerID='".$userid."'";
$result = mysqli_query($conn,$query);

$response = "<div style='color: green;text-align:center'></div>";
if(mysqli_num_rows($result))
{
    $row = mysqli_fetch_array($result);
    $count = $row['countrow'];
    if($count > 1)
    {
        $response = "<div style='color: red;text-align:center'>&nbsp;Please select another date. 2 Bookings per date are allowed.</div>";
    } 
}
echo $response;
die;

?>