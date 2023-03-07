<?php
include "connection.php";
session_start();

//$prosubname=$_POST["prosubname"];
$productdescription=$_POST["productdescription"];
$productname=$_POST["proname"];

$query="SELECT count(*) as countrow FROM tbl_productdetails WHERE productName='$productname' AND productDescription='$productdescription'";
$result = mysqli_query($conn,$query);

$response = "<div style='color: green;text-align:center'></div>";
if(mysqli_num_rows($result))
{
    $row = mysqli_fetch_array($result);
    $count = $row['countrow'];
    if($count > 0)
    {
        $response = "<div style='color: red;text-align:left'>&nbsp;Product already added</div><br>";
    } 
}
echo $response;
die;

?>