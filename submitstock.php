<title>Submit product details</title>
<?php
include "connection.php";
session_start();
if(isset($_POST["submitdetails"]))
{
$productID=$_GET["productid"];
$productquantity=$_POST["productquantity"];
$productmeasure=$_POST["productmeasure"];
$productsinstock=$_POST["productsinstock"];
$productprice=$_POST["productprice"];

$query="SELECT count(*) as countrow FROM tbl_stock WHERE productID='$productID' AND productQuantity='$productquantity' AND productMeasure='$productmeasure'";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result))
{
    $row = mysqli_fetch_array($result);
    $count = $row['countrow'];
    if($count > 0)
    {


        /*$data="UPDATE tbl_stock SET productStock='$productsinstock' WHERE stockID=1";
        try
        {
            if($conn->query($data2)===true);*/
            header("location:productlist.php?status5=5");
        /*}
        catch(Exception)
        {
            echo $mysqli->error();
        } */ 


    }
    else
    {
        $data2="INSERT INTO tbl_stock VALUES (NULL,'$productID','$productquantity','$productmeasure','$productsinstock','$productprice',1)";
try
{
    if($conn->query($data2)===true);
    echo "Product Added SUCCESSFULLY!";
    header("location:productlist.php?status4=4");
}
catch(Exception)
{
    echo "ERROR";
}         
        }      }  }
?>