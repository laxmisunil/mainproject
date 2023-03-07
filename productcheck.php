<?php
include "connection.php";


$productfor=$_POST["productfor"];
$productcategory=$_POST["subject"];
$productsubcategory=$_POST["topic"];
$productname=$_POST["proname"];
$prosubname=$_POST["prosubname"];
//$productprice=$_POST["proprice"];
$productdescription=$_POST["productdescription"];

$query="SELECT count(*) as countrow FROM tbl_productdetails WHERE productFor='$productfor' AND productDescription='$productdescription' AND productStatus=1";
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