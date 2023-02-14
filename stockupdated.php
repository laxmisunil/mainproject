<?php

include "connection.php";

$stockID=$_GET["stockID"];
$addedstock=$_POST["newstock"];

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

$newstock=$addedstock+$productstock;


$updatestock="UPDATE tbl_stock SET productStock='$newstock' WHERE stockID='$stockID'";
try
{
    if($conn->query($updatestock)===true);
   header("location:productweight.php?productid=$productID&status2=2");
   
    //echo "Profile Updated";
}
catch(Exception)
{
    echo "ERROR";
}         
       
?>