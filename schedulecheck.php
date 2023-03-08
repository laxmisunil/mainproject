<?php
include "connection.php";


$scheduletitle=$_POST["scheduletitle"];


$query="SELECT count(*) as countrow FROM tbl_petschedule WHERE scheduleTitle='$scheduletitle' AND scheduleStatus=1";
$result = mysqli_query($conn,$query);

$response = "<div style='color: green;text-align:center'></div>";
if(mysqli_num_rows($result))
{
    $row = mysqli_fetch_array($result);
    $count = $row['countrow'];
    if($count > 0)
    {
        $response = "<div style='color: red;text-align:left'>&nbsp;Schedule already added!</div><br>";
    } 
}
echo $response;
die;

?>