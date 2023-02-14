<?php

include "connection.php";

$stockID=$_GET["stockID"];
$newprice=$_POST["newprice"];

$productname="SELECT * FROM tbl_stock WHERE stockID='$stockID'";
if ($result=$conn->query($productname))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $productID=$row["productID"];
            $productstock=$row["productStock"];
        }
    }
}



$updatestock="UPDATE tbl_stock SET productPrice='$newprice' WHERE stockID='$stockID'";
try
{
    if($conn->query($updatestock)===true);
   header("location:productweight.php?productid=$productID&status3=3");
   
    //echo "Profile Updated";
}
catch(Exception)
{
    echo "ERROR";
}         
       
?>