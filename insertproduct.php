<?php
include "connection.php";
session_start();
if(isset($_POST["addproduct"]))
{
$productfor=$_POST["productfor"];
$productcategory=$_POST["subject"];
$productname=$_POST["proname"];

$productsubcategory=$_POST["topic"];
$productsubname=$_POST["prosubname"];
//$productprice=$_POST["productprice"];
$productdescription=$_POST["productdescription"];
$productimage=$_FILES["productimage"]["name"];

move_uploaded_file($_FILES["productimage"]["tmp_name"],"fileuploads/".$productimage);

$query="SELECT count(*) as countrow FROM tbl_productdetails WHERE productFor='$productfor' AND productCategory='$productcategory' and productSubcategory='$productsubcategory' AND productName='$productname' AND productSubname='$productsubname' AND productDescription='$productdescription' AND productStatus=0";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result))
{
    $row = mysqli_fetch_array($result);
    $count = $row['countrow'];
    if($count > 0)
    {
        $selrow="SELECT productID from tbl_productdetails WHERE productFor='$productfor' AND productCategory='$productcategory' and productSubcategory='$productsubcategory' AND productName='$productname' AND productSubname='$productsubname' AND productDescription='$productdescription' AND productStatus=0";
        if ($result=$conn->query($selrow))
        {
            if($result->num_rows>0)
            {
                while($row=$result->fetch_array())
                {
                    $productid=$row["productID"];
                }
                $result->free();
            }
            else
            {
                echo "No Records";
            }
        }
        else
        {
            echo "ERROR";          
        }
        $data2="UPDATE tbl_productdetails SET productStatus=1 WHERE productID='$productid'";
        try
        {
            if($conn->query($data2)===true);
            header("location:productlist.php?status=1");
        }
        catch(Exception)
        {
            echo $mysqli->error();
        }  

    }
    else
    {
        $data="INSERT INTO tbl_productdetails VALUES (NULL,'$productfor','$productcategory','$productname','$productsubcategory','$productsubname','$productdescription','$productimage',1)";
try
{
    if($conn->query($data)===true);
    echo "Product Added SUCCESSFULLY!";
    header("location:productlist.php?status1=1");
}
catch(Exception)
{
    echo "ERROR";
}         
        }      }  }
?>