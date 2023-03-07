<?php
include "connection.php";
$selecteddate=$_POST["selecteddate"];
$selectedtime=$_POST["selectedtime"];

$query="SELECT count(*) as countrow FROM tbl_appointmentdetails WHERE consultationDate='".$selecteddate."' AND consultationTime='".$selectedtime."'";
$result = mysqli_query($conn,$query);

$response = "<div style='color: green;text-align:center'>Available</div>";
if(mysqli_num_rows($result))
{
    $row = mysqli_fetch_array($result);
    $count = $row['countrow'];
    if($count > 0)
    {
        $response = "<div style='color: red;text-align:center'>&nbsp;Please select another slot</div>";
    } 
}
echo $response;
die;

?>