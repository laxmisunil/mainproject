<?php
include "connection.php";


$productID=$_POST["productID"];
$productquantity=$_POST["productquantity"];
$productmeasure=$_POST["productmeasure"];



$query="SELECT count(*) as countrow FROM tbl_stock WHERE productQuantity='$productquantity' AND productMeasure='$productmeasure'";
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